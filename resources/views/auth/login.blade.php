<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Find Your Dream Job</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Liter&family=Mako&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <style>
            body {
                
                font-family: "Ubuntu", serif;
            }
       </style>
</head>
<body class="bg-white">
<div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <div class="flex justify-center mx-auto">
                        <img src="/images/image.png" class="w-auto h-7 sm:h-8" alt="Logo">
                    </div>
                    <p class="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                </div>

                <div class="mt-8">
                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="mb-4 p-3 text-red-600 bg-red-100 border border-red-400 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        {{-- Email Input --}}
                        <div>
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="jobsportal@gmail.com" 
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg 
                                dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 
                                dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" required />
                        </div>

                        {{-- Password Input --}}
                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                                <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot password?</a>
                            </div>

                            <input type="password" name="password" id="password" placeholder="Your Password" 
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg 
                                dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 
                                dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" required />
                        </div>

                        {{-- Login Button --}}
                        <div class="mt-6">
                            <button type="submit" 
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-gray-900 rounded-lg 
                                hover:bg-black focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Login
                            </button>
                        </div>
                    </form>

                    {{-- Signup Redirect (Uncomment if needed) --}}
                    <p class="mt-6 text-sm text-center text-gray-400">Don't have an account yet? 
                        <a href="{{route('register.applicant')}}" class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
