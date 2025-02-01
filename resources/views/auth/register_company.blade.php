<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Company - Job Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
        }
    </style>
</head>
<body class="bg-gray-200">

    @include('partials.navbar')

    <br><br><br><br><br><br>
    <!-- Registration Form -->
    <div class="max-w-4xl max-sm:max-w-lg mx-auto font-sans p-6 bg-white rounded-xl shadow-lg">
        <div class="text-center mb-12 sm:mb-16">
            <a href="javascript:void(0)">
                <!-- Logo -->
                <img src="/images/image.png" alt="logo" class="w-48 inline-block mb-4" />
            </a>
            <h4 class="text-gray-700 text-lg font-semibold">Create Company Account</h4>
        </div>

        <!-- Form with POST method -->
        <form method="POST" action="{{ route('register.company') }}" class="space-y-8" enctype="multipart/form-data">
            @csrf 
            <!-- Personal Details Section -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                <h5 class="text-xl font-semibold text-gray-700 mb-6">Personal Details</h5>
                <div class="grid sm:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="text-gray-600 text-sm mb-2 block">Name</label>
                        <input type="text" id="name" name="name" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter your name" required />
                    </div>
    
                    <!-- Email -->
                    <div>
                        <label for="email" class="text-gray-600 text-sm mb-2 block">Email</label>
                        <input name="email" id="email" type="email" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter your email" required />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="text-gray-600 text-sm mb-2 block">Password</label>
                        <input id="password" name="password" type="password" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter your password" required />
                    </div>
    
                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="text-gray-600 text-sm mb-2 block">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Confirm your password" required />
                    </div>
                </div>
            </div>
    
            <!-- Company Details Section -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md mt-6">
                <h5 class="text-xl font-semibold text-gray-700 mb-6">Company Details</h5>
                <div class="grid sm:grid-cols-2 gap-6">
                    <!-- Company Logo -->
                    <div>
                        <label for="logo" class="text-gray-600 text-sm mb-2 block">Company Logo</label>
                        <input type="file" name="logo" id="logo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" required />
                    </div>
    
                    <!-- Company Name -->
                    <div>
                        <label for="com_name" class="text-gray-600 text-sm mb-2 block">Company Name</label>
                        <input name="com_name" id="com_name" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company name" required />
                    </div>
    
                    <!-- Company Email -->
                    <div>
                        <label for="com_email" class="text-gray-600 text-sm mb-2 block">Company Email</label>
                        <input id="com_email" name="com_email" type="email" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company email" required />
                    </div>

                    <!-- Company Phone -->
                    <div>
                        <label for="com_phone" class="text-gray-600 text-sm mb-2 block">Company Phone</label>
                        <input id="com_phone" name="com_phone" type="tel" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company phone number" required />
                    </div>

                    <!-- Company Address -->
                    <div>
                        <label for="com_address" class="text-gray-600 text-sm mb-2 block">Company Address</label>
                        <input name="com_address" id="com_address" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company address" required />
                    </div>

                    <!-- Company Website -->
                    <div>
                        <label for="com_website" class="text-gray-600 text-sm mb-2 block">Company Website</label>
                        <input id="com_website" name="com_website" type="url" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company website URL" />
                    </div>
                </div>
            </div>
    
            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit" class="w-full py-3 px-6 text-sm tracking-wider rounded-lg text-white bg-gray-900 hover:bg-gray-800 focus:outline-none transition-all">
                    Register Company
                </button>
            </div>
        </form>
    </div>
    <!-- Footer -->
    @include('partials.footer')

</body>
</html>
