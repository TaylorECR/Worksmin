<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(8)->get();
        $jobs = Job::with('company')->take(4)->get();
        $companies = Company::with('jobs')->take(4)->get();

        return view('home', compact('categories', 'jobs', 'companies'));
    }
}
