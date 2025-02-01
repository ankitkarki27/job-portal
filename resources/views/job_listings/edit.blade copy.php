<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Listing - JobConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>


<body class="bg-gray-50">
    @include('partials.navbar')
    
    <div class="container mx-auto px-4 my-12 max-w-4xl">
        <div class="bg-white p-8 rounded-lg">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Edit Job Listing</h2>

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-700">There were {{ $errors->count() }} errors with your submission</h3>
                            <div class="mt-2 text-sm text-red-600">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <form action="{{ route('job_listings.update', $job->jobid) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="job_title" class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                            <input type="text" id="job_title" name="job_title" value="{{ old('job_title', $job->job_title) }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                            <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700 mb-2">Salary</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">$</span>
                                </div>
                                <input type="number" id="salary" name="salary" value="{{ old('salary', $job->salary) }}" 
                                       class="block w-full pl-7 pr-12 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <div>
                            <label for="application_deadline" class="block text-sm font-medium text-gray-700 mb-2">Application Deadline</label>
                            <input type="date" id="application_deadline" name="application_deadline" 
                                   value="{{ old('application_deadline', $job->application_deadline) }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="job_type" class="block text-sm font-medium text-gray-700 mb-2">Job Type</label>
                            <select id="job_type" name="job_type" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Full-Time" @if(old('job_type', $job->job_type) == 'Full-Time') selected @endif>Full-Time</option>
                                <option value="Part-Time" @if(old('job_type', $job->job_type) == 'Part-Time') selected @endif>Part-Time</option>
                                <option value="Contract" @if(old('job_type', $job->job_type) == 'Contract') selected @endif>Contract</option>
                                <option value="Internship" @if(old('job_type', $job->job_type) == 'Internship') selected @endif>Internship</option>
                            </select>
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select id="status" name="status" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="open" @if(old('status', $job->status) == 'open') selected @endif>Open</option>
                                <option value="closed" @if(old('status', $job->status) == 'closed') selected @endif>Closed</option>
                            </select>
                        </div>

                        <div>
                            <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-2">Experience Required</label>
                            <div class="relative rounded-md shadow-sm">
                                <input type="number" id="experience_years" name="experience_years" 
                                       value="{{ old('experience_years', $job->experience_years) }}" 
                                       class="block w-full pr-12 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">years</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full-width Description -->
                <div class="mt-6">
                    <label for="job_description" class="block text-sm font-medium text-gray-700 mb-2">Job Description</label>
                    <textarea id="job_description" name="job_description" rows="5" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('job_description', $job->job_description) }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-colors duration-200 font-medium shadow-sm">
                        Update Job Listing
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>