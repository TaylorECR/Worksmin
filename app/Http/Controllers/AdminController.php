<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use App\Job
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function jobCreate()
    {
        $job = new Job;
        $btnText = "Crear oferta";
    	return view('admin.job.create', compact('job', 'btnText'));
    }

    public function jobStore(Request $request)
    {
        $request->merge(['slug' => str_slug($request['title'], '-')]);
        // dd($request->all());
        Job::create($request->input());
        return back()->with('status', 'El empleo ha sido creado correctamente');
    }

    public function companyCreate()
    {
        $company = new Company;
        $btnText = "Crear empresa";
        return view('admin.company.create', compact('company', 'btnText'));
    }

    public function companyStore(CompanyRequest $request)
    {
        $request->merge(['slug' => str_slug($request['title'], '-')]);
        $request->merge(['user_id' => 1]);
        Company::create($request->input());
        return back()->with('status', 'La empresa ha sido creada correctamente');
    }
}
