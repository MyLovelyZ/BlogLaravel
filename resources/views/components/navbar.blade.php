<nav class="bg-gray-800" x-data="{ open: false, mobileMenuOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
        <button class="shrink-0 cursor-pointer" href="/">
            <img src="/img/gtw.jpg" alt="Your Company" class="size-8" />
        </button>
        <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
                <x-nave-link href="/" :current="request()->is('/')">Home</x-nave-link>
                <x-nave-link href="/posts" :current="request()->is('posts')">Blog</x-nave-link>
                <x-nave-link href="/about" :current="request()->is('about')">About</x-nave-link>
                <x-nave-link href="/contact" :current="request()->is('contact')">Contact</x-nave-link>
            </div>
        </div>
        </div>
        <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="relative ml-3">

                <!-- Avatar button -->
                @if (Auth::check())  
                <button
                    type="button"
                    class="cursor-pointer flex items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                    @click="open = !open"
                    aria-expanded="false"
                    aria-haspopup="true">                    
                    <img
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="User avatar"
                        class="h-8 w-8 rounded-full hover:size-9 transition-all duration-200"
                    >
                </button>
                @else
                <a href="/login" class="text-white">Login</a>
                <span class="text-white px-3">|</span>
                <a href="/register" class="text-white">Register</a>
                @endif
                    <span class="sr-only">Open user menu</span>

                <!-- Dropdown -->
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    x-cloak
                    class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 z-50"
                    role="menu"
                >
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your profile</a>
                    <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <form action="" method="POST">
                        <button>Sign Out</button>
                    </form>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>

            </div>
        </div>
        </div>
        <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button type="button" command="--toggle" commandfor="mobile-menu" class="cursor-pointer relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500" @click="mobileMenuOpen = !mobileMenuOpen">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded" x-show = "!mobileMenuOpen">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded" x-show = "mobileMenuOpen">
            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        </div>
    </div>
    </div>

    <div id="mobile-menu" class="block" x-show="mobileMenuOpen">
    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
        <x-nave-link class="block" href="/" :current="request()->is('/')">Home</x-nave-link>
        <x-nave-link class="block" href="/posts" :current="request()->is('posts')">Blog</x-nave-link>
        <x-nave-link class="block" href="/about" :current="request()->is('about')">About</x-nave-link>
        <x-nave-link class="block" href="/contact" :current="request()->is('contact')">Contact</x-nave-link>
    </div>
    <div class="border-t border-white/10 pt-4 pb-3">
        <div class="flex items-center px-5">
        <div class="shrink-0">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
        </div>
        <div class="ml-3">
            <div class="text-base/5 font-medium text-white">Tom Cook</div>
            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
        </div>
        </div>
        <div class="mt-3 space-y-1 px-2">
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your profile</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign out</a>
        </div>
    </div>
    </div>
</nav>