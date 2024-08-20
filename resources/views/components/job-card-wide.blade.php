{{-- Responsive card --}}
@props(['job'])

<x-panel class="flex flex-col gap-4 p-4 bg-white border rounded-lg shadow-sm sm:flex-row">
    <!-- Employer Logo -->
    <div class="flex justify-center ">
        <x-employer-logo :employer='$job->employer' />
    </div>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 flex-grow">
        <h3 class="text-lg font-bold break-words transition-all group-hover:underline transition-150ms">
            <a href="{{ route('jobs.show', $job) }}" class="hover:underline">
                {{ $job->title }}
            </a>
        </h3>
        <p class="mt-1 text-sm text-gray-500">{{ $job->employer->name }}</p>
        <p class="mt-auto text-sm text-gray-400">Salary: {{ $job->salary }}</p>
    </div>

    <!-- Description (visible on larger screens) -->
    <div class="flex-1 mt-2 overflow-x-auto sm:block sm:mt-0">

        <p class="text-sm text-gray-600">
            {{ Str::limit($job->description, 100) }}
        </p>
    </div>

    <!-- Tags and Edit Link (visible on larger screens) -->
    <div class="flex-col flex-1 mt-2 sm:mt-0">
        <!-- Tags -->
        <div class="flex flex-wrap justify-center gap-2 mb-4">
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>

        <!-- Authenticated User Actions -->
        @auth
            <div class="flex flex-col items-center justify-center flex-1 mt-auto">
                <div class="flex items-center justify-center w-full gap-4">
                    <!-- Edit Button -->
                    <a href="{{ route('jobs.edit', $job) }}"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="/jobs/{{ $job->id }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="p-2 text-xs font-semibold text-white transition duration-150 ease-in-out bg-red-400 rounded hover:text-red-300">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </div>

</x-panel>
