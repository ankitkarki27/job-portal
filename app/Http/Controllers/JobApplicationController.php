<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Applicant;

class JobApplicationController extends Controller
{
    // Show all applications for the logged-in applicant
    public function index()
    {
        $applicant = Applicant::where('user_id', Auth::id())->first();
        
        if (!$applicant) {
            return redirect()->route('profile.edit')->with('error', 'You must create an applicant profile before viewing applications.');
        }
    
        $applications = JobApplication::where('applicant_id', $applicant->id)->latest()->get();
        return view('job_applications.index', compact('applications'));
    }
    
    // Show job application form
    public function create($jobid)
{
    $job = JobListing::findOrFail($jobid);

    // Get applicant record using user_id
    $applicant = Applicant::where('user_id', Auth::id())->first();

    if (!$applicant) {
        return redirect()->route('profile.edit')->with('error', 'You must create an applicant profile before applying.');
    }

    return view('job_applications.create', compact('job'));
}


    // Store application
    public function store(Request $request, $jobid)
    {
        $request->validate([
            'cover_letter' => 'required|string|min:50|max:2000',
        ]);
    
        // Check if the user has already applied
        if (JobApplication::where('jobid', $jobid)->where('applicant_id', Auth::id())->exists()) {
            return back()->with('error', 'You have already applied for this job.');
        }
    
        // Fetch the applicant using user_id
        $applicant = Applicant::where('user_id', Auth::id())->first();
    
        // Debugging: Check if applicant exists
        if (!$applicant) {
            return back()->with('error', 'Applicant record not found.');
        }
    
        // Debugging: Check if resume exists
        if (!$applicant->resume || empty($applicant->resume)) {
            return back()->with('error', 'You must upload a resume in your profile before applying.');
        }
    
        // Store application
        JobApplication::create([
            'jobid' => $jobid,
            'applicant_id' => $applicant->id, // Use applicant ID, not user ID
            'cover_letter' => $request->cover_letter,
            'resume' => $applicant->resume,
            'status' => 'Pending',
        ]);
    
        return back()->with('success', 'Application submitted successfully.');
    }
    

    // Show application details
//     public function show($id)
// {
//     $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();
//     $application = JobApplication::where('applicant_id', $applicant->id)->findOrFail($id);
    
//     return view('job_applications.show', compact('application'));
// }

// Show application details
public function show($applications_id)
{
    $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();

    // Query the JobApplication using applications_id and applicant_id
    $application = JobApplication::where('applicant_id', $applicant->id)
                                  ->where('applications_id', $applications_id)
                                  ->firstOrFail();

    return view('job_applications.show', compact('application'));
}



    // Edit application (only if status is pending)
    public function edit($id)
    {
        $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();
        $application = JobApplication::where('applicant_id', $applicant->id)->where('status', 'Pending')->findOrFail($id);
    
        return view('job_applications.edit', compact('application'));
    }
    
    // Update application
    public function update(Request $request, $id)
{
    $request->validate([
        'cover_letter' => 'required|string|min:50|max:12000',
        'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
    ]);

    // Get applicant record
    $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();

    // Find the job application using applicant_id
    $application = JobApplication::where('applicant_id', $applicant->id)
                                 ->where('status', 'Pending')
                                 ->findOrFail($id);

    // Handle resume upload
    if ($request->hasFile('resume')) {
        if ($application->resume) {
            Storage::disk('public')->delete($application->resume);
        }
        $application->resume = $request->file('resume')->store('resumes', 'public');
    }

    // Update the cover letter
    $application->cover_letter = $request->cover_letter;
    $application->save();

    return redirect()->route('job_applications.index')->with('success', 'Application updated successfully.');
}


    // Delete application
    public function destroy($id)
{
    $applicant = Applicant::where('user_id', Auth::id())->firstOrFail();
    $application = JobApplication::where('applicant_id', $applicant->id)->findOrFail($id);

    if ($application->resume) {
        Storage::disk('public')->delete($application->resume);
    }

    $application->delete();

    return redirect()->route('job_applications.index')->with('success', 'Application deleted successfully.');
}

}
