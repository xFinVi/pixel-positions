<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JobSphere</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

@php

    $currentRoute = request()->path();
@endphp

<body class="pb-10 text-white bg-[#001219] font-hanken-grotesk">
    <div>
        <nav class="sticky top-0 z-50 bg-gray-800" x-data="{ open: false }">
            <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <!-- Mobile menu button -->
                    <div class="absolute inset-y-0 left-0 flex items-center justify-end w-full sm:hidden">
                        <div class="absolute inset-y-0 left-0 flex items-center justify-end w-full sm:hidden">
                            <div class="absolute inset-y-0 left-0 flex items-center justify-end w-full sm:hidden">
                                <button @click="open = !open" type="button"
                                    class="relative inline-flex items-center justify-end p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                    aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>

                                    <!-- Single SVG for transition -->
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <!-- Three bars -->
                                        <path x-show="!open"
                                            x-transition:enter="transition-transform duration-150 ease-in"
                                            x-transition:enter-start="transform scale-75"
                                            x-transition:enter-end="transform scale-100"
                                            x-transition:leave="transition-transform duration-150 ease-in"
                                            x-transition:leave-start="transform scale-100"
                                            x-transition:leave-end="transform scale-75" class="block"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                        <!-- X -->
                                        <path x-show="open"
                                            x-transition:enter="transition-transform duration-150 ease-in"
                                            x-transition:enter-start="transform scale-75"
                                            x-transition:enter-end="transform scale-100"
                                            x-transition:leave="transition-transform duration-150 ease-in"
                                            x-transition:leave-start="transform scale-100"
                                            x-transition:leave-end="transform scale-75" class="block"
                                            stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M6 18l12-12" />
                                    </svg>
                                </button>
                            </div>

                        </div>

                    </div>
                    <!-- Logo and Desktop Menu -->
                    <div class="flex items-center flex-1 sm:items-stretch sm:justify-between">
                        <div class="flex items-center flex-shrink-0">
                            <a href="/" aria-label="Home">
                                <img src="https://img.freepik.com/free-vector/hub-logo-template_23-2149852444.jpg?t=st=1724241539~exp=1724245139~hmac=36cfce049ed8a1e7b7e99298af4b3449e14a84023d0a2b0e214486b70fc040cb&w=826"
                                    alt="Job Logo" class="object-contain w-auto h-12 bg-white rounded-lg max-h-16">
                            </a>



                        </div>
                        <div class="items-center justify-center hidden sm:flex sm:ml-6 sm:space-x-4">
                            <a href="/"
                                class="{{ $currentRoute === '/' ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} p-2 rounded-md text-sm font-medium"
                                aria-current="page">Home</a>
                            <a href="/jobs"
                                class="{{ $currentRoute === 'jobs' ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Jobs</a>
                            <a href="/careers"
                                class="{{ $currentRoute === 'careers' ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium">Careers</a>
                        </div>
                        <!-- Auth Links -->
                        <div class="hidden sm:flex sm:items-center">
                            @auth
                                <a href="/jobs/create"
                                    class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:text-white">Post a
                                    Job</a>
                                <form action="/logout" method="POST" class="ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:text-white">Logout</button>
                                </form>
                            @endauth
                            @guest
                                <div class="flex space-x-4">
                                    <a href="/register"
                                        class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:text-white">Sign
                                        Up</a>
                                    <a href="/login"
                                        class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:text-white">Login</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state -->
            <div class="sm:hidden" id="mobile-menu" x-show="open" @click.outside="open = false" x-cloak>
                <div class="px-2 pt-2 pb-3 space-y-1 bg-gray-800">
                    <a href="/" class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md"
                        aria-current="page">Home</a>
                    <a href="/jobs"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Jobs</a>
                    <a href="/careers"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Careers</a>
                    @auth
                        <form action="/logout" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Logout</button>
                        </form>
                    @endauth
                    @guest
                        <div class="mt-3">
                            <a href="/register"
                                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Sign
                                Up</a>
                            <a href="/login"
                                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Login</a>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="px-4 sm:px-6 lg:px-8 max-w-[986px] mx-auto mt-10">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
