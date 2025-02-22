<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SFU Bypass</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png" href="{{ asset('image/cat.png') }}">
    @livewireStyles
</head>
<body class="h-screen bg-gray-100">
    @include('header')
    <div class="w-full text-center py-16 bg-gradient-to-b from-white to-gray-100">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-700 tracking-tight">
            Step Right Up to <span class="text-red-500 font-playful animate-pulse">&lt;SFU&gt;</span>
            <span class="text-gray-900 italic drop-shadow-md">Bypass</span>!
        </h1>
        <p class="text-gray-500 text-lg mt-3 font-light max-w-2xl mx-auto">
            Best AI Humanizeer for Strategy First students who want distinctions.🤡✨
        </p>
    </div>
    @livewire('generate-text')
    @livewireScripts
    @include('footer')
</body>
</html>
