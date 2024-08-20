<x-layout>
    <div class="min-h-screen p-6 text-gray-400 ">
        <!-- Company Culture -->
        <section class="mb-12">
            <h1 class="mb-6 text-4xl font-extrabold">Our Culture</h1>
            <p class="mb-6 text-lg">Discover our company's values, mission, and the unique culture that makes us a great
                place to work.</p>
            <!-- You can add images or videos here for better engagement -->
            <img src="https://via.placeholder.com/1200x500.png?text=Career+Growth" alt="Career Growth"
                class="w-full rounded-lg shadow-lg">

        </section>

        <!-- Employee Testimonials -->
        <section class="mb-12">
            <h2 class="mb-6 text-3xl font-semibold">What Our Employees Say</h2>
            <!-- Include quotes or short interviews here -->
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <blockquote class="mb-4 text-gray-700">
                    <p>"Working here has been a life-changing experience. The culture is supportive, and the
                        opportunities for growth are endless."</p>
                </blockquote>
                <footer class="text-gray-500">- Jane Doe, Software Engineer</footer>
            </div>
        </section>

        <!-- Career Opportunities -->
        <section class="mb-12">
            <h2 class="mb-6 text-3xl font-semibold">Current Opportunities</h2>
            <p class="mb-6 text-lg">Explore our current job openings and find your next career move with us.</p>
            <!-- List of job openings -->
            @foreach ($jobs as $job)
                <div class="p-6 mb-6 bg-white rounded-lg shadow-lg">
                    <h3 class="mb-2 text-xl font-bold">
                        <a href="{{ route('jobs.show', $job) }}"
                            class="text-blue-500 hover:text-blue-700">{{ $job->title }}</a>
                    </h3>
                    <p class="mb-2 text-sm text-gray-600">Salary: {{ $job->salary }}</p>
                    <p class="text-gray-700">{{ Str::limit($job->description, 100) }}</p>
                </div>
            @endforeach
        </section>

        <!-- Career Growth and Development -->
        <section class="mb-12 ">
            <h2 class="mb-6 text-3xl font-semibold text-white ">Career Growth</h2>
            <p class="mb-6 text-lg">Discover the opportunities for career development and growth within our company.</p>
            <!-- Details about training and career pathways -->
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700">We offer various training programs, mentorship opportunities, and clear career
                    pathways to support your professional growth.</p>
            </div>
        </section>

        <!-- Benefits and Perks -->
        <section class="mb-12">
            <h2 class="mb-6 text-3xl font-semibold text-white">Benefits and Perks</h2>
            <p class="mb-6 text-lg">Learn about the benefits and perks that come with working at our company.</p>
            <!-- List of benefits and perks -->
            <ul class="pl-6 text-gray-300 list-disc">
                <li>Comprehensive health insurance</li>
                <li>Generous paid time off</li>
                <li>Flexible work hours</li>
                <li>Employee wellness programs</li>
            </ul>
        </section>

        <!-- Application Process -->
        <section class="mb-12">
            <h2 class="mb-6 text-3xl font-semibold text-white">How to Apply</h2>
            <p class="mb-6 text-lg">Find out how to apply for a position and what to include in your application.</p>
            <!-- Instructions for applying -->
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700">To apply, please submit your resume and a cover letter through our online
                    application portal. Make sure to highlight your relevant experience and skills.</p>
            </div>
        </section>

        <!-- Diversity and Inclusion -->
        <section class="mb-12">
            <h2 class="mb-6 text-3xl font-semibold text-white">Diversity and Inclusion</h2>
            <p class="mb-6 text-lg">Read about our commitment to diversity, equity, and inclusion.</p>
            <!-- Details about diversity initiatives -->
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700">We are dedicated to fostering a diverse and inclusive workplace where all
                    employees feel valued and respected. Our initiatives include diversity training and employee
                    resource groups.</p>
            </div>
        </section>

        <!-- Contact Information -->
        <section>
            <h2 class="mb-6 text-3xl font-semibold text-white">Contact Us</h2>
            <p class="mb-4 text-lg">Have questions? Reach out to our HR department for more information.</p>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700">Email: <a href="mailto:hr@company.com"
                        class="text-blue-500 hover:text-blue-700">hr@company.com</a></p>
                <p class="text-gray-700">Phone: <a href="tel:(123)456-7890"
                        class="text-blue-500 hover:text-blue-700">(123) 456-7890</a></p>
            </div>
        </section>
    </div>
</x-layout>
