<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;

class JobApplicationController extends Controller
{
    // Show all applications for the logged-in applicant
    public function index()
    {
        $applications = JobApplication::where('applicant_id', Auth::id())->get();
        return view('job_applications.index', compact('applications'));
    }

    // Show application form
    public function create($jobid)
    {
        $job = JobListing::findOrFail($jobid);
        return view('job_applications.create', compact('job'));
    }

    // Store application
public function store(Request $request, $jobid)
{
    $request->validate([
        'cover_letter' => 'required|string',
    ]);

    // Check if the user has already applied
    if (JobApplication::where('jobid', $jobid)->where('applicant_id', Auth::id())->exists()) {
        return back()->with('error', 'You have already applied for this job.');
    }

    // Fetch the applicant's resume from the applicants table
    $applicant = Applicant::where('id', Auth::id())->first();

    if (!$applicant || !$applicant->resume) {
        return back()->with('error', 'You must upload a resume in your profile before applying.');
    }

    // Store application
    JobApplication::create([
        'jobid' => $jobid,
        'applicant_id' => Auth::id(),
        'cover_letter' => $request->cover_letter,
        'status' => 'pending',
    ]);

    return redirect()->route('job_listings.index')->with('success', 'Application submitted successfully.');
}


    // Show application details
    public function show($id)
    {
        $application = JobApplication::findOrFail($id);
        return view('job_applications.show', compact('application'));
    }

    public function applicant()
{
    return $this->belongsTo(Applicant::class, 'applicant_id'); // Assuming Applicant model exists
}

}

