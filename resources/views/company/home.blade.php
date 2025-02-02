@extends('layouts.app')

@section('title', 'Hire Top Talent - JobConnect for Employers')

@push('styles')
<style>
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .gradient-bg {
        background: linear-gradient(-45deg, #212122, #001230, #60a5fa);
        background-size: 400% 400%;
        animation: gradient 10s ease infinite;
    }

    .feature-card:hover .feature-icon {
        transform: rotateY(180deg);
    }

    .hover-scale {
        transition: transform 0.3s ease;
    }

    .hover-scale:hover {
        transform: translateY(-5px);
    }

    .testimonial-card:hover blockquote {
        transform: scale(1.02);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 py-24 sm:py-32 lg:py-40">
        <div class="text-center">
            <h1 class="text-4xl sm:text-6xl font-bold max-w-3xl mx-auto leading-tight">
                Build Your Dream Team with 
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-amber-500">Top Talent</span>
            </h1>
            <p class="mt-6 text-xl text-gray-100 max-w-2xl mx-auto">
                Access a network of over 1 million qualified professionals and streamline your hiring process
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('job_listings.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-indigo-600 font-semibold rounded-lg shadow-lg hover:bg-gray-50 transition-all duration-300 hover:shadow-xl">
                    Post a Job – Free Trial
                </a>
                <a href="#" class="inline-flex items-center justify-center px-8 py-4 border border-white/30 bg-transparent text-white font-semibold rounded-lg hover:bg-white/10 transition-all duration-300">
                    Schedule Demo →
                </a>
            </div>
            <div class="mt-16 grid grid-cols-2 sm:grid-cols-4 gap-8 max-w-4xl mx-auto">
                <div class="text-center p-4 backdrop-blur-sm bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold">1M+</div>
                    <div class="text-sm mt-1 opacity-80">Active Candidates</div>
                </div>
                <div class="text-center p-4 backdrop-blur-sm bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold">24h</div>
                    <div class="text-sm mt-1 opacity-80">Avg. Time to Hire</div>
                </div>
                <div class="text-center p-4 backdrop-blur-sm bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold">92%</div>
                    <div class="text-sm mt-1 opacity-80">Hiring Success Rate</div>
                </div>
                <div class="text-center p-4 backdrop-blur-sm bg-white/5 rounded-xl">
                    <div class="text-3xl font-bold">50K+</div>
                    <div class="text-sm mt-1 opacity-80">Companies Hiring</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16">
<div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <h2 class="text-center text-lg/8 font-semibold text-gray-900">Trusted by the world’s most innovative teams</h2>
    <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
      <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48">
    </div>
  </div>
</div>
</section>

<!-- Features Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Smart Hiring Solutions</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Advanced tools to simplify your recruitment process</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="feature-card bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="feature-icon w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-500">
                    <i data-feather="search" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">AI-Powered Matching</h3>
                <p class="text-gray-600">Our intelligent algorithms match job requirements with ideal candidates</p>
            </div>
            
            <div class="feature-card bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="feature-icon w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-500">
                    <i data-feather="briefcase" class="w-8 h-8 text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Collaborative Hiring</h3>
                <p class="text-gray-600">Team-based evaluation tools and shared candidate profiles</p>
            </div>
            
            <div class="feature-card bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="feature-icon w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-500">
                    <i data-feather="bar-chart" class="w-8 h-8 text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Analytics Dashboard</h3>
                <p class="text-gray-600">Real-time metrics and hiring pipeline visualization</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Flexible Pricing Plans</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Choose the plan that fits your hiring needs</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Starter Plan -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover-scale">
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-2">Basic</h3>
                    <p class="text-gray-600">For small teams and individual hiring</p>
                    <div class="mt-6">
                        <span class="text-4xl font-bold">$0</span>
                        <span class="text-gray-500">/month</span>
                    </div>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mr-2"></i>
                        50 Job Postings
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mr-2"></i>
                        Basic Analytics
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mr-2"></i>
                        Email Support
                    </li>
                </ul>
                <button class="w-full py-3 bg-indigo-100 text-indigo-600 rounded-lg font-semibold hover:bg-indigo-200 transition-colors">
                    Get Started
                </button>
            </div>

            <!-- Professional Plan (Featured) -->
            <div class="bg-gradient-to-b from-indigo-600 to-indigo-700 p-8 rounded-2xl text-white hover-scale transform hover:scale-105">
                <div class="mb-8">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Professional</h3>
                        <span class="bg-white/20 px-3 py-1 rounded-full text-sm">Most Popular</span>
                    </div>
                    <p class="mt-2 opacity-90">Growing teams with regular hiring needs</p>
                    <div class="mt-6">
                        <span class="text-4xl font-bold">$20</span>
                        <span class="opacity-80">/month</span>
                    </div>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-300 mr-2"></i>
                        Unlimited Job Postings
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-300 mr-2"></i>
                        Advanced Analytics
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-300 mr-2"></i>
                        Priority Support
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-300 mr-2"></i>
                        Team Collaboration
                    </li>
                </ul>
                <button class="w-full py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Start Free Trial
                </button>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover-scale">
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-2">Enterprise</h3>
                    <p class="text-gray-600">Large organizations with custom needs</p>
                    <div class="mt-6">
                        <span class="text-4xl font-bold">Custom</span>
                    </div>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mr-2"></i>
                        Everything in Professional
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mr-2"></i>
                        Dedicated Account Manager
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mr-2"></i>
                        Custom Workflows
                    </li>
                    <li class="flex items-center">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mr-2"></i>
                        SLA & Premium Support
                    </li>
                </ul>
                <button class="w-full py-3 bg-indigo-100 text-indigo-600 rounded-lg font-semibold hover:bg-indigo-200 transition-colors">
                    Contact Sales
                </button>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 py-20 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6">Start Hiring Smarter Today</h2>
            <p class="text-gray-300 mb-8">Join thousands of companies who found their perfect hires through our platform</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="px-8 py-4 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition-colors shadow-lg hover:shadow-xl">
                    Post Your First Job
                </a>
                <a href="#" class="px-8 py-4 border border-white/20 text-white rounded-lg font-semibold hover:bg-white/5 transition-colors">
                    Request Demo
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();
    });
</script>
@endpush