@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Header Section with Modern Design -->
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 px-8 py-12 relative">
            {{-- <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div> --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between relative z-10">
                <div class="flex-1">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">
                        {{ $job->job_type }}
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $job->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($job->status) }}
                    </span>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 leading-tight">{{ $job->job_title }}</h1>
                    <p class="text-gray-300 text-lg flex items-center">
                        {{-- <span class="font-medium">{{ $job->company->com_name ?? 'Company Confidential' }}</span>
                        <span class="mx-2">•</span> --}}
                        <span class="text-gray-400">{{ $job->location }}</span>
                         </p>
                         <p class="text-gray-300 text-lg flex items-center">Deadline: <span class="text-gray-400">{{ \Carbon\Carbon::parse($job->application_deadline)->format('F j, Y') }}</span>
                         </p>
                </div>
                <div class="mt-8 md:mt-0 md:ml-8">
                    @if($job->company && $job->company->logo)
                        <img src="{{ asset('storage/' . $job->company->logo) }}" 
                             alt="{{ $job->company->com_name }}" 
                             class="w-28 h-28 object-cover rounded-2xl bg-white p-3 shadow-lg">
                    @else
                        <div class="w-28 h-28 flex items-center justify-center bg-white rounded-2xl shadow-lg p-3">
                            <svg class="w-14 h-14 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif
                    {{-- <div class="text-white/90 flex items-center">
                        <p class="font-medium">Deadline:</p>
                        <p class="text-sm">{{ \Carbon\Carbon::parse($job->application_deadline)->format('F j, Y') }}</p>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Quick Stats Bar -->
        <div class="grid grid-cols-3 md:grid-cols-4 gap-4 px-8 py-6 bg-gray-50 border-b border-gray-200">
            <div class="text-center">
                <p class="text-sm text-gray-500 mb-1">Salary</p>
                <p class="text-lg font-semibold text-gray-900">${{ number_format($job->salary) }}/yr</p>
            </div>
            <div class="text-center">
                <p class="text-sm text-gray-500 mb-1">Experience</p>
                <p class="text-lg font-semibold text-gray-900">{{ $job->experience_years }} years</p>
            </div>
            {{-- <div class="text-center">
                <p class="text-sm text-gray-500 mb-1">Status</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $job->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ ucfirst($job->status) }}
                </span>
            </div> --}}
            <div class="text-center">
                <p class="text-sm text-gray-500 mb-1">Deadline</p>
                <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($job->application_deadline)->format('M j, Y') }}</p>
            </div>
            <div class="text-center">
                <p class="text-sm text-gray-500 mb-1">No. of Applicants</p>
                {{-- <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($job->application_deadline)->format('M j, Y') }}</p> --}}
                <p class="text-lg font-semibold text-gray-900">10</p>
          
            </div>
        </div>
        <!-- Main Content -->
        <div class="p-8">
            <!-- Job Description Card -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Job Description</h2>
                <div class="prose max-w-none">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->job_description }}</p>
                </div>
            </div>

            <!-- Application Form -->
           <!-- Application Form -->
<div class="bg-white rounded-xl border border-gray-200 p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Submit Your Application</h2>
<!-- Status Messages Section --> 
<div class="fixed bottom-4 right-4 z-50 w-96">
    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4 shadow-md rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4 shadow-md rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif
    @error('cover_letter')
    <div class="bg-red-50 border-l-4 border-red-400 p-4 mt-2 shadow-md rounded">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-red-700">{{ $message }}</p>
            </div>
        </div>
    </div>
@enderror
</div>
    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-blue-700">
                    Your resume from your profile will be automatically included with this application.
                </p>
            </div>
        </div>
    </div>

    @php
        $applicant = \App\Models\Applicant::where('user_id', auth()->id())->first();
        $hasApplied = false;
        if ($applicant) {
            $hasApplied = \App\Models\JobApplication::where('applicant_id', $applicant->id)
                          ->where('jobid', $job->jobid)
                          ->exists();
        }
    @endphp

    @if (!$applicant || !$applicant->resume)
        <p class="text-red-600 font-semibold mt-4">You must upload a resume in your profile before applying.</p>
    @elseif (!$hasApplied)
        <form action="{{ route('job_applications.store', ['jobid' => $job->jobid]) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="cover_letter" class="block text-sm font-medium text-gray-700 mb-2">
                    Cover Letter
                </label>
                <div class="relative">
                    <textarea
                        id="cover_letter"
                        name="cover_letter"
                        rows="6"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('cover_letter') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                        placeholder="Tell us why you're perfect for this role..."
                    >{{ old('cover_letter') }}</textarea>

                </div>
                
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="{{ url()->previous() }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Submit
                </button>
            </div>
        </form>
    @else
        <p class="text-blue-600 font-semibold mt-4">You have already applied for this job.</p>
    @endif
</div>
</div>

        </div>
    </div>

    <!-- Similar Jobs Section -->
    @if(isset($otherJobs) && $otherJobs->count())
    <div class="mt-12  px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Similar Opportunities</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($otherJobs as $otherJob)
            <div class="group bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 p-6 border border-gray-200">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-900">{{ $otherJob->job_title }}</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $otherJob->job_type }}
                    </span>
                </div>
                <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($otherJob->job_description, 100) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">${{ number_format($otherJob->salary) }}/year</span>
                    <a
                      class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-blue-600 group-hover:translate-x-1 transition-transform duration-200">
                        View Position
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection