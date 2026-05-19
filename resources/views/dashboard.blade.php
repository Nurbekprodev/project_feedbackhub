<x-app-layout>

<div class="min-h-screen bg-[#0b1120]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-5 py-4 text-emerald-400">
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h1 class="text-3xl font-extrabold text-white">
                    Dashboard
                </h1>

                <p class="text-sm text-slate-400 mt-1">
                    Manage your businesses and review feedback pages
                </p>
            </div>

            <a
                href="{{ route('businesses.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-3 rounded-2xl text-sm font-semibold transition-all active:scale-95 shadow-lg shadow-indigo-500/20"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>

                Add Business
            </a>

        </div>

        <!-- Businesses -->
        <div class="bg-[rgba(17,26,46,0.8)] backdrop-blur-xl border border-slate-800/60 rounded-3xl p-6 shadow-2xl">

            <div class="flex items-center justify-between mb-6">

                <div>
                    <h2 class="text-lg font-bold text-white">
                        Your Businesses
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Access and manage all your review funnels
                    </p>
                </div>

                @if(auth()->user()->businesses->count())
                    <div class="hidden md:flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-800/70 border border-slate-700 text-sm text-slate-300">
                        {{ auth()->user()->businesses->count() }} Businesses
                    </div>
                @endif

            </div>

            @if(auth()->user()->businesses->count())

                <div class="space-y-5">

                    @foreach(auth()->user()->businesses as $business)

                        <div class="group rounded-2xl border border-slate-800/60 bg-slate-900/70 backdrop-blur-xl p-5 hover:border-slate-700 hover:bg-slate-900 transition-all duration-200 shadow-xl shadow-black/10">

                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                                <!-- LEFT -->
                                <div class="flex items-center gap-4 min-w-0">

                                    <!-- Avatar -->
                                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-indigo-500 flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-500/20 shrink-0">
                                        {{ strtoupper(substr($business->name, 0, 1)) }}
                                    </div>

                                    <!-- Text -->
                                    <div class="min-w-0">

                                        <h3 class="text-base sm:text-lg font-semibold text-white truncate">
                                            {{ $business->name }}
                                        </h3>

                                        <!-- UUID (clean + subtle + truncates on mobile) -->
                                        <p class="text-[11px] sm:text-xs text-slate-500 mt-1 font-mono truncate max-w-[180px] sm:max-w-none">
                                            {{ $business->uuid }}
                                        </p>

                                    </div>
                                </div>

                                <!-- ACTIONS -->
                                <div class="flex items-center justify-between sm:justify-end gap-3 sm:gap-5">

                                    <!-- Edit -->
                                    <a
                                        href="{{ route('businesses.edit', $business) }}"
                                        class="text-sm font-medium text-slate-400 hover:text-indigo-400 transition"
                                    >
                                        Edit
                                    </a>

                                    <!-- Open -->
                                    <a
                                        href="{{ route('businesses.show', $business) }}"
                                        class="inline-flex items-center gap-2 rounded-xl bg-indigo-500/10 border border-indigo-500/20 px-3 py-2 text-sm font-medium text-indigo-400 hover:bg-indigo-500/20 transition"
                                    >
                                        Open

                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>

                                </div>

                            </div>
                        </div>

                    @endforeach

                </div>

            @else

                <div class="rounded-3xl border border-dashed border-slate-700 bg-slate-900/40 py-16 px-6 text-center">

                    <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-slate-800 flex items-center justify-center">
                        <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M5 7l1 12h12l1-12M10 11v6M14 11v6"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-semibold text-white mb-2">
                        No businesses yet
                    </h3>

                    <p class="text-sm text-slate-400 mb-6">
                        Create your first business and start collecting feedback
                    </p>

                    <a
                        href="{{ route('businesses.create') }}"
                        class="inline-flex items-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-3 rounded-2xl text-sm font-semibold transition-all active:scale-95"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>

                        Add Business
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>