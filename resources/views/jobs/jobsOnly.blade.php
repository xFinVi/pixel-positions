<x-layout>
    <div class="space-y-10">

        <!-- Search Section -->
        {{--      <section class="pt-6 text-center">
            <h1 class="text-4xl font-bold text-gray-900">Let's Find Your Next Job</h1>
            <x-forms.form action="{{ route('search') }}" method="GET" class="mt-6">
                <x-forms.input :label="false" name="q" placeholder="Search.." />
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                    Search
                </button>
            </x-forms.form>
        </section>
 --}}

        <!-- Job Listings Section -->
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @forelse ($jobs as $job)
                    <x-job-card-wide :job="$job" />
                @empty
                    <p class="text-gray-500">No jobs available at the moment.</p>
                @endforelse
            </div>
        </section>

    </div>
</x-layout>
