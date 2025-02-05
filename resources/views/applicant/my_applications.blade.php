@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">My Job Applications</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($applications->isEmpty())
        <p class="text-gray-600">You haven't applied for any jobs yet.</p>
    @else
        <div class="space-y-4">
            @foreach($applications as $application)
            <div class="p-4 border rounded-md shadow-sm hover:shadow-md transition">
                <h2 class="text-xl font-semibold text-gray-700">
                    {{ $application->job->job_title }}
                </h2>
                <p class="text-gray-600">
                    at <span class="font-semibold">{{ $application->job->company->com_name ?? 'Company Confidential' }}</span>
                </p>
                <p class="text-sm text-gray-500">
                    Applied on: {{ $application->created_at->format('F j, Y') }}
                </p>
                <p class="text-sm text-gray-500">
                    Status: <span class="font-semibold">{{ $application->status }}</span>
                </p>
                <a href="{{ route('applicant.job_listings.show', ['id' => $application->job->jobid]) }}" 
                   class="text-blue-600 hover:underline mt-2 inline-block">
                    View Job Details
                </a>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
