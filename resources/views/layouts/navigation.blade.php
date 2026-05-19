<nav x-data="{ open: false, notificationsOpen: false }"
    class="sticky top-0 z-50 border-b border-slate-800/60 bg-[#0b1120]/80 backdrop-blur-xl">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- LEFT -->
            <div class="flex items-center gap-8">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                    <div class="w-9 h-9 rounded-xl bg-indigo-500 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                        <span class="text-white font-bold text-sm">
                            {{ strtoupper(substr(config('app.name'), 0, 1)) }}
                        </span>
                    </div>

                    <span class="text-white font-bold text-lg">
                        {{ config('app.name') }}
                    </span>

                </a>

                <!-- Desktop Nav -->
                <div class="hidden sm:flex items-center gap-2">

                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('home')
                            ? 'bg-slate-800 text-white'
                            : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                        Home
                    </a>

                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('dashboard')
                            ? 'bg-indigo-500 text-white'
                            : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                        Dashboard
                    </a>

                </div>

            </div>

            @auth

            @php
                $unreadCount = auth()->user()->unreadNotifications()->count();
            @endphp

            <!-- RIGHT (DESKTOP) -->
            <div class="hidden sm:flex items-center gap-4 relative">

                <!-- Notifications -->
                <button
                    @click="notificationsOpen = !notificationsOpen"
                    class="relative p-2.5 rounded-xl bg-slate-800/60 text-slate-400 hover:text-white hover:bg-slate-700 transition"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118
                            14.158V11a6.002 6.002 0 00-4-5.659V5a2
                            2 0 10-4 0v.341C7.67 6.165 6 8.388
                            6 11v3.159c0 .538-.214 1.055-.595
                            1.436L4 17h5m6 0v1a3 3 0 11-6
                            0v-1m6 0H9"/>
                    </svg>

                    @if($unreadCount > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </button>

                <!-- Dropdown (DESKTOP) -->
                <div
                    x-show="notificationsOpen"
                    @click.away="notificationsOpen = false"
                    x-transition
                    class="absolute right-0 top-12 w-80 rounded-2xl border border-slate-800 bg-[#111a2e] shadow-2xl overflow-hidden z-50"
                >
                    <div class="px-5 py-4 border-b border-slate-800">
                        <h3 class="text-sm font-semibold text-white">
                            Notifications
                        </h3>
                    </div>

                    <div class="max-h-96 overflow-y-auto">

                        @forelse(auth()->user()->unreadNotifications->take(5) as $notification)

                            <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                                @csrf

                                <button type="submit"
                                    class="w-full text-left px-5 py-4 border-b border-slate-800 hover:bg-slate-800/40"
                                >
                                    <div class="flex items-center gap-2 mb-2">
                                        <div class="flex text-yellow-400 text-xs">
                                            @for($i = 1; $i <= 5; $i++)
                                                {{ $i <= $notification->data['rating'] ? '★' : '☆' }}
                                            @endfor
                                        </div>

                                        <span class="text-xs text-slate-400">
                                            {{ $notification->data['rating'] }}/5
                                        </span>
                                    </div>

                                    <div class="text-sm text-slate-300">
                                        {{ $notification->data['message'] ?? 'No message provided' }}
                                    </div>

                                    <div class="text-xs text-slate-500 mt-2">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </div>

                                </button>

                            </form>

                        @empty
                            <div class="px-5 py-6 text-sm text-slate-500">
                                No notifications yet.
                            </div>
                        @endforelse

                    </div>
                </div>

                <!-- User -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 px-3 py-2 rounded-xl bg-slate-800/60 hover:bg-slate-700 transition">

                            <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-sm font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <div class="text-sm font-medium text-white">
                                {{ Auth::user()->name }}
                            </div>

                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"/>
                            </svg>

                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#111a2e] border border-slate-800 rounded-2xl overflow-hidden">
                            <x-dropdown-link :href="route('profile.edit')"
                                class="text-slate-300 hover:bg-slate-800 hover:text-white">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-red-400 hover:bg-red-500/10"
                                >
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>

            </div>

            <!-- RIGHT (MOBILE) -->
            <div class="flex sm:hidden items-center gap-2 relative" x-data="{ notificationsOpen: false }">

                @php
                    $unreadCount = auth()->user()->unreadNotifications()->count();
                @endphp

                <!-- Notifications Button -->
                <button
                    @click="notificationsOpen = !notificationsOpen"
                    class="relative p-2 rounded-xl bg-slate-800/60 text-slate-400 hover:text-white"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>

                    @if($unreadCount > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </button>

                <!-- MOBILE DROPDOWN (FIXED POSITION) -->
                <div
                    x-show="notificationsOpen"
                    x-transition
                    @click.away="notificationsOpen = false"
                    class="fixed top-16 right-3 left-3 z-50 rounded-2xl border border-slate-800 bg-[#111a2e] shadow-2xl overflow-hidden"
                >

                    <div class="px-5 py-4 border-b border-slate-800">
                        <h3 class="text-sm font-semibold text-white">
                            Notifications
                        </h3>
                    </div>

                    <div class="max-h-80 overflow-y-auto">

                        @forelse(auth()->user()->unreadNotifications->take(5) as $notification)

                            <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                                @csrf

                                <button type="submit"
                                    class="w-full text-left px-5 py-4 border-b border-slate-800 hover:bg-slate-800/40"
                                >
                                    <div class="text-sm text-slate-300">
                                        {{ $notification->data['message'] ?? 'No message provided' }}
                                    </div>

                                    <div class="text-xs text-slate-500 mt-1">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </div>
                                </button>

                            </form>

                        @empty
                            <div class="px-5 py-6 text-sm text-slate-500">
                                No notifications yet.
                            </div>
                        @endforelse

                    </div>
                </div>

                <!-- Hamburger -->
                <button
                    @click="open = !open"
                    class="p-2 rounded-xl bg-slate-800/60 text-slate-400 hover:text-white"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>
                </button>

            </div>

            @endauth

        </div>
    </div>

    <!-- MOBILE MENU -->
    @auth
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden border-t border-slate-800 bg-[#0b1120]">

        <div class="px-4 py-4 space-y-2">

            <a href="{{ route('home') }}"
                class="block px-4 py-3 rounded-xl text-sm
                {{ request()->routeIs('home')
                    ? 'bg-slate-800 text-white'
                    : 'text-slate-400 bg-slate-900/50' }}">
                Home
            </a>

            <a href="{{ route('dashboard') }}"
                class="block px-4 py-3 rounded-xl text-sm
                {{ request()->routeIs('dashboard')
                    ? 'bg-indigo-500 text-white'
                    : 'text-slate-400 bg-slate-900/50' }}">
                Dashboard
            </a>

        </div>

        <div class="border-t border-slate-800 px-4 py-4">

            <div class="mb-4">
                <div class="text-white font-medium">
                    {{ Auth::user()->name }}
                </div>

                <div class="text-sm text-slate-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="space-y-2">

                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-3 rounded-xl bg-slate-900/50 text-slate-300 text-sm">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-4 py-3 rounded-xl bg-red-500/10 text-red-400 text-sm"
                    >
                        Log Out
                    </button>

                </form>

            </div>

        </div>

    </div>
    @endauth

</nav>