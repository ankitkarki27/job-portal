<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Find Your Dream Job</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: white;
        }
    </style>
</head>

<body class="bg-white">
    @include('partials.navbar')

    <!-- Hero Section -->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-6">Find Your Dream Job Today</h1>
                <p class="text-xl text-blue-800 mb-8">Connect with over 10,000+ employers and start your next career journey</p>
                
                <!-- Search Box -->
                <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-4">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text" placeholder="Job title or keyword" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="flex-1">
                            <input type="text" placeholder="Location" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <button class="bg-gray-900 text-white px-8 py-2 rounded-lg hover:bg-blue-700">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Featured Jobs Section -->
    <div class="bg-gray-50">
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
   
    @include('partials.footer')

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
</body>
</html>