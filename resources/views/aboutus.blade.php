<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SFU Bypass</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png" href="{{ asset('image/cat.png') }}">
    @livewireStyles
</head>
<body class="h-screen bg-gray-100 flex flex-col">
    @include('header')
    <!-- About Us Content -->
    <main class="flex-grow py-12 px-6 bg-gradient-to-b from-white to-gray-100">
        <div class="max-w-4xl mx-auto">
            <!-- Page Heading -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-12">
                About <span class="text-red-500">SFU</span> <span class="text-gray-900">Bypass</span>
            </h1>

            <!-- Our Mission -->
            <section class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Our Mission</h2>
                <p class="text-gray-600 leading-relaxed">
                    To create a stress-free nights for Strategy Students who suffer from assignment nightmares. 🤡
                </p>
            </section>

            <!-- Our Goal -->
            <section class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Our Goal</h2>
                <p class="text-gray-600 leading-relaxed">
                    To cheat NCC and HND ai detectors, get distinctions, and receive 200,000 MMK cashback from the school.🤑
                </p>
            </section>

            <!-- Our Story -->
            <section>
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Our Story</h2>
                <p class="text-gray-600 leading-relaxed">
                    Once upon a time, there was a boy who hated writing assignments and AI detectors. He always thought about creating an AI-humanizer website to rescue SFU students from assignment nightmares. And so, SFU Bypass was born. 🌟
                </p>
            </section>
        </div>
    </main>

    @include('footer')
    @livewireScripts
</body>
</html>
