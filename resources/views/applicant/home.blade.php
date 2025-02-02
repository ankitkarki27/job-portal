@extends('layouts.app')

@section('title', 'Job Portal - Find Your Dream Job')

@section('content')
    <!-- Hero Section -->

<!-- Hero Section -->
<div class="relative">
    <!-- Background Pattern -->
    <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
        <div class="text-center">
            <!-- Main Content -->
            <div class="space-y-6 mb-12">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight">
                    Find Your <span class="text-blue-600">Dream Job</span> Today
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                    Connect with over <span class="font-semibold text-blue-600">10,000+</span> employers and start your next career journey
                </p>
            </div>

            <!-- Search Box -->
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-xl shadow-2xl p-4 md:p-6 backdrop-blur-sm bg-opacity-80">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1 relative">
                            <svg class="w-5 h-5 absolute left-3 top-3 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" 
                                placeholder="Job title or keyword" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>
                        <div class="flex-1 relative">
                            <svg class="w-5 h-5 absolute left-3 top-3 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <input type="text" 
                                placeholder="Location" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>
                        <button class="bg-gray-900 text-white px-8 py-3 rounded-lg hover:bg-gray-900 transform">
                            Search Jobs
                        </button>
                    </div>
                </div>

                <!-- Popular Searches -->
                <div class="mt-6 flex flex-wrap justify-center gap-2 text-sm text-gray-900">
                    <span class="font-medium">Popular:</span>
                    <a href="#" class="hover:text-blue-600 transition-colors">Remote</a>
                    <span class="text-gray-300">•</span>
                    <a href="#" class="hover:text-blue-600 transition-colors">Full-time</a>
                    <span class="text-gray-300">•</span>
                    <a href="#" class="hover:text-blue-600 transition-colors">Technology</a>
                    <span class="text-gray-300">•</span>
                    <a href="#" class="hover:text-blue-600 transition-colors">Marketing</a>
                </div>
            </div>
        </div>
    </div>
</div>
   
    <!-- Featured Jobs Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Featured Jobs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Job Card -->
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <img src="/api/placeholder/48/48" alt="Company logo" class="rounded">
                        <span class="text-gray-600 font-medium bg-gray-100 px-3 py-1 rounded-full text-sm">Full Time</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Senior Software Engineer</h3>
                    <p class="text-gray-600 mb-4">TechCorp Solutions</p>
                    <div class="flex items-center text-gray-500 mb-4">
                        <i data-feather="map-pin" class="w-4 h-4 mr-2"></i>
                        <span>San Francisco, CA</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700 font-medium">$120k - $150k</span>
                        <button class="text-gray-900 hover:text-gray-700 font-medium">Apply Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Why Choose JobConnect?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 bg-white rounded-lg border border-gray-100">
                    <div class="bg-gray-50 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i data-feather="briefcase" class="w-8 h-8 text-gray-900"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">10,000+ Jobs</h3>
                    <p class="text-gray-600">Find opportunities from leading companies across industries</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-6 bg-white rounded-lg border border-gray-100">
                    <div class="bg-gray-50 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i data-feather="users" class="w-8 h-8 text-gray-900"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Verified Employers</h3>
                    <p class="text-gray-600">Connect with legitimate companies and secure opportunities</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-6 bg-white rounded-lg border border-gray-100">
                    <div class="bg-gray-50 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i data-feather="trending-up" class="w-8 h-8 text-gray-900"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Career Growth</h3>
                    <p class="text-gray-600">Access resources and tools to advance your career</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Ready to Find Your Next Opportunity?</h2>
                <p class="text-xl text-gray-600 mb-8">Join thousands of professionals who've found their dream jobs through JobConnect</p>
                <button class="bg-gray-900 text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-800 transition-colors">Get Started Now</button>
            </div>
        </div>
    </div>
   
        <script>
        // Initialize Feather Icons
        feather.replace();
        
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
    
        // Toggle mobile menu on hamburger click
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
@endsection