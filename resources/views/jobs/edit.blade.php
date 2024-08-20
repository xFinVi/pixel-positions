<x-layout>


    <div class="max-w-3xl  mx-auto p-2 bg-[#fcbf49] rounded-lg shadow-lg">
        <x-page-heading class="text-[#1d3557] border-b-2 border-[#1d3557] p-1  w-48 mx-auto">
            Edit Job
        </x-page-heading>

        <div class="mb-4">
            @if (session('success'))
                <div id="success-message" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <span class="font-medium">Success:</span> {{ session('success') }}
                </div>
            @endif
        </div>

        <form id="edit-job-form" method="POST" action="{{ route('job.update', $job->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="w-3/4 mx-auto">
                <x-forms.input label="Title" name="title" type="text" :value="old('title', $job->title)" />
            </div>

            <!-- Description -->
            <div class="w-3/4 mx-auto">
                <x-forms.input label="Description" name="description" type="text" :value="old('description', $job->description)" />
            </div>

            <!-- Workplace -->
            <div class="w-3/4 mx-auto">
                <x-forms.input label="Workplace" name="workplace" type="text" :value="old('workplace', $job->workplace)" />
            </div>

            <!-- Salary -->
            <div class="w-3/4 mx-auto">
                <x-forms.input label="Salary" name="salary" type="text" :value="old('salary', $job->salary)" />
            </div>

            <!-- Location -->
            <div class="w-3/4 mx-auto">
                <x-forms.input label="Location" name="location" type="text" :value="old('location', $job->location)" />
            </div>

            <!-- Schedule -->
            <div class="w-3/4 mx-auto">
                <x-forms.select label="Schedule" name="schedule">
                    <option class="bg-[#fff] text-[#001219]"
                        {{ old('schedule', $job->schedule) == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                    <option class="bg-[#fff] text-[#001219]"
                        {{ old('schedule', $job->schedule) == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                </x-forms.select>
            </div>

            <!-- Featured -->
            <div class="flex items-center w-3/4 mx-auto">
                <input id="featured" name="featured" type="checkbox"
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    {{ old('featured', $job->featured) ? 'checked' : '' }}>
                <label for="featured" class="ml-2 font-semibold text-gray-800">Featured</label>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col w-3/4 gap-4 mx-auto sm:flex-row sm:gap-6">
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white transition duration-150 ease-in-out bg-[#4CAF50] rounded-md hover:bg-[#395c8d] focus:outline-none focus:ring-2 focus:ring-[#395c8d] focus:ring-offset-2">
                    Update Job
                </button>
                <a href="/jobs"
                    class="px-4 py-2 font-semibold text-white transition duration-150 ease-in-out bg-[#1d3557] text-center rounded-md hover:bg-[#395c8d] focus:outline-none focus:ring-2 focus:ring-[#395c8d] focus:ring-offset-2">
                    Back To Jobs
                </a>
            </div>
        </form>
    </div>
    </div>

    <!-- Confetti library -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');

            // Trigger confetti if there is a success message
            if (successMessage) {
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: {
                        y: 0.6
                    }
                });
            }
        });
    </script>
</x-layout>
