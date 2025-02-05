@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-2xl border border-gray-200">
        {{-- Header --}}
        <div class="bg-slate-800 text-white p-6 flex items-center justify-between rounded-t-xl">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <h2 class="text-2xl font-bold tracking-tight">Edit Job Application</h2>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('job_applications.update', $application->applications_id) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            {{-- Job Information Section --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                    <input type="text" name="job_title" value="{{ $application->job->job_title }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                    <input type="text" name="company_name" value="{{ $application->job->company_name }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- Location & Deadline --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <input type="text" name="location" value="{{ $application->job->location }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Application Deadline</label>
                    <input type="date" name="application_deadline" 
                           value="{{ \Carbon\Carbon::parse($application->job->application_deadline)->format('Y-m-d') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- Application Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Application Status</label>
                <select name="status" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $application->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            {{-- Cover Letter --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cover Letter</label>
                <textarea name="cover_letter" rows="5" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $application->cover_letter }}</textarea>
            </div>

            {{-- Resume Upload --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Update Resume</label>
                <input type="file" name="resume" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if ($application->applicant->resume)
                    <p class="text-sm text-gray-500 mt-2">Current resume: {{ basename($application->applicant->resume) }}</p>
                @endif
            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end space-x-4 pt-6">
                <a href="{{ route('job_applications.show', $application->applications_id) }}" 
                   class="px-5 py-2.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm flex items-center">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm flex items-center">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection