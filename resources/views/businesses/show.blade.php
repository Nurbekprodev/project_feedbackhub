<x-app-layout>

<div class="min-h-screen bg-[#0b1120] text-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">

            <!-- LEFT: BACK + TITLE -->
            <div class="space-y-3">

                <!-- Back Button -->
                <a href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 text-slate-400 hover:text-white transition text-sm">
                    
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7"/>
                    </svg>

                    Back to Dashboard
                </a>

                <!-- Title -->
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white">
                        {{ $business->name }}
                    </h1>

                    <p class="text-slate-400 mt-1">
                        Manage feedback and reviews
                    </p>
                </div>

            </div>

            <!-- RIGHT: ACTIONS -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">

                <a href="{{ route('businesses.qr', $business) }}"
                class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition active:scale-95 text-center">
                    QR Code
                </a>

                <button
                    onclick="copyLink('{{ url('/f/' . $business->uuid) }}', this)"
                    class="bg-slate-800 border border-slate-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-slate-700 transition active:scale-95">
                    Copy Link
                </button>

            </div>

        </div>

        <!-- ANALYTICS -->
        <div>
            <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">
                Overview
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                    <div class="text-xs text-slate-500 uppercase">New</div>
                    <div class="text-2xl font-bold text-blue-400 mt-2">{{ $newCount }}</div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                    <div class="text-xs text-slate-500 uppercase">In Progress</div>
                    <div class="text-2xl font-bold text-yellow-400 mt-2">{{ $inProgressCount }}</div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                    <div class="text-xs text-slate-500 uppercase">Resolved</div>
                    <div class="text-2xl font-bold text-green-400 mt-2">{{ $resolvedCount }}</div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                    <div class="text-xs text-slate-500 uppercase">Resolution Rate</div>
                    <div class="text-2xl font-bold text-white mt-2">{{ $resolutionRate }}%</div>
                </div>

            </div>
        </div>

        <!-- STATS -->
        <div class="space-y-6">

            <!-- QUALITY -->
            <div>
                <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">
                    Feedback Quality
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Total</div>
                        <div class="text-2xl font-bold text-white mt-2">{{ $totalCount }}</div>
                    </div>

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Average</div>
                        <div class="text-2xl font-bold text-white mt-2">
                            {{ number_format($averageRating, 1) }}
                        </div>
                    </div>

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Negative</div>
                        <div class="text-2xl font-bold text-red-400 mt-2">{{ $negativeCount }}</div>
                    </div>

                </div>
            </div>

            <!-- CONVERSION -->
            <div>
                <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">
                    Conversion Funnel
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Google Clicks</div>
                        <div class="text-2xl font-bold text-blue-400 mt-2">{{ $googleClicks }}</div>
                    </div>

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Naver Clicks</div>
                        <div class="text-2xl font-bold text-green-400 mt-2">{{ $naverClicks }}</div>
                    </div>

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Total Actions</div>
                        <div class="text-2xl font-bold text-white mt-2">{{ $totalClicks }}</div>
                    </div>

                </div>
            </div>

            <!-- TRENDS -->
            <div>
                <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">
                    7-Day Trends
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Feedback</div>

                        <div class="text-3xl font-bold text-white mt-2">
                            {{ $feedbackLast7 }}
                        </div>

                        <div class="text-sm mt-2 {{ $feedbackTrend >= 0 ? 'text-green-400' : 'text-red-400' }}">
                            {{ $feedbackTrend >= 0 ? '+' : '' }}{{ $feedbackTrend }}% vs last week
                        </div>
                    </div>

                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">
                        <div class="text-xs text-slate-500 uppercase">Clicks</div>

                        <div class="text-3xl font-bold text-white mt-2">
                            {{ $clicksLast7 }}
                        </div>

                        <div class="text-sm mt-2 {{ $clickTrend >= 0 ? 'text-green-400' : 'text-red-400' }}">
                            {{ $clickTrend >= 0 ? '+' : '' }}{{ $clickTrend }}% vs last week
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- FILTERS -->
        <div>
            <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">
                Filters
            </h2>

            <div class="flex gap-2 overflow-x-auto pb-2">

                @php
                $filters = [
                    'all' => ['label' => 'All'],
                    'new' => ['label' => 'New'],
                    'in_progress' => ['label' => 'In Progress'],
                    'resolved' => ['label' => 'Resolved'],
                ];
                @endphp

                @foreach($filters as $key => $filter)

                    @php
                        $isActive = request('filter', 'all') === $key;
                    @endphp

                    <a href="{{ route('businesses.show', [$business->id, 'filter' => $key !== 'all' ? $key : null]) }}"
                    class="px-4 py-2 rounded-xl text-sm whitespace-nowrap transition border
                    {{ $isActive
                        ? 'bg-indigo-500 text-white border-indigo-500'
                        : 'bg-slate-800 text-slate-300 border-slate-700 hover:bg-slate-700'
                    }}">
                        {{ $filter['label'] }}
                    </a>

                @endforeach

            </div>
        </div>

        <!-- SEARCH + SORT -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-2xl shadow-black/20">

            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Search & Sort
                </h3>
            </div>

            <form method="GET" class="flex flex-col md:flex-row gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search feedback..."
                    class="border border-slate-700 bg-slate-800/50 text-white placeholder-slate-500 rounded-xl px-4 py-2 w-full md:flex-1 focus:ring-0 focus:border-indigo-500"
                >

                <select
                    name="sort"
                    class="border border-slate-700 bg-slate-800/50 text-white rounded-xl px-4 py-2 w-full md:w-56 focus:ring-0 focus:border-indigo-500"
                >
                    <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>
                        Latest
                    </option>

                    <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>
                        Oldest
                    </option>

                    <option value="highest" {{ request('sort') === 'highest' ? 'selected' : '' }}>
                        Highest Rating
                    </option>

                    <option value="lowest" {{ request('sort') === 'lowest' ? 'selected' : '' }}>
                        Lowest Rating
                    </option>
                </select>

                <button
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 rounded-xl transition"
                >
                    Apply
                </button>

            </form>

        </div>

        <!-- FEEDBACK LIST -->
        <div>

            <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">
                Recent Feedback
            </h2>

            <div class="space-y-5">

                @forelse($feedbacks as $feedback)

                    <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-5 shadow-xl shadow-black/20 hover:border-slate-700 hover:bg-slate-900 transition-all duration-200">

                        <!-- Top Row -->
                        <div class="flex items-start justify-between gap-4 mb-4">

                            <div class="flex items-center gap-4 flex-wrap">

                                <!-- Rating -->
                                <div class="flex items-center gap-2">

                                    <div class="flex text-yellow-400 text-sm">
                                        @for($i = 1; $i <= 5; $i++)
                                            {{ $i <= $feedback->rating ? '★' : '☆' }}
                                        @endfor
                                    </div>

                                    <span class="text-sm text-slate-400">
                                        {{ $feedback->rating }}/5
                                    </span>

                                </div>

                                <!-- Time -->
                                <div class="text-xs text-slate-500">
                                    {{ $feedback->created_at->diffForHumans() }}
                                </div>

                            </div>

                            <!-- Status -->
                            <span class="px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap
                                @if($feedback->status === 'new')
                                    bg-blue-500/20 text-blue-400 border border-blue-500/30
                                @elseif($feedback->status === 'in_progress')
                                    bg-yellow-500/20 text-yellow-400 border border-yellow-500/30
                                @elseif($feedback->status === 'resolved')
                                    bg-green-500/20 text-green-400 border border-green-500/30
                                @endif
                            ">
                                {{ ucfirst(str_replace('_',' ', $feedback->status)) }}
                            </span>

                        </div>

                        <!-- Message -->
                        <div class=" pt-2">

                            @if($feedback->message)

                                <p class="text-sm leading-7 text-slate-300">
                                    {{ $feedback->message }}
                                </p>

                            @else

                                <p class="text-slate-500 italic text-sm">
                                    No comment provided
                                </p>

                            @endif

                        </div>

                        <!-- Bottom Actions -->
                        <div class="flex items-center justify-end mt-5">

                            <form method="POST" action="{{ route('feedbacks.status', $feedback) }}">
                                @csrf
                                @method('PATCH')

                                <select
                                    name="status"
                                    onchange="this.form.submit()"
                                    class="border border-slate-700 bg-slate-800/70 text-white rounded-xl px-3 py-2 text-sm focus:ring-0 focus:border-indigo-500"
                                >
                                    <option value="new" @selected($feedback->status === 'new')>New</option>
                                    <option value="in_progress" @selected($feedback->status === 'in_progress')>In Progress</option>
                                    <option value="resolved" @selected($feedback->status === 'resolved')>Resolved</option>
                                </select>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="bg-slate-900/80 border border-dashed border-slate-700 rounded-2xl p-12 text-center text-slate-400">
                        No feedback has been submitted yet.
                    </div>

                @endforelse

            </div>

        </div>

        <!-- PAGINATION -->
        <div>
            {{ $feedbacks->links() }}
        </div>

    </div>

</div>

</x-app-layout>