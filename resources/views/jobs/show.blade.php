<x-layout>
    <div class="min-h-screen p-6 text-gray-100 bg-gray-900">
        <!-- Job Title and Employer -->
        <div class="mb-6">
            <h1 class="text-4xl font-bold text-white">{{ $job->title }}</h1>
            <p class="mt-2 text-lg text-gray-300">by <span class="font-semibold">{{ $job->employer->name }}</span></p>
        </div>

        <!-- Job Details -->
        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
            <div class="flex items-start p-4 bg-gray-800 rounded-md">
                <span class="w-1/3 font-bold text-gray-200">Employer:</span>
                <p class="w-2/3 text-gray-300">{{ $job->employer->name }}</p>
            </div>
            <div class="flex items-start p-4 bg-gray-800 rounded-md">
                <span class="w-1/3 font-bold text-gray-200">Salary:</span>
                <p class="w-2/3 text-gray-300">{{ $job->salary }}</p>
            </div>
            <div class="flex items-start p-4 bg-gray-800 rounded-md">
                <span class="w-1/3 font-bold text-gray-200">Location:</span>
                <p class="w-2/3 text-gray-300">{{ $job->location }}</p>
            </div>
            <div class="flex items-start p-4 bg-gray-800 rounded-md">
                <span class="w-1/3 font-bold text-gray-200">Workplace:</span>
                <p class="w-2/3 text-gray-300">{{ $job->workplace }}</p>
            </div>
            <div class="flex items-start p-4 bg-gray-800 rounded-md">
                <span class="w-1/3 font-bold text-gray-200">Schedule:</span>
                <p class="w-2/3 text-gray-300">{{ $job->schedule }}</p>
            </div>
        </div>

        <!-- Job Description -->
        <div class="p-4 mb-6 bg-gray-800 rounded-md">
            <h2 class="text-2xl font-semibold text-white">Job Description</h2>
            <p class="mt-2 text-gray-300">{{ $job->description }}</p>
        </div>

        @if ($job->url)
            <div class="mb-6">
                <a href="{{ $job->url }}" target="_blank" class="text-blue-400 underline hover:text-blue-300">
                    Apply Now
                </a>
            </div>
        @endif

        @auth
            <a href="{{ route('jobs.edit', $job->id) }}" class="text-blue-400 underline hover:text-blue-300">Edit</a>

            <form action="{{ $job->id }}" method="POST" class="inline-block ml-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-400 underline hover:text-red-300">Delete</button>
            </form>
        @endauth

        <!-- Back to Job Listings Button -->
        <div class="mt-6">
            <a href="/" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                Back to Job Listings
            </a>
        </div>
    </div>
</x-layout>
