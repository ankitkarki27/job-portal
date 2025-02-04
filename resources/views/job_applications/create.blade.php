@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Apply for {{ $job->title }}</h2>
    <form action="{{ route('job_applications.store', $job->jobid) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Cover Letter</label>
            <textarea class="form-control" name="cover_letter" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>
</div>
@endsection
