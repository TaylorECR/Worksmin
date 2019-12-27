<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Candidate;
use App\Helpers\Helper;
use App\Mail\NewApplicationToJob;
use App\Rules\StrengthPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    public function updateProfile(Request $request)
    {
        // dd($request->all());
        $candidate = Candidate::whereId(auth()->user()->candidate->id)->first();
        if($request->hasFile('picture')) {
            // dd($request->all());
            \Storage::delete('users/' . $candidate->user->picture);
            $picture = Helper::uploadFile( "picture", 'users');
            $candidate->user->picture = $picture;
            $candidate->user->save();
        }
       
        $request->merge(['languages' => json_encode($request['languages'])]);
        $candidate->fill($request->input())->save();

        return redirect()->route('candidate.dashboard.index', 'profile');
    }

    public function apply (Job $job) {

        $job->candidates()->attach(auth()->user()->candidate->id);

        \Mail::to($job->company->user)->send(new NewApplicationToJob( $job , auth()->user()->candidate));
        
        return back()->with('message', ['status' => 'success', 'message' => "Has posulado exitosamente"]);
    }

    public function dashboard($word = 'dashboard')
    {
        if ($word == 'applications') {

            $applications = Job::whereHas('candidates', function($query) {
                $query->where('candidate_id', auth()->user()->candidate->id);
            })->orderBy('created_at', 'desc')->paginate(10);

            return view('partials.dashboard.index', compact('word', 'applications'));
        }

        return view('partials.dashboard.index', compact('word'));
    }

    public function updatePassword()
    {
        $this->validate(request(),[
            'password' => ['confirmed', new StrengthPassword]
        ]);
        $user = auth()->user();
        $user->password = bacrypt(request()->password);
        $user->save();
        return back()->with('message', "Contraseña guardada correctamente");
    }
}
