@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Applications</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Cover Letter</th>
                <th>Resume</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->job->title }}</td>
                    <td>{{ $application->cover_letter }}</td>
                    <td>
                        @if ($application->applicant->resume)
                            <a href="{{ asset('storage/' . $application->applicant->resume) }}" target="_blank">View Resume</a>
                        @else
                            No Resume Uploaded
                        @endif
                    </td>
                    <td>{{ ucfirst($application->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
