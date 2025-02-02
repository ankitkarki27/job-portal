@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-24">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Your Profile</h2>
        <div class="flex gap-4">
            <!-- Edit Profile Button -->
            <a href="{{ route('profile.edit') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                <i data-feather="edit" class="w-4 h-4 mr-2"></i>
                Edit Profile
            </a>
            <!-- Delete Profile Button (routes to a confirmation page) -->
            <a href="{{ route('profile.delete') }}" 
               class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200">
                <i data-feather="trash-2" class="w-4 h-4 mr-2"></i>
                Delete Profile
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Personal Information -->
        <div class="bg-gray-50 p-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-700">
                <i data-feather="user" class="w-5 h-5 inline-block mr-2"></i>
                Personal Information
            </h3>
            <dl class="space-y-3">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                    <dd class="mt-1 text-gray-900">{{ auth()->user()->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                    <dd class="mt-1 text-gray-900">{{ auth()->user()->email }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                    <dd class="mt-1 text-gray-900">{{ $profile->phone ?? 'Not provided' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                    <dd class="mt-1 text-gray-900">{{ $profile->address ?? 'Not provided' }}</dd>
                </div>
            </dl>
        </div>

        <!-- Professional Information -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4 text-gray-700">
                <i data-feather="briefcase" class="w-5 h-5 inline-block mr-2"></i>
                Professional Details
            </h3>
            <dl class="space-y-3">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Skills</dt>
                    <dd class="mt-1 text-gray-900">
                        {{ $profile->skills ?? 'No skills listed' }}
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Education</dt>
                    <dd class="mt-1 text-gray-900">{{ $profile->education ?? 'Not provided' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Experience</dt>
                    <dd class="mt-1 text-gray-900">{{ $profile->experience ?? 'No experience listed' }}</dd>
                </div>
            </dl>
        </div>

        <!-- Resume Section -->
        <div class="md:col-span-2 bg-gray-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4 text-gray-700">
                <i data-feather="file-text" class="w-5 h-5 inline-block mr-2"></i>
                Resume
            </h3>
            @if($profile->resume && $profile->resume !== 'default_resume.pdf')
                <div class="flex items-center justify-between bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center">
                        <i data-feather="file" class="w-6 h-6 text-blue-500 mr-3"></i>
                        <span class="text-gray-700">{{ basename($profile->resume) }}</span>
                    </div>
                    <a href="{{ asset('storage/' . $profile->resume) }}" 
                       class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200"
                       download>
                        <i data-feather="download" class="w-4 h-4 mr-2"></i>
                        Download
                    </a>
                </div>
            @else
                <div class="text-center py-6 text-gray-500">
                    <i data-feather="alert-circle" class="w-8 h-8 mx-auto mb-3"></i>
                    No resume uploaded yet
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();
    });
</script>
@endpush
@endsection
