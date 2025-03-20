<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Step Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Liter&family=Mako&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            
            font-family: "Ubuntu", serif;
        }
 
        .form-input:focus {
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }
        .step-indicator {
            transition: all 0.3s ease;
        }
        .input-group:focus-within label {
            color: #3b82f6;
        }
    </style>
    <script>
        function nextStep() {
            // Update step indicators
            document.getElementById('step1-indicator').classList.remove('bg-blue-600', 'text-white');
            document.getElementById('step1-indicator').classList.add('bg-blue-100', 'text-blue-700');
            document.getElementById('step1-text').classList.remove('text-blue-600');
            document.getElementById('step1-text').classList.add('text-gray-600');
            
            document.getElementById('step2-indicator').classList.remove('bg-gray-200', 'text-gray-600');
            document.getElementById('step2-indicator').classList.add('bg-blue-600', 'text-white');
            document.getElementById('step2-text').classList.remove('text-gray-600');
            document.getElementById('step2-text').classList.add('text-blue-600');
            
            document.getElementById('progress-bar').classList.remove('bg-gray-200');
            document.getElementById('progress-bar').classList.add('bg-blue-600');
            
            // Hide step 1, show step 2
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
        }
        
        function prevStep() {
            // Update step indicators
            document.getElementById('step1-indicator').classList.remove('bg-blue-100', 'text-blue-700');
            document.getElementById('step1-indicator').classList.add('bg-blue-600', 'text-white');
            document.getElementById('step1-text').classList.remove('text-gray-600');
            document.getElementById('step1-text').classList.add('text-blue-600');
            
            document.getElementById('step2-indicator').classList.remove('bg-blue-600', 'text-white');
            document.getElementById('step2-indicator').classList.add('bg-gray-200', 'text-gray-600');
            document.getElementById('step2-text').classList.remove('text-blue-600');
            document.getElementById('step2-text').classList.add('text-gray-600');
            
            document.getElementById('progress-bar').classList.remove('bg-blue-600');
            document.getElementById('progress-bar').classList.add('bg-gray-200');
            
            // Hide step 2, show step 1
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step1').classList.remove('hidden');
        }
        
        // File upload preview
        function handleResumeUpload(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('file-name').textContent = file.name;
                document.getElementById('file-size').textContent = `(${formatFileSize(file.size)})`;
                document.getElementById('file-icon').classList.remove('text-gray-400');
                document.getElementById('file-icon').classList.add('text-blue-600');
                document.getElementById('upload-indicator').classList.remove('border-dashed');
                document.getElementById('upload-indicator').classList.add('border-blue-600', 'bg-blue-50');
            }
        }
        
        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' bytes';
            else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
            else return (bytes / 1048576).toFixed(1) + ' MB';
        }
    </script>
</head> 

