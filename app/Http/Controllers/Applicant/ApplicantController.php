<?php

namespace App\Http\Controllers\Applicant;
use App\Models\JobListing;
use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    public function index()
    {
        
       
        // $jobs = JobListing::latest()->take(6)->get(); // Fetch latest 6 jobs

        // In the controller, fetching the jobs
        $jobs = JobListing::with('company')->get();
        return view('applicant.home', compact('jobs'));
    }
    public function findjobs()
    {
        // return view('applicant.home');
       
        // $jobs = JobListing::latest()->take(6)->get(); // Fetch latest 6 jobs
   
        // In the controller, fetching the jobs
        $jobs = JobListing::with('company')->get();
        return view('applicant.findjobs', compact('jobs'));
    }
}
