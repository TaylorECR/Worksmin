<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Company;
use App\Helpers\Helper;
use App\Http\Requests\EmailRequest;
use App\Job;
use App\Mail\NewPostulation;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function mail(Offert $offert, Request $request)
    {
    	return new NewPostulation($company, $request);
    }

    public function register()
    {
    	return view('auth.register2');
    }

    public function updateProfile(Request $request)
    {
        $company = Company::whereId(auth()->user()->company->id)->first();
        if($request->hasFile('picture')) {
            \Storage::delete('users/' . $company->user->picture);
            $picture = Helper::uploadFile( "picture", 'users');
            $company->user->picture = $picture;
            $company->user->save();
        }
        $company->fill($request->input())->save();

        return back()->with('message', ['status' => 'success', 'message' => "Datos actualizados correctamente"]);
    }

    public function dashboard($word = 'dashboard')
    {
        switch ($word ) {
            case 'dashboard':
                $candidates = Candidate::with('user')
                            ->whereHas('jobs', function ($q) {
                                $q->where('company_id', auth()->user()->company->id)
                                    ->select('id', 'company_id', 'title');
                            })->get();
                return view('partials.dashboard.index', compact('word', 'candidates'));
                break;
            case 'manage':
                $jobs = Job::whereCompanyId(auth()->user()->company->id)->orderBy('created_at', 'DESC')->paginate(12);
                return view('partials.dashboard.index', compact('word', 'jobs'));
                break;
            case 'post':
                $job = new Job;
                $btn = "Crear oferta";
                return view('partials.dashboard.index', compact('word', 'job', 'btn'));
                break;
            default:
                return view('partials.dashboard.index', compact('word'));
                break;
        }  
    }

    public function show(Company $company)
    {
        $company->load([
            'sector' => function ($q) {
                $q->select('id', 'sector');
            },
            'jobs' => function ($q) {
                $q->latest()->take(3);
            },
        ])->get();

        return view('company.show', compact('company'));
    }

    public function fastMail(Job $job, EmailRequest $request)
    {
        $cv = Helper::uploadFile('cv', 'files');
        dd($cv);
        dd($request->all());
        $request->merge(['cv' => $cv]);
        dd($request->all());
        $request->merge(['job_id' => $job['id']]);
        dd($request->all());
        DB::create($request->input());

        \Mail::to(auth()->user()->company)->send(new NewPostulation($job, $request));

        return back()->with('status', 'Has postulado correctamente');
    }

    public function jobs(Company $company)
    {
        $jobs = Job::with('company')->whereCompanyId($company->id)->paginate(9);
        // dd($jobs);
        return view('company.jobs', compact('jobs'));
    }

    public function candidates(Job $job)
    {
        $job->load([
            'candidates'            
        ])->get();
        $word = 'candidates';
        return view('partials.dashboard.index', compact('word', 'job'));
    }

    public function updatePassword(Request $request)
    {
        dd($request);
    }
}
