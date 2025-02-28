<header class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="header-left" class="flex items-center">
        <a href="{{route('home')}}" wire:navigate>
            <div class="text-gray-800 font-semibold">
                <span class="text-red-500 text-xl">&lt;SFU&gt;</span>bypass
            </div>
        </a>
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        <div class="flex space-x-5">
            <a class="flex space-x-2 items-center hover:text-red-500 text-sm text-gray-500" href="{{ route('aboutus') }}" wire:navigate>
                About Us
            </a>
            <a class="flex space-x-2 items-center hover:text-red-500 text-sm text-gray-500" href="{{ route('price') }}" wire:navigate>
                Pricing
            </a>
        </div>
    </div>
</header>