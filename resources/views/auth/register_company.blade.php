<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration | Job Portal</title>
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
</head>
<body class="bg-gray-50 text-gray-800">
      
            @include('partials.navbar')


    <div class="container mx-auto px-4 py-12 lg:py-20">
        <div class="max-w-4xl mx-auto">
            <!-- Progress tracker -->
            <div class="flex justify-between mb-8 px-2">
                <div class="flex items-center">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white">
                        <span class="text-sm font-medium">1</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600">Account</p>
                        <p class="text-xs text-gray-500">Personal details</p>
                    </div>
                </div>
                <div class="hidden md:flex w-24 items-center">
                    <div class="h-1 w-full bg-blue-600"></div>
                </div>
                <div class="flex items-center">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-600">
                        <span class="text-sm font-medium">2</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-600">Company</p>
                        <p class="text-xs text-gray-500">Organization info</p>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold text-center text-gray-900">Get Started with Your Account</h2>
                    <p class="mt-2 text-center text-gray-600">Join our network of employers and find the perfect talent for your company</p>
                </div>

                <form method="POST" action="{{ route('register.company') }}" class="p-8" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Personal Details Section -->
                    <div class="mb-10">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="flex items-center justify-center h-7 w-7 rounded-full bg-blue-100 text-blue-700 text-sm mr-3">1</span>
                            Your Account
                        </h3>
                        <div class="space-y-5">
                            <div class="grid md:grid-cols-2 gap-5">
                                <div class="input-group">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" id="name" name="name" required 
                                           class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                           placeholder="John Doe">
                                </div>
                                
                                <div class="input-group">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" required 
                                           class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                           placeholder="john@example.com">
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
                    </div>

                    <!-- Company Details Section -->
                    <div class="mb-10">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="flex items-center justify-center h-7 w-7 rounded-full bg-blue-100 text-blue-700 text-sm mr-3">2</span>
                            Company Information
                        </h3>
                        <div class="space-y-5">
                            <div class="input-group mb-6">
                                <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Company Logo</label>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md flex items-center justify-center mr-4 border-2 border-dashed border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <label for="logo" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer w-40">
                                            <svg class="mr-2 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                            Upload Logo
                                            <input id="logo" name="logo" type="file" class="sr-only" required>
                                        </label>
                                        <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-5">
                                <div class="input-group">
                                    <label for="com_name" class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                                    <input type="text" id="com_name" name="com_name" required 
                                           class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                           placeholder="Acme Corporation">
                                </div>
        
                                <div class="input-group">
                                    <label for="com_email" class="block text-sm font-medium text-gray-700 mb-2">Company Email</label>
                                    <input type="email" id="com_email" name="com_email" required 
                                           class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                           placeholder="info@company.com">
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-5">
                                <div class="input-group">
                                    <label for="com_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                            <span class="text-gray-500 sm:text-sm">+</span>
                                        </div>
                                        <input type="tel" id="com_phone" name="com_phone" required 
                                               class="form-input w-full pl-7 px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                               placeholder="1 (555) 000-0000">
                                    </div>
                                </div>
        
                                <div class="input-group">
                                    <label for="com_website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                        </div>
                                        <input type="url" id="com_website" name="com_website" 
                                               class="form-input w-full pl-10 px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                               placeholder="https://company.com">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="com_address" class="block text-sm font-medium text-gray-700 mb-2">Company Address</label>
                                <textarea id="com_address" name="com_address" required 
                                       class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                       placeholder="123 Business Street, Suite 100, City, State, ZIP" rows="2"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-gray-800 hover:bg-gray-900 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                            Register Company
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Footer text -->
                <div class="px-8 py-4 text-center text-sm text-gray-600">
                    Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a> or <a href="{{ route('register.applicant') }}" class="font-medium text-blue-600 hover:text-blue-500">Register as Applicant</a>.
                </div>
            </div>
        </div>
    </div>
    

    @include('partials.footer')
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

        // Logo upload preview
        const logoInput = document.getElementById('logo');
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-full w-full object-cover';
                    
                    const previewBox = document.querySelector('.flex-shrink-0');
                    previewBox.innerHTML = '';
                    previewBox.appendChild(img);
                    previewBox.classList.remove('border-dashed');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>