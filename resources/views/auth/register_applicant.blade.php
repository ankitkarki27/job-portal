<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Step Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* background: linear-gradient(135deg, #f6f9fc 0%, #eef2f7 100%); */
        }
    </style>
    <script>
        function nextStep() {
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
        }
        
        function prevStep() {
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step1').classList.remove('hidden');
        }
    </script>
</head>
<body class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="px-8 py-10 text-center">
            <h2 class="text-3xl font-bold text-black">Create Your Account</h2>
            <p class="text-black">Join our platform to find your dream job</p>
        </div>

        <form method="POST" action="{{ route('register.applicant') }}" class="p-8 space-y-8">
            @csrf

            <!-- Step 1: Personal Information -->
            <div id="step1">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Personal Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="name" name="name" required class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" required class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full p-3 border rounded-lg">
                    </div>
                </div>
                <button type="button" onclick="nextStep()" class="mt-6 w-full p-3 bg-blue-600 text-white rounded-lg">Next</button>
            </div>

            <!-- Step 2: Professional Details -->
            <div id="step2" class="hidden">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Professional Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="resume" class="block text-sm font-medium text-gray-700">Resume</label>
                        <input type="file" id="resume" name="resume" required class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label for="education" class="block text-sm font-medium text-gray-700">Education</label>
                        <input type="text" id="education" name="education" required class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                        <input type="text" id="experience" name="experience" required class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="address" name="address" required class="w-full p-3 border rounded-lg">
                    </div>
                </div>
                <div class="mt-6 flex justify-between">
                    <button type="button" onclick="prevStep()" class="p-3 bg-gray-400 text-white rounded-lg">Back</button>
                    <button type="submit" class="p-3 bg-green-600 text-white rounded-lg">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
