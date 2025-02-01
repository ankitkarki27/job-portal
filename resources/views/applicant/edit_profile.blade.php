@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Your Profile</h1>

    <form action="{{ route('applicant.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="resume">Resume (PDF/Word)</label>
            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <div class="form-group">
            <label for="skills">Skills</label>
            <textarea name="skills" class="form-control" required>{{ old('skills', $applicant->skills) }}</textarea>
        </div>

        <div class="form-group">
            <label for="education">Education</label>
            <input type="text" name="education" class="form-control" value="{{ old('education', $applicant->education) }}" required>
        </div>

        <div class="form-group">
            <label for="experience">Experience</label>
            <input type="text" name="experience" class="form-control" value="{{ old('experience', $applicant->experience) }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $applicant->address) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
