@extends('layouts.app')

@section('content')
<body class="bg-gray-800">
    <!-- Main Content -->
    <div class="bg-gray-100 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold mb-4">Filters</h3>
                    
                    <!-- Job Type -->
                    <div class="mb-6">
                        <h4 class="font-medium mb-3">Job Type</h4>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-gray-900 focus:ring-gray-900">
                                <span class="ml-2 text-gray-600">Full Time</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-gray-900 focus:ring-gray-900">
                                <span class="ml-2 text-gray-600">Part Time</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-gray-900 focus:ring-gray-900">
                                <span class="ml-2 text-gray-600">Remote</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-gray-900 focus:ring-gray-900">
                                <span class="ml-2 text-gray-600">Contract</span>
                            </label>
                        </div>
                    </div>

                    <!-- Experience Level -->
                    <div class="mb-6">
                        <h4 class="font-medium mb-3">Experience Level</h4>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-gray-900 focus:ring-gray-900">
                                <span class="ml-2 text-gray-600">Entry Level</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-gray-900 focus:ring-gray-900">
                                <span class="ml-2 text-gray-600">Mid Level</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-gray-900 focus:ring-gray-900">
                                <span class="ml-2 text-gray-600">Senior Level</span>
                            </label>
                        </div>
                    </div>

                    <!-- Salary Range -->
                    <div class="mb-6">
                        <h4 class="font-medium mb-3">Salary Range</h4>
                        <select class="w-full border border-gray-200 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            {{-- <option>Any Salary</option>
                            <option>$0 - $50k</option>
                            <option>$50k - $100k</option>
                            <option>$100k - $150k</option>
                            <option>$150k+</option> --}}
                        </select>
                    </div>
                </div>
            </div>

            <!-- Job Listings -->
            <div class="lg:col-span-3">
                <!-- Popular Job Categories -->
                {{-- <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Popular Job Categories</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <button class="p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow text-left">
                            <i data-feather="code" class="w-6 h-6 mb-2 text-gray-700"></i>
                            <h4 class="font-medium">Software Development</h4>
                            <p class="text-sm text-gray-500">1,234 jobs</p>
                        </button>
                        <button class="p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow text-left">
                            <i data-feather="pen-tool" class="w-6 h-6 mb-2 text-gray-700"></i>
                            <h4 class="font-medium">Design</h4>
                            <p class="text-sm text-gray-500">856 jobs</p>
                        </button>
                        <button class="p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow text-left">
                            <i data-feather="trending-up" class="w-6 h-6 mb-2 text-gray-700"></i>
                            <h4 class="font-medium">Marketing</h4>
                            <p class="text-sm text-gray-500">643 jobs</p>
                        </button>
                    </div>
                </div> --}}

                <!-- Job Results -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">2,467 jobs found</h3>
                        <select class="border border-gray-200 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <option>Most Recent</option>
                            <option>Most Relevant</option>
                            <option>Highest Paid</option>
                        </select>
                    </div>

                    <!-- Job Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border border-gray-100">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-4 mb-4">
                                    <img src="/api/placeholder/48/48" alt="Company logo" class="rounded-lg">
                                    <div>
                                        <h3 class="text-xl font-semibold">Senior Frontend Developer</h3>
                                        <p class="text-gray-600">TechCorp Solutions</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">Full Time</span>
                                    <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">Remote</span>
                                    <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">Senior Level</span>
                                </div>
                                <div class="flex items-center gap-4 text-gray-500 text-sm">
                                    <span class="flex items-center">
                                        <i data-feather="map-pin" class="w-4 h-4 mr-1"></i>
                                        San Francisco, CA (Remote)
                                    </span>
                                    <span class="flex items-center">
                                        <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                        Posted 2 days ago
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-semibold text-gray-900 mb-2">$120k - $150k</p>
                                <button class="text-gray-900 font-medium hover:text-gray-700">View Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- More job cards would go here -->
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="flex items-center gap-2">
                        <button class="p-2 border rounded hover:bg-gray-50">
                            <i data-feather="chevron-left" class="w-5 h-5"></i>
                        </button>
                        <button class="px-4 py-2 border rounded bg-gray-900 text-white">1</button>
                        <button class="px-4 py-2 border rounded hover:bg-gray-50">2</button>
                        <button class="px-4 py-2 border rounded hover:bg-gray-50">3</button>
                        <button class="p-2 border rounded hover:bg-gray-50">
                            <i data-feather="chevron-right" class="w-5 h-5"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
