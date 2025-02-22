<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing - SFU Bypass</title>
    <link rel="icon" type="image/png" href="{{ asset('image/cat.png') }}">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-100 flex flex-col">
    @include('header')

    <!-- Pricing Section -->
    <main class="flex-grow flex items-center justify-center py-12 px-6 bg-gradient-to-b from-white to-gray-100">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Heading -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                All Strategy First Students Get <span class="text-red-500">&lt;SFU&gt;</span><span class="text-gray-900">bypass</span>
                <span class="block text-2xl md:text-3xl mt-2 text-sky-500">100% FREE</span>
                Until Our Server Goes 🔥!
            </h1>

            <!-- Image -->
            <div class="flex justify-center">
                <img src="image/server.gif" alt="Server on fire" class="max-w-full h-auto rounded-lg shadow-md">
            </div>
        </div>
    </main>

    @include('footer')
    @livewireScripts
</body>
</html>
