<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Find Your Dream Job</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liter&family=Mako&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <style>
            body {
             
                font-family: "Ubuntu", serif;
            }
       </style>
</head>

<body class="bg-white">

@include('partials.welcome-navbar')

    <!-- Hero Section -->
    <section id="home" class="bg-white text-black pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center md:text-left">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <!-- Text Section -->
                <div class="order-last md:order-first">
                    <h1 class="text-4xl text-left md:text-5xl font-bold leading-right">
                        Find Your Perfect Job Today and Start Your Career Journey.
                    </h1>
                    <p class="text-lg mt-4 text-left">
                        Join thousands of job seekers and top companies on the most reliable platform for opportunities.
                    </p>
                    
                    <div class="mt-8 flex flex-wrap gap-4 justify-left md:justify-start">
                        <button class="bg-gray-900 hover:bg-gray-900 text-white font-semibold px-6 py-3 rounded-lg">
                           Find Jobs
                        </button>
                        <button class="bg-white border border-black text-black hover:bg-gray-300 hover:text-black font-semibold px-6 py-3 rounded-lg">
                            Post New Jobs
                        </button>
                    </div>
                </div>

                <!-- Image Section -->
                <div>
                    <img src="/images/landing-hero.png" alt="Job Search" class="rounded-lg mx-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    {{-- @include('partials.footer') --}}

<!-- JavaScript to handle the menu toggle -->
    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
    
        // Toggle mobile menu on hamburger click
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');  // Toggle the visibility of the menu
        });
    </script>
    
</body>
</html>
