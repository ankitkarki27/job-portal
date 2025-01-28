<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Find Your Dream Job</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
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
            </div>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="flex items-center justify-center min-h-screen bg-white pt-16">
        <form method="POST" action="{{ route('register.applicant') }}" class="w-full max-w-md bg-white p-6">
            @csrf 
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Register as Applicant</h2>
            

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" id="name" name="name" placeholder="applicant Name" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="applicant Email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit" 
                class="w-full bg-gray-900 text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition duration-300">Register</button>
        </form>
    </div>

    <!-- Footer -->
    {{-- @include('partials.footer') --}}
</body>
</html>
