<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the logged-in user's company
        $company = Auth::user()->company;

        // Get all job listings created by the logged-in user's company
        $jobListings = JobListing::where('company_id', $company->id)->paginate(10);

        return view('job_listings.index', compact('jobListings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if the logged-in user has a company
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to post a job.');
        }

        // Check if the user has a company
        $company = $user->company;
        
        if (!$company) {
            return redirect()->route('company.create')->with('error', 'You need to create a company before posting a job.');
        }

        return view('job_listings.create');
    }

    /**
     * Store a newly created job listing in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required',
            'job_type' => 'required|string|max:50',
            'salary' => 'nullable|numeric',
            'location' => 'required|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'application_deadline' => 'nullable|date',
            'status' => 'nullable|string|in:open,closed',
        ]);

        // Create new job listing
        JobListing::create($request->all());

        return redirect()->route('job_listings.index')->with('success', 'Job listing created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $jobid)
    {
        $job = JobListing::findOrFail($jobid);
        return view('job_listings.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $jobid)
    {
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required',
            'job_type' => 'required|string|max:50',
            'salary' => 'nullable|numeric',
            'location' => 'required|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'application_deadline' => 'nullable|date',
            'status' => 'nullable|string|in:open,closed',
        ]);

        // Retrieve the job listing by id
        $job = JobListing::findOrFail($jobid);

        // Update the job without company_id
        $job->update($validatedData);

        // Redirect back to the job listings page with success message
        return redirect()->route('job_listings.index')->with('success', 'Job listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the job listing by id
        $job = JobListing::find($id);

        if (!$job) {
            return redirect()->route('job_listings.index')->with('error', 'Job not found!');
        }

        // Delete the job listing
        $job->delete();

        // Redirect back to the job listings page with success message
        return redirect()->route('job_listings.index')->with('success', 'Job listing deleted successfully!');
    }
}
