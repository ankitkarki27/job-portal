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
<body class="bg-gray-900">

    @include('partials.navbar')
    <br><br><br><br><br><br>
    <!-- Registration Form -->
    <div class="max-w-4xl max-sm:max-w-lg mx-auto font-sans p-6 ">
        <div class="text-center mb-12 sm:mb-16">
            <a href="javascript:void(0)">
                <!-- Logo -->
                <img src="/images/image.png" alt="logo" class="w-48 inline-block" />
            </a>
            <h4 class="text-gray-600 text-base mt-6">Sign up into your account</h4>
        </div>
    
        <!-- Form with POST method -->
        <form method="POST" action="{{ route('register.company') }}"  class="space-y-8" enctype="multipart/form-data">
            @csrf 
            <!-- Personal Details Section -->
            <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold text-gray-700 mb-4">Personal Details</h5>
                <div class="grid sm:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label  for="name" class="text-gray-600 text-sm mb-2 block">Name</label>
                        <input name="name" id="name" type="text" class="bg-gray-200 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter name" />
                    </div>
    
                    <!-- Email -->
                    <div>
                        <label for="email" class="text-gray-600 text-sm mb-2 block">Email Id</label>
                        <input name="email" id="email" type="email" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter email" />
                    </div>
    
                    <!-- Mobile Number -->
                    <div>
                        <label class="text-gray-600 text-sm mb-2 block">Mobile No.</label>
                        <input name="number" type="tel" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter mobile number" />
                    </div>
    
                    <!-- Password -->
                    <div>
                        <label class="text-gray-600 text-sm mb-2 block">Password</label>
                        <input name="password" type="password" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter password" />
                    </div>
    
                    <!-- Confirm Password -->
                    <div>
                        <label class="text-gray-600 text-sm mb-2 block">Confirm Password</label>
                        <input name="cpassword" type="password" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Confirm password" />
                    </div>
                </div>
            </div>
    
            <!-- Company Details Section -->
            <div class="bg-gray-50 p-6 rounded-lg shadow-md mt-6">
                <h5 class="text-lg font-semibold text-gray-700 mb-4">Company Details</h5>
                <div class="grid sm:grid-cols-2 gap-6">
                    <!-- Company Logo -->
                    <div>
                        <label for="logo" class="text-gray-600 text-sm mb-2 block">Company Logo</label>
                        <input type="file" name="logo" id="logo" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none" />
                    </div>
    
                    <!-- Company Name -->
                    <div>
                        <label class="text-gray-600 text-sm mb-2 block">Company Name</label>
                        <input name="company_name" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company name" />
                    </div>
    
                    <!-- Company Address -->
                    <div>
                        <label class="text-gray-600 text-sm mb-2 block">Company Address</label>
                        <input name="company_address" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company address" />
                    </div>
    
                    <!-- Company Phone -->
                    <div>
                        <label class="text-gray-600 text-sm mb-2 block">Company Phone</label>
                        <input name="company_phone" type="tel" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company phone number" />
                    </div>
    
                    <!-- Company Website -->
                    <div>
                        <label class="text-gray-600 text-sm mb-2 block">Company Website</label>
                        <input name="company_website" type="url" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all" placeholder="Enter company website URL" />
                    </div>
                </div>
            </div>
    
            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit" class="w-full py-3 px-6 text-sm tracking-wider rounded-md text-white bg-gray-900 hover:bg-gray-900 focus:outline-none transition-all">
                    Sign up
                </button>
            </div>
        </form>
    </div>
    
    

    <!-- Footer -->
    @include('partials.footer')

</body>
</html>
