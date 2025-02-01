<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant; 

class ApplicantController extends Controller
{
    public function index()
    {
        return view('applicant.home');
    }

    // Show profile
    public function showProfile()
    {
        // Get the applicant's profile using the authenticated user
        $applicant = Auth::user()->applicant;

        // Return the profile view with applicant data
        return view('applicant.profile', compact('applicant'));
    }

    // Show the edit profile form
    public function editProfile()
    {
        // Get the applicant's profile using the authenticated user
        $applicant = Auth::user()->applicant;

        // Return the edit profile form view with applicant data
        return view('applicant.editProfile', compact('applicant'));
    }

    // Update profile
    public function updateProfile(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // Optional file, but if uploaded, validate it
            'skills' => 'required|string',
            'education' => 'required|string',
            'experience' => 'required|string',
            'address' => 'required|string',
        ]);

        // Get the authenticated user's applicant profile
        $applicant = Auth::user()->applicant;

        // If a new resume is uploaded, store it and update the path
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
            $applicant->resume = $resumePath;
        }

        // Update the applicant's profile fields
        $applicant->skills = $request->skills;
        $applicant->education = $request->education;
        $applicant->experience = $request->experience;
        $applicant->address = $request->address;

        // Save the updated profile
        $applicant->save();

        // Redirect to profile view with a success message
        return redirect()->route('applicant.profile')->with('success', 'Profile updated successfully!');
    }
}
