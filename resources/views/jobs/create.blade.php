<x-layout class="bg-[#f3f3f3]">
    <x-page-heading>New Job</x-page-heading>
    <div class="mb-4">
        @if (session('success'))
            <div id="success-message" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                <span class="font-medium">Success:</span> {{ session('success') }}
            </div>
        @endif
    </div>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" type="text" placeholder="Full Stack Dev" />
        <x-forms.input label="Description" name="description" placeholder="Php developer that does ...." />
        <x-forms.input label="Workplace" name="workplace" placeholder="Remote, hybrid.." />
        <x-forms.input label="Salary" name="salary" placeholder='$90,000' />
        <x-forms.input label="Location" name="location" placeholder="Piccadily Circus, London" />
        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>
        <x-forms.divider></x-forms.divider>
        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox label="Feature (Costs extra)" name="featured" />
        <x-forms.input label="Tags (Keep separated)" name="tags" placeholder="Education" />
        <x-forms.button type="submit">Publish</x-forms.button>
    </x-forms.form>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');

            if (successMessage) {
                // Trigger confetti
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: {
                        y: 0.6
                    }
                });

                // Redirect after 4 seconds
                setTimeout(() => {
                    window.location.href = '{{ route('jobs.index') }}'; // Redirect to the jobs index page
                }, 5000); // 4000 milliseconds = 5seconds
            }
        });
    </script>
</x-layout>
