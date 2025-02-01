<footer class="bg-gray-900 text-gray-300">
@auth
@if(auth()->user()->isApplicant())
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-white font-semibold mb-4">For Job Seekers</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Browse Jobs</a></li>
                    <li><a href="#" class="hover:text-white">Career Advice</a></li>
                    <li><a href="#" class="hover:text-white">Resume Builder</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-4">For Employers</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Post a Job</a></li>
                    <li><a href="#" class="hover:text-white">Browse Candidates</a></li>
                    <li><a href="#" class="hover:text-white">Pricing</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-4">Company</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">About Us</a></li>
                    <li><a href="#" class="hover:text-white">Contact</a></li>
                    <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-4">Connect</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-white"><i data-feather="facebook"></i></a>
                    <a href="#" class="hover:text-white"><i data-feather="twitter"></i></a>
                    <a href="#" class="hover:text-white"><i data-feather="linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center">
            <p>&copy; 2024 JobsNepal. All rights reserved.</p>
        </div>
    </div>
    @else
    <div class="max-w-7xl mx-auto px-4 py-12 sm:py-16">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
            <!-- Company Info -->
            <div class="md:col-span-2">
                <div class="flex items-center mb-6">
                    {{-- <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg> --}}
                    <span class="ml-2 text-xl font-bold text-white">
                         <!-- Display the company logo if available -->
                         <img src="{{ asset('storage/' . (auth()->user()->company->logo ?? 'default-logo.png')) }}" 
                         alt="Company Logo"
                         class="w-8 h-8 rounded-full"> 
                    </span>
                </div>
                <p class="text-sm text-white-400">
                    Connecting companies with top talent worldwide. Build your dream team faster with our intelligent hiring solutions.
                </p>
                
                <!-- Social Links -->
                <div class="mt-6 flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i data-feather="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i data-feather="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i data-feather="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i data-feather="youtube" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- For Employers -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase mb-4">For Employers</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Post a Job</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Search Candidates</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Employer Dashboard</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Hiring Resources</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Success Stories</a></li>
                </ul>
            </div>

            <!-- Solutions -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase mb-4">Solutions</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Recruitment Marketing</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Candidate Matching</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Talent Analytics</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Employer Branding</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Enterprise Solutions</a></li>
                </ul>
            </div>

            <!-- Legal & Support -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase mb-4">Legal & Support</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Cookie Settings</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contact Support</a></li>
                </ul>
            </div>
        </div>

        <!-- Newsletter -->
        {{-- <div class="mt-12 pt-8 border-t border-gray-800">
            <div class="max-w-md">
                <h3 class="text-sm font-semibold text-white uppercase mb-4">Subscribe to Our Newsletter</h3>
                <form class="flex gap-2">
                    <input type="email" placeholder="Enter your email" 
                           class="flex-1 bg-gray-800 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button type="submit" 
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                        Subscribe
                    </button>
                </form>
                <p class="mt-2 text-xs text-gray-400">Get hiring insights and product updates</p>
            </div>
        </div> --}}

        <!-- Copyright -->
        <div class="mt-8 pt-8 border-t border-gray-800 text-center text-sm text-gray-400">
            <p>&copy; 2024 JobsNepal. All rights reserved.</p>
            <p class="mt-1">Made with ❤️ for better hiring</p>
        </div>
    </div>
    @endauth
    @endauth
</footer>
