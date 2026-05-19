<x-app-layout>

<div class="min-h-screen bg-[#0b1120]">

    <div class="max-w-2xl mx-auto px-4 py-10">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-white">
                Create Business
            </h1>

            <p class="text-slate-400 mt-2">
                Set up your business feedback and review funnel
            </p>
        </div>

        <!-- Card -->
        <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800/60 rounded-3xl p-6 md:p-8 shadow-2xl shadow-black/20">

            <form method="POST" action="{{ route('businesses.store') }}" class="space-y-6">
                @csrf

                <!-- Business Name -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Business Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Your business name"
                        class="w-full bg-slate-800/60 border border-slate-700 text-white placeholder-slate-500 rounded-2xl px-4 py-3 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/30 transition"
                        required
                    >
                </div>

                <!-- Google URL -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Google Review URL
                    </label>

                    <input
                        type="url"
                        name="google_review_url"
                        value="{{ old('google_review_url') }}"
                        placeholder="https://..."
                        class="w-full bg-slate-800/60 border border-slate-700 text-white placeholder-slate-500 rounded-2xl px-4 py-3 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/30 transition"
                    >
                </div>

                <!-- Naver URL -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Naver Review URL
                    </label>

                    <input
                        type="url"
                        name="naver_review_url"
                        value="{{ old('naver_review_url') }}"
                        placeholder="https://..."
                        class="w-full bg-slate-800/60 border border-slate-700 text-white placeholder-slate-500 rounded-2xl px-4 py-3 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/30 transition"
                    >
                </div>

                <!-- Actions -->
                <div class="flex flex-col justify-between md:flex-row gap-3 pt-2">

                    <!-- Cancel -->
                    <a
                        href="{{ route('dashboard') }}"
                        class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 rounded-2xl border border-slate-700 text-slate-300 hover:bg-slate-800 transition"
                    >
                        Cancel
                    </a>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 rounded-2xl font-semibold transition active:scale-95 shadow-lg shadow-indigo-500/20"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>

                        Create Business
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>