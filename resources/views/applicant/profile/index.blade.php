@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 border-b border-gray-100 pb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Your Profile</h2>
                    <p class="mt-1 text-gray-500">Manage your personal and professional information</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('profile.edit') }}" 
                       class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Profile
                    </a>
                    
                    <a href="{{ route('profile.delete') }}" 
                     class="inline-flex items-center px-4 py-2 bg-white border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete Profile
                    </a>
                    
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Personal Information Card -->
            <div class="border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-6 text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Personal Information
                    </h3>
                    <dl class="space-y-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                            <dd class="mt-2 text-gray-900">{{ auth()->user()->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                            <dd class="mt-2 text-gray-900">{{ auth()->user()->email }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                            <dd class="mt-2 text-gray-900">{{ $profile->phone ?? 'Not provided' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <dd class="mt-2 text-gray-900">{{ $profile->address ?? 'Not provided' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Professional Information Card -->
            <div class="border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-6 text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Professional Details
                    </h3>
                    <dl class="space-y-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Skills</dt>
                            <dd class="mt-2 text-gray-900">{{ $profile->skills ?? 'No skills listed' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Education</dt>
                            <dd class="mt-2 text-gray-900">{{ $profile->education ?? 'Not provided' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Experience</dt>
                            <dd class="mt-2 text-gray-900">{{ $profile->experience ?? 'No experience listed' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Resume Section -->
            <div class="md:col-span-2 border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-6 text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Resume
                    </h3>
                    @if($profile->resume && $profile->resume !== 'default_resume.pdf')
                        <div class="border border-gray-100 rounded-xl p-6">
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-50 p-3 rounded-lg mr-4">
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-medium text-gray-900">{{ basename($profile->resume) }}</h4>
                                        <p class="text-sm text-gray-500">Last updated: {{ \Carbon\Carbon::now()->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <a href="{{ asset('storage/' . $profile->resume) }}" 
                                       class="group inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200"
                                       download>
                                        <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        Download
                                    </a>
                                    <a href="{{ route('profile.resume.edit') }}"
                                       class="group inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Update Resume
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-12">
                            <div class="text-center">
                                <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-blue-50 mb-4">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">No Resume Uploaded</h4>
                                <p class="text-gray-500 mb-6">Upload your resume to showcase your qualifications</p>
                                <a href="{{ route('profile.resume.edit') }}"
                                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                    </svg>
                                    Upload Resume
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection