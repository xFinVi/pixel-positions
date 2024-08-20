<x-layout>


    <div class="space-y-6">
        @if ($jobs->isEmpty())
            <div class="text-center py-12">
                <h1 class="text-3xl font-semibold text-white">No Results Found</h1>
                <h2 class="text-lg text-gray-300 mt-4">Sorry, we couldn't find any jobs matching your criteria. Please
                    try another search.</h2>
            </div>
        @else
            <x-page-heading>Job Search Results</x-page-heading>
            <div class="mt-6 space-y-6">

                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
