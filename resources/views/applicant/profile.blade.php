@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ auth()->user()->name }}</h1>

    @if(!$isProfileComplete)
        <div class="alert alert-warning">
            <strong>Warning!</strong> Please complete your profile before applying for any jobs.
            <a href="{{ route('applicant.profile.edit') }}" class="btn btn-link">Complete Your Profile</a>
        </div>
    @endif

    <h2>Your Profile</h2>
    <ul>
        <li><strong>Resume:</strong> {{ $applicant->resume ? 'Uploaded' : 'Not uploaded' }}</li>
        <li><strong>Skills:</strong> {{ $applicant->skills ?? 'Not added' }}</li>
        <li><strong>Education:</strong> {{ $applicant->education ?? 'Not added' }}</li>
        <li><strong>Experience:</strong> {{ $applicant->experience ?? 'Not added' }}</li>
        <li><strong>Address:</strong> {{ $applicant->address ?? 'Not added' }}</li>
    </ul>

    <a href="{{ route('applicant.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>
@endsection
