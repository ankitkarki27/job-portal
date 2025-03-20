<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Updated Navigation</title>
  <!-- Make sure to include Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
  <nav class="bg-white fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo -->
        <a href=""c nlass="flex items-center">
          <!-- Use a comment if not using asset function -->
          <!-- <img src="/images/image.png" alt="Logo" class="h-10"> -->
          <img src="{{ asset('images/image.png') }}" alt="Logo" class="h-10">
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-6">
          @auth
            @if(auth()->user()->isApplicant())
              <div class="flex items-center space-x-6">
                <a href="{{ route('applicant.home') }}" class="text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors duration-200">Home</a>
                <a href="{{ route('applicant.findjobs') }}" class="text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors duration-200">Find Jobs</a>
                <a href="{{ route('applicant.home') }}" class="text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors duration-200">Companies</a>

                <!-- Applicant User Dropdown -->
                <div class="relative">
                  <button id="applicant-dropdown-button" class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white text-sm font-medium flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-300 shadow">
                    <span>{{ auth()->user()->name }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </button>
                  
                  <!-- Dropdown Menu -->
                  <div id="applicant-dropdown-menu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-lg py-2">
                    <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">View Profile</a>
                    <a href="{{ route('job_applications.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">My Applications</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">Saved Jobs</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">Settings</a>
                    <hr class="my-1 border-gray-200">
                    <form method="POST" action="{{ route('logout') }}" class="block">
                      @csrf
                      <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">Logout</button>
                    </form>
                  </div>
                </div>
              </div>
            @else
              <div class="flex items-center space-x-6">
                <a href="{{ route('company.home') }}" class="text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors duration-200">Home</a>
                <a href="{{ route('job_listings.index') }}" class="text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors duration-200">Post a Job</a>
                <a href="#" class="text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors duration-200">Applicants</a>

                <!-- Company User Dropdown -->
                <div class="relative">
                  <button id="company-dropdown-button" class="flex items-center space-x-2 text-gray-800 hover:text-blue-600 transition-colors">
                    <img src="{{ asset('storage/' . (auth()->user()->company->logo ?? 'default-logo.png')) }}" 
                         alt="Company Logo"
                         class="w-8 h-8 rounded-full object-cover">
                  </button>
                  <!-- Dropdown Menu -->
                  <div id="company-dropdown-menu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-lg py-2">
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">View Profile</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">Manage Jobs</a>
                    <hr class="my-1 border-gray-200">
                    <form method="POST" action="{{ route('logout') }}" class="block">
                      @csrf
                      <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">Logout</button>
                    </form>
                  </div>
                </div>
              </div>
            @endif
          @else
            <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors duration-200">Login</a>
            <a href="{{ route('register.applicant') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 text-sm font-medium transition-colors">Applicant</a>
            <a href="{{ route('register.company') }}" class="bg-white text-gray-800 border border-gray-800 px-4 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium transition-colors">Company</a>
          @endauth
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
          <button id="mobile-menu-button" class="text-gray-800 hover:text-blue-600 focus:outline-none transition-colors">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden md:hidden">
        @auth
          @if(auth()->user()->isApplicant())
            <div class="space-y-4 px-4 py-4">
              <a href="{{ route('applicant.home') }}" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Dashboard</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">My Profile</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Find Jobs</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">My Applications</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Saved Jobs</a>
            </div>
          @else
            <div class="space-y-4 px-4 py-4">
              <a href="{{ route('company.home') }}" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Dashboard</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Post a Job</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Manage Jobs</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Applicants</a>
              <a href="#" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Company Profile</a>
            </div>
          @endif
          <div class="mt-4 border-t border-gray-200 pt-4 px-4">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Logout</button>
            </form>
          </div>
        @else
          <div class="space-y-4 px-4 py-4">
            <a href="{{ route('login') }}" class="block text-gray-800 hover:text-blue-600 text-sm font-medium transition-colors">Login</a>
          </div>
        @endauth
      </div>
    </div>
  </nav>

  <!-- Optional: Main Content -->
  <div class="pt-20">
    <!-- Your page content goes here -->
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Function for dropdown toggling
      function toggleDropdown(buttonId, menuId) {
        const button = document.getElementById(buttonId);
        const menu = document.getElementById(menuId);

        if (!button || !menu) return;

        button.addEventListener("click", function (event) {
          event.stopPropagation();
          // Close any other dropdown menus
          document.querySelectorAll(".dropdown-menu").forEach(dropdown => {
            if (dropdown !== menu) {
              dropdown.classList.add("hidden");
            }
          });
          // Toggle current dropdown
          menu.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
          if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.add("hidden");
          }
        });
      }

      // Initialize dropdowns for both applicant and company users
      toggleDropdown("applicant-dropdown-button", "applicant-dropdown-menu");
      toggleDropdown("company-dropdown-button", "company-dropdown-menu");

      // Mobile menu toggle
      const mobileMenuButton = document.getElementById("mobile-menu-button");
      const mobileMenu = document.getElementById("mobile-menu");

      mobileMenuButton.addEventListener("click", function (event) {
        event.stopPropagation();
        mobileMenu.classList.toggle("hidden");
      });

      document.addEventListener("click", function (event) {
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
          mobileMenu.classList.add("hidden");
        }
      });
    });
  </script>
</body>
</html>
