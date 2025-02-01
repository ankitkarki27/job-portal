<html>
    <head>
    </head>
</head>
<body>
    

<nav class="bg-white shadow-lg fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="/" class="flex items-center">
                <img src="/images/image.png" alt="Logo" class="h-10">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                @auth
                    @if(auth()->user()->isApplicant())
                        <div class="flex space-x-6">
                            <a href="{{ route('applicant.home') }}" class="text-gray-900 hover:text-blue-500 font-semibold">Dashboard</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">My Profile</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">Find Jobs</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">My Applications</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">Saved Jobs</a>

                            <!-- User Dropdown -->
                            <div class="relative">
                                <button id="applicant-dropdown-button" class="text-gray-900 hover:text-blue-500 font-semibold flex items-center space-x-2">
                                    <span>{{ auth()->user()->name }}</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            
                                <!-- Dropdown Content -->
                                <div id="applicant-dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 shadow-lg rounded-lg py-2">
                                    <a href="" class="block px-4 py-2 text-gray-900 hover:bg-gray-100">View Profile</a>
                                    <a href="" class="block px-4 py-2 text-gray-900 hover:bg-gray-100">My Applications</a>
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-900 hover:bg-gray-100">Logout</button>
                                    </form>
                                </div>
                            </div>
                    @else
                        <div class="flex space-x-6">
                            <a href="{{ route('company.home') }}" class="text-gray-900 hover:text-blue-500 font-semibold">Dashboard</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">Post a Job</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">Manage Jobs</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">Applicants</a>
                            <a href="" class="text-gray-900 hover:text-blue-500 font-semibold">Company Profile</a>

                            <!-- Company User Dropdown -->
                            <div class="relative">
                                <button id="company-dropdown-button" class="text-gray-900 hover:text-blue-500 font-semibold flex items-center space-x-2">
                                    <span>{{ auth()->user()->name }}</span>
                                    <img src="/images/company-logo.png" alt="Company Logo" class="w-6 h-6 rounded-full">
                                </button>
                            
                                <!-- Dropdown Content -->
                                <div id="company-dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 shadow-lg rounded-lg py-2">
                                    <a href="" class="block px-4 py-2 text-gray-900 hover:bg-gray-100">View Profile</a>
                                    <a href="" class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Manage Jobs</a>
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-900 hover:bg-gray-100">Logout</button>
                                    </form>
                                </div>
                            </div>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-blue-500 font-semibold">Login</a>
                    <a href="{{ route('register.applicant') }}" class="bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-900">Applicant</a>
                    <a href="{{ route('register.company') }}" class="bg-white text-black border border-black px-4 py-2 rounded-lg hover:bg-gray-300 hover:text-black">Company</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-900 hover:text-blue-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            @auth
                @if(auth()->user()->isApplicant())
                    <div class="space-y-4 px-2 pt-2">
                        <a href="{{ route('applicant.home') }}" class="block text-gray-900 hover:text-blue-500 font-semibold">Dashboard</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">My Profile</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">Find Jobs</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">My Applications</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">Saved Jobs</a>
                    </div>
                @else
                    <div class="space-y-4 px-2 pt-2">
                        <a href="{{ route('company.home') }}" class="block text-gray-900 hover:text-blue-500 font-semibold">Dashboard</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">Post a Job</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">Manage Jobs</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">Applicants</a>
                        <a href="" class="block text-gray-900 hover:text-blue-500 font-semibold">Company Profile</a>
                    </div>
                @endif
                <div class="mt-4 border-t border-gray-200 pt-4 px-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-gray-900 hover:text-blue-500 font-semibold">Logout</button>
                    </form>
                </div>
            @else
                <div class="space-y-4 px-2 pt-2">
                    <a href="{{ route('login') }}" class="block text-gray-900 hover:text-blue-500 font-semibold">Login</a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function toggleDropdown(buttonId, menuId) {
            const button = document.getElementById(buttonId);
            const menu = document.getElementById(menuId);
    
            button.addEventListener("click", function (event) {
                event.stopPropagation(); 
                menu.classList.toggle("hidden");
            });
    
            document.addEventListener("click", function (event) {
                if (!button.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.add("hidden");
                }
            });
        }
    
        toggleDropdown("applicant-dropdown-button", "applicant-dropdown-menu");
        toggleDropdown("company-dropdown-button", "company-dropdown-menu");
    });
    </script>
    </body></html>