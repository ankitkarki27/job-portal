<div class="bg-white rounded-lg shadow-md p-6 mb-6 hover:shadow-lg transition-shadow">
    <div class="flex justify-between items-start">
        <div>
            <h3 class="text-xl font-semibold text-gray-900">
                <a href="{{ route('jobs.show', $job) }}" class="hover:text-blue-500">{{ $job->title }}</a>
            </h3>
            <p class="text-gray-600 mt-2">{{ $job->company->name }}</p>
            <div class="flex items-center mt-4 space-x-4">
                <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">{{ $job->type }}</span>
                <span class="text-gray-600"><i class="fas fa-map-marker-alt mr-2"></i>{{ $job->location }}</span>
                @if($job->salary)
                    <span class="text-gray-600"><i class="fas fa-dollar-sign mr-2"></i>{{ number_format($job->salary) }}</span>
                @endif
            </div>
        </div>
        @if($job->deadline->isFuture())
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                Apply by {{ $job->deadline->format('M d, Y') }}
            </span>
        @endif
    </div>
</div>