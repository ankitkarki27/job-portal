<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant; 
use App\Models\JobListing; 


class ApplicantProfileController extends Controller
{
    public function index()
    {
        // Get the list of job listings (You can modify this to apply any necessary filters)
        $jobs = JobListing::all();

        // Pass the jobs and applicant data to the view
        return view('applicant.home', compact('jobs'));
    }
    // Show the applicant's profile page
    public function showProfile()
    {
        // Get the logged-in user
        $applicant = Auth::user()->applicant;

        // Check if the applicant's profile is complete
        $isProfileComplete = $applicant->resume && $applicant->skills && $applicant->education && $applicant->experience && $applicant->address;

        return view('applicant.profile', compact('applicant', 'isProfileComplete'));
    }

    // Show the form to update the profile details
    public function editProfile()
    {
        $applicant = Auth::user()->applicant;
        return view('applicant.edit_profile', compact('applicant'));
    }

    // Update the applicant's profile details
    public function updateProfile(Request $request)
    {
        $request->validate([
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'skills' => 'required|string|max:255',
            'education' => 'required|string|max:255',
            'experience' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $applicant = Auth::user()->applicant;

        // Update the profile information
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
            $applicant->resume = $resumePath;
        }

        $applicant->skills = $request->input('skills');
        $applicant->education = $request->input('education');
        $applicant->experience = $request->input('experience');
        $applicant->address = $request->input('address');

        $applicant->save();

        return redirect()->route('applicant.profile.show')->with('success', 'Profile updated successfully');
    }
}
