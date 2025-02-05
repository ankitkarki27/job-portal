@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Applications</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($applications->isEmpty())
        <p>You have not applied for any jobs yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->job->title }}</td>
                        <td><span class="badge bg-primary">{{ $application->status }}</span></td>
                        <td>
                            <a href="{{ route('job_applications.show', $application->applications_id) }}" class="text-indigo-600 hover:text-indigo-900">
                                View
                            </a>
                            <a href="{{ route('job_applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('job_applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
