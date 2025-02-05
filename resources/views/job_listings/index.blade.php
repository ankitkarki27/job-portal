<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Top Talent - JobConnect for Employers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .status-open {
            background-color: #DEF7EC;
            color: #03543F;
        }
        
        .status-closed {
            background-color: #FEE2E2;
            color: #991B1B;
        }
        .table-row-hover:hover {
            background-color: #F9FAFB;
        }
        .action-button {
            transition: all 0.2s;
        }
        .action-button:hover {
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-white">
    @include('partials.navbar')

    <div class="container mx-auto px-4 py-28">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Your Job Listings</h2>
                <a href="{{ route('job_listings.create') }}" class="inline-flex items-center px-6 py-3 bg-black text-white rounded-lg shadow-md hover:bg-gray-900 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Post a New Job
                </a>
            </div>

            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
                {{ session('error') }}
            </div>
            @endif

            @if($jobListings->isEmpty())
            <div class="bg-white shadow-md rounded-lg p-8 text-center">
                <p class="text-xl text-gray-600">You have not posted any job listings yet.</p>
            </div>
            @else
            <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
                <table class="min-w-full bg-white rounded-xl shadow-lg">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Job Title</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">View Applications</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Salary</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Exp(Years)</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Deadline</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobListings as $job)
                        <tr class="border-b border-gray-200">
                            <td class="py-3 px-4 text-sm font-semibold text-gray-900">{{ $job->job_title }} <br>
                                {{ $job->company->com_name }}
                            </td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $job->Application_id }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">${{ number_format($job->salary, 2) }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $job->experience_years }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') }}</td>
                            <td class="py-3 px-4 text-sm">
                                <span class="px-3 py-1 rounded-full 
                                    {{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'status-closed' : 'status-open' }}">
                                    {{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'Closed' : 'Open' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-sm">
                                <a href="{{ route('job_listings.edit', $job->jobid) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('job_listings.destroy', $job->jobid) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            @endif

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center">
                {{ $jobListings->links() }}
            </div>
        </div>
    </div>
    @include('partials.footer')
</body>
</html>