<body class="bg-gray-50 text-gray-800">
    @include('partials.navbar')
    <div class="container mx-auto px-4 py-12 lg:py-20">
        <div class="max-w-3xl mx-auto">
            <!-- Progress tracker -->
            <div class="flex justify-between mb-8 px-2">
                <div class="flex items-center">
                    <div id="step1-indicator" class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white">
                        <span class="text-sm font-medium">1</span>
                    </div>
                    <div class="ml-3">
                        <p id="step1-text" class="text-sm font-medium text-blue-600">Account</p>
                        <p class="text-xs text-gray-500">Personal details</p>
                    </div>
                </div>
                <div class="hidden md:flex w-24 items-center">
                    <div id="progress-bar" class="h-1 w-full bg-gray-200"></div>
                </div>
                <div class="flex items-center">
                    <div id="step2-indicator" class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-600">
                        <span class="text-sm font-medium">2</span>
                    </div>
                    <div class="ml-3">
                        <p id="step2-text" class="text-sm font-medium text-gray-600">Profile</p>
                        <p class="text-xs text-gray-500">Professional details</p>
                    </div>
                </div>
                <div class="hidden md:flex w-24 items-center">
                    <div class="h-1 w-full bg-gray-200"></div>
                </div>
                <div class="flex items-center">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-600">
                        <span class="text-sm font-medium">3</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-600">Complete</p>
                        <p class="text-xs text-gray-500">Confirmation</p>
                    </div>
                </div>
            </div>

            <!-- Registration Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="px-8 pt-8 pb-6 border-b border-gray-100">
                    <div class="flex items-center justify-center mb-6">
                        <div class="bg-blue-50 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold text-center text-gray-900">Create Your Account</h2>
                    <p class="mt-2 text-center text-gray-600">Join our platform to find your dream job</p>
                </div>

                <form method="POST" action="{{ route('register.applicant') }}" class="p-8" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Step 1: Personal Information -->
                    <div id="step1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="flex items-center justify-center h-7 w-7 rounded-full bg-blue-100 text-blue-700 text-sm mr-3">1</span>
                            Personal Information
                        </h3>
                        <div class="space-y-5">
                            <div class="input-group">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" required 
                                       class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                       placeholder="John Doe">
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-5">
                                <div class="input-group">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" required 
                                           class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                           placeholder="john@example.com">
                                </div>
                                
                                <div class="input-group">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                            <span class="text-gray-500 sm:text-sm"></span>
                                        </div>
                                        <input type="tel" id="phone" name="phone" required 
                                               class="form-input w-full pl-7 px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                               placeholder="9811111111">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-5">
                                <div class="input-group">
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Create Password</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password" required 
                                               class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                               placeholder="••••••••">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 cursor-pointer hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters long</p>
                                </div>
        
                                <div class="input-group">
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                                    <div class="relative">
                                        <input type="password" id="password_confirmation" name="password_confirmation" required 
                                               class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                               placeholder="••••••••">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 cursor-pointer hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <button type="button" onclick="nextStep()" 
                                    class="w-full py-3 text-sm font-semibold text-white bg-gray-800 hover:bg-gray-900 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                                Continue to Professional Details
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Professional Details -->
                    <div id="step2" class="hidden">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="flex items-center justify-center h-7 w-7 rounded-full bg-blue-100 text-blue-700 text-sm mr-3">2</span>
                            Professional Details
                        </h3>
                        <div class="space-y-5">
                            <!-- Resume Upload -->
                            <div class="input-group mb-6">
                                <label for="resume" class="block text-sm font-medium text-gray-700 mb-2">Resume</label>
                                <div id="upload-indicator" class="border-2 border-dashed border-gray-300 rounded-lg p-6 flex flex-col items-center justify-center">
                                    <svg id="file-icon" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <div class="flex flex-col items-center text-center">
                                        <span id="file-name" class="text-sm font-medium text-gray-900">Drop your resume here, or</span>
                                        <span id="file-size" class="text-xs text-gray-500"></span>
                                        <label for="resume" class="mt-2 flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer">
                                            <svg class="mr-2 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                            Browse Files
                                            <input id="resume" name="resume" type="file" class="sr-only" required onchange="handleResumeUpload(event)">
                                        </label>
                                        <p class="mt-1 text-xs text-gray-500">PDF, DOC, DOCX up to 5MB</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-5">
                                <div class="input-group">
                                    <label for="education" class="block text-sm font-medium text-gray-700 mb-2">Education</label>
                                    <select id="education" name="education" required 
                                           class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                                        <option value="" disabled selected>Select highest education</option>
                                        <option value="High School">High School</option>
                                        <option value="Associate's Degree">Associate's Degree</option>
                                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                                        <option value="Master's Degree">Master's Degree</option>
                                        <option value="Doctorate">Doctorate</option>
                                    </select>
                                </div>
                                
                                <div class="input-group">
                                    <label for="experience" class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                                    <select id="experience" name="experience" required 
                                            class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                                        <option value="" disabled selected>Select experience</option>
                                        <option value="0-1">Less than 1 year</option>
                                        <option value="1-3">1-3 years</option>
                                        <option value="3-5">3-5 years</option>
                                        <option value="5-10">5-10 years</option>
                                        <option value="10+">10+ years</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <label for="skills" class="block text-sm font-medium text-gray-700 mb-2">Skills (separate with commas)</label>
                                <input type="text" id="skills" name="skills" required 
                                       class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                       placeholder="JavaScript, React, Node.js, UI/UX Design">
                            </div>
                            
                            <div class="input-group">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <textarea id="address" name="address" required 
                                       class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                       placeholder="123 Main Street, Apartment 4B, City, State, ZIP" rows="2"></textarea>
                            </div>
                        </div>
                      
                        
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep()" 
                                    class="px-6 py-3 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back
                            </button>
                            
                            <button type="submit" 
                                    class="px-6 py-3 text-sm font-semibold text-white bg-gray-800 hover:bg-gray-900 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg flex items-center">
                                Complete Registration
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                
                <!-- Footer text -->
                <div class="px-8 py-4 bg-gray-50 border-t text-center text-sm text-gray-600">
                    Already have an account? <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Password visibility toggle functionality
        document.querySelectorAll('.input-group svg').forEach(icon => {
            icon.addEventListener('click', function() {
                const input = this.closest('.relative').querySelector('input');
                if (input.type === 'password') {
                    input.type = 'text';
                    this.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
                } else {
                    input.type = 'password';
                    this.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                }
            });
        });
    </script>
</body>
</html>