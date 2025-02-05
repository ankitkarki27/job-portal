@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-2xl border border-gray-200">
        {{-- Corporate Header --}}
        <div class="bg-slate-800 text-white p-6 flex items-center justify-between rounded-t-xl">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h2 class="text-2xl font-bold tracking-tight">Application Submission Details</h2>
            </div>
            <span class="text-sm text-gray-300">Application_id:#{{ $application->applications_id }}</span>
        </div>

        {{-- Detailed Information Grid --}}
        <div class="grid md:grid-cols-3 gap-6 p-8">
            {{-- Job Information --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-700 mb-4 border-b pb-2">Job Details</h3>
                <div class="space-y-3">
                    <p class="text-sm"><span class="font-medium text-slate-600">Position:</span> {{ $application->job->job_title }}</p>
                    <p class="text-sm"><span class="font-medium text-slate-600">Company:</span> {{ $application->job->com_name }}</p>
                    <p class="text-sm"><span class="font-medium text-slate-600">Location:</span> {{ $application->job->location }}</p>
                    <p class="text-sm"><span class="font-medium text-slate-600">Deadline:</span> {{ \Carbon\Carbon::parse($application->job->application_deadline)->format('F j, Y') }}</p>
                </div>
            </div>

            {{-- Application Status --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-700 mb-4 border-b pb-2">Application Status</h3>
                <div class="flex items-center">
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-2">Last Updated: {{ $application->updated_at->diffForHumans() }}</p>
            </div>

            {{-- Application Date --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-700 mb-4 border-b pb-2">Submission Information</h3>
                <p class="text-sm"><span class="font-medium text-slate-600">Applied On:</span> {{ \Carbon\Carbon::parse($application->created_at)->format('F j, Y - h:i A') }}</p>
                <p class="text-xs text-gray-500 mt-2">Submission Channel: Online Portal</p>
            </div>

            {{-- Cover Letter --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 shadow-sm col-span-2">
                <h3 class="text-lg font-semibold text-slate-700 mb-4 border-b pb-2">Cover Letter</h3>
                <p class="text-sm text-gray-700 whitespace-pre-line">
                    {{ $application->cover_letter ?? 'No Cover Letter Provided' }}
                </p>
            </div>

            {{-- Resume --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-700 mb-4 border-b pb-2">Resume</h3>
                @if ($application->applicant->resume)
                    <a href="{{ asset('storage/' . $application->applicant->resume) }}" 
                       target="_blank" 
                       class="text-blue-600 hover:text-blue-800 text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                        </svg>
                        View Resume Document
                    </a>
                @else
                    <p class="text-gray-500 text-sm">No Resume Uploaded</p>
                @endif
            </div>
        </div>

        {{-- Action Section --}}
        <div class="bg-gray-100 p-6 rounded-b-xl flex justify-end space-x-4">
            <a href="" class="px-5 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                </svg>
                Edit Application
            </a>
            <form action="{{ route('job_applications.destroy', $application->applications_id) }}" method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete this application?');" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-5 py-2.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Delete
                </button>
            </form>
            <a href="{{ route('job_applications.index') }}" class="px-5 py-2.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
                Back to Applications
            </a>
        </div>
    </div>
</div>
@endsection