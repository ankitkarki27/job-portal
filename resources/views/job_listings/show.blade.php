@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-3xl font-bold text-gray-900">{{ $job->job_title }}</h1>
    <p class="text-gray-600">{{ $job->company->com_name ?? 'Company Confidential' }}</p>

    <div class="mt-4">
        <p class="text-gray-700"><strong>Location:</strong> {{ $job->location }}</p>
        <p class="text-gray-700"><strong>Salary:</strong> ${{ number_format($job->salary) }} per year</p>
        <p class="text-gray-700"><strong>Job Type:</strong> {{ $job->job_type ?? 'Full-time' }}</p>
    </div>

    <div class="mt-6">
        <a href="#" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Apply Now
        </a>
    </div>
</div>
@endsection
