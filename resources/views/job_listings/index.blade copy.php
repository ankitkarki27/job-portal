<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Top Talent - JobConnect for Employers</title>
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

    <div class="container mx-auto px-4 py-28">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Your Job Listings</h2>
                <a href="{{ route('job_listings.create') }}" class="inline-flex items-center px-6 py-3 bg-black text-white rounded-lg shadow-md hover:bg-gray-900 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Post a New Job
                </a>
            </div>

            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
                {{ session('error') }}
            </div>
            @endif

            @if($jobListings->isEmpty())
            <div class="bg-white shadow-md rounded-lg p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <p class="text-xl text-gray-600">You have not posted any job listings yet.</p>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobListings as $job)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $job->job_title }}</h3>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $job->jobid }}</h3>
                        <p class="text-sm text-gray-500 mb-1">{{ $job->company->com_name }}</p>
                        <p class="text-sm text-gray-600 mb-4">{{ Str::limit($job->job_description, 100) }}</p>
                        
                        <div class="grid grid-cols-2 gap-2 mb-4 text-sm text-gray-700">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                {{ $job->location }} . {{ $job->company->com_name }},
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M8.433 7.418c.155-.13.296-.272.423-.410.328-.348.732-.886 1.057-1.405C10.393 4.077 11 2.751 11 2v-.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v.5c0 .406.16.856.479 1.233a9.51 9.51 0 0 0 1.855 1.728c.212.152.382.429.382.714v1.57c0 .142-.037.286-.104.414L11.43 15.143a1.5 1.5 0 0 1-1.356.861H6.926a1.5 1.5 0 0 1-1.347-.863L2.104 7.714a.5.5 0 0 1 .093-.506l.637-.637a.5.5 0 0 1 .514-.125l2.78.982z" />
                                </svg>
                                ${{ number_format($job->salary, 2) }}
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1 text-purple-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                                </svg>
                                {{ $job->experience_years }} years
                            </div>
                        </div>

                        <div class="flex justify-between items-center border-t pt-4 mt-4">
                            <a href="{{ route('job_listings.edit', $job->jobid) }}" class="text-blue-600 hover:text-blue-800 transition-colors font-semibold">
                                Edit Listing
                            </a>
                            <form action="{{ route('job_listings.destroy', $job->jobid) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors font-semibold">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center">
                {{ $jobListings->links() }}
            </div>
        </div>
    </div>
    @include('partials.footer')
</body>
</html>