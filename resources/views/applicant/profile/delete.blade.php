@extends('layouts.app')

@section('content')
<br><br>
<div class="min-h-screen bg-white py-18 px-24 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <!-- Warning Card -->
        <div class="bg-white border border-red-100 rounded-xl shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-12 py-4 border-b border-red-100">
                <div class="flex items-center justify-center">
                    {{-- <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg> --}}
                </div>
                <h2 class="mt-4 text-2xl font-bold text-center text-gray-900">Delete Account ?</h2>
            </div>

            <!-- Content -->
            <div class="px-6 py-8">
                <div class="space-y-4">
                    <p class="text-gray-600 text-center">
                        You're about to delete your account. This action is permanent and cannot be undone.
                    </p>
                    
                    <!-- Warning Points -->
                    <div class="bg-red-50 rounded-lg p-4 mt-4">
                        <h3 class="font-semibold text-red-800 mb-2">What happens when you delete your account:</h3>
                        <ul class="text-left text-red-700 space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                All your personal information will be permanently removed
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Your profile and all associated data will be deleted
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                You'll lose access to all your account features
                            </li>
                        </ul>
                    </div>

                    <!-- Confirmation Form -->
                    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-6">
                        @csrf
                        @method('DELETE')
                        
                        <div class="space-y-6">
                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row justify-center gap-3">
                                <a href="{{ route('profile.index') }}" 
                                   class="inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                                    </svg>
                                    Keep My Account
                                </a>
                                <button type="submit"
                                        class="inline-flex justify-center items-center px-6 py-3 border border-transparent font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200"
                                        onclick="return confirm('Are you absolutely sure you want to delete your account? This action cannot be undone.')">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    {{-- // Delete Account --}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Help Link -->
        <div class="mt-6 text-center">
            <a href="#" class="text-sm text-gray-600 hover:text-gray-900 flex items-center justify-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Need help? Contact Support
            </a>
        </div>
    </div>
</div>
@endsection