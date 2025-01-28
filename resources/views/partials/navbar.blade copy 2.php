<nav class="bg-white shadow-lg fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="" class="flex items-center">
                {{-- <img src="/images/image.png" alt="Logo" class="h-10"> --}}
                Jobs Nepal
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="/home" class="text-gray-900 font-sm transition duration-300 ease-in-out hover:text-blue-500 hover:underline">Home</a>
                <a href="" class="text-gray-900 font-sm transition duration-300 ease-in-out hover:text-blue-500 hover:underline">Find Jobs</a>
                <a href="" class="text-gray-900 font-sm transition duration-300 ease-in-out hover:text-blue-500 hover:underline">Companies</a>

                @auth
                <div class="relative group">
                    <button class="bg-gray-900 text-white px-4 py-2 rounded-lg hover:underline">{{ auth()->user()->name }}</button>
                    <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48">
                        <a href="/profile" class="block px-4 py-2 text-gray-900 hover:text-blue-500 hover:underline">My Profile</a>
                        <a href="/applications" class="block px-4 py-2 text-gray-900 hover:text-blue-500 hover:underline">My Applications</a>
                        <a href="/saved-jobs" class="block px-4 py-2 text-gray-900 hover:text-blue-500 hover:underline">Saved Jobs</a>
                        <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                            @csrf
                            <button type="submit" class="text-gray-900 hover:text-blue-500 hover:underline w-full text-left">Logout</button>
                        </form>
                    </div>
                </div>
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
            <a href="/home" class="block text-gray-900 font-sm transition duration-300 ease-in-out hover:text-blue-500 hover:underline">Home</a>
            <a href="/find-jobs" class="block text-gray-900 font-sm transition duration-300 ease-in-out hover:text-blue-500 hover:underline">Find Jobs</a>
            <a href="/companies" class="block text-gray-900 font-sm transition duration-300 ease-in-out hover:text-blue-500 hover:underline">Companies</a>

            @auth
            <div class="mt-4 border-t border-gray-200 pt-4 px-2">
                <a href="/profile" class="block text-gray-900 hover:text-blue-500 hover:underline">My Profile</a>
                <a href="/applications" class="block text-gray-900 hover:text-blue-500 hover:underline">My Applications</a>
                <a href="/saved-jobs" class="block text-gray-900 hover:text-blue-500 hover:underline">Saved Jobs</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full text-left text-gray-900 hover:text-blue-500 hover:underline">Logout</button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuButton = document.getElementById('mobile-menu-button');

        if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Close mobile menu on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // Tailwind's md breakpoint
            document.getElementById('mobile-menu').classList.add('hidden');
        }
    });
</script>
