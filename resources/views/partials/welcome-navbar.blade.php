<nav class="bg-white shadow-lg fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="/" class="flex items-center">
                <img src="/images/image.png" alt="Logo" class="h-10">
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                     <a href="{{ route('login') }}" class="text-gray-900 hover:text-blue-500 font-semibold">Login</a>
                    <a href="{{ route('register.applicant') }}" class="bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-900">Applicant</a>
                    <a href="{{ route('register.company') }}" class="bg-white text-black border border-black px-4 py-2 rounded-lg hover:bg-gray-300 hover:text-black">Company</a>
 
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
                <div class="space-y-4 px-2 pt-2">
                    <a href="{{ route('login') }}" class="block text-gray-900 hover:text-blue-500 font-semibold">Login</a>
                    <a href="{{ route('register.applicant') }}" class="block bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-900">Register as Applicant</a>
                    <a href="{{ route('register.company') }}" class="block bg-white text-black border border-black px-4 py-2 rounded-lg hover:bg-gray-300 hover:text-black">Register as Company</a>
                </div>
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