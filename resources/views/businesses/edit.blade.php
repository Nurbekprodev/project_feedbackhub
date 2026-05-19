<x-app-layout>

<div class="min-h-screen bg-[#0b1120]">

    <div class="max-w-2xl mx-auto px-4 py-10">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-white">
                Edit Business
            </h1>

            <p class="text-slate-400 mt-2">
                Edit your business details and feedback settings
            </p>
        </div>

        <!-- Card -->
        <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800/60 rounded-3xl p-6 md:p-8 shadow-2xl shadow-black/20">

            <!-- UPDATE FORM -->
            <form method="POST" action="{{ route('businesses.update', $business) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Business Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $business->name) }}"
                        class="w-full bg-slate-800/60 border border-slate-700 text-white rounded-2xl px-4 py-3 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/30 transition"
                        required
                    >
                </div>

                <!-- Google -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Google Review URL
                    </label>

                    <input
                        type="url"
                        name="google_review_url"
                        value="{{ old('google_review_url', $business->google_review_url) }}"
                        class="w-full bg-slate-800/60 border border-slate-700 text-white rounded-2xl px-4 py-3 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/30 transition"
                    >
                </div>

                <!-- Naver -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Naver Review URL
                    </label>

                    <input
                        type="url"
                        name="naver_review_url"
                        value="{{ old('naver_review_url', $business->naver_review_url) }}"
                        class="w-full bg-slate-800/60 border border-slate-700 text-white rounded-2xl px-4 py-3 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/30 transition"
                    >
                </div>

                <!-- ACTION ROW -->
                <div class="flex flex-col justify-between md:flex-row gap-3 pt-2">

                    <!-- Back -->
                    <a
                        href="{{ route('dashboard') }}"
                        class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 rounded-2xl border border-slate-700 text-slate-300 hover:bg-slate-800 transition"
                    >
                        Cancel
                    </a>

                    <!-- Update -->
                    <button
                        type="submit"
                        class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 rounded-2xl font-semibold transition shadow-lg shadow-indigo-500/20"
                    >
                        Update
                    </button>

                </div>
            </form>

            <!-- DANGER ZONE -->
            <div class="mt-10 border-t border-slate-800 pt-6">

                <form method="POST" action="{{ route('businesses.destroy', $business) }}">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        onclick="return confirm('This action cannot be undone. Delete business?')"
                        class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold transition shadow-lg shadow-red-500/20"
                    >
                        Delete Business
                    </button>

                </form>

            </div>

        </div>
    </div>

</div>

</x-app-layout>