<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0b1120] min-h-screen flex items-center justify-center px-4 py-10">

<div x-data="{ rating: 0, hoverRating: 0 }" class="w-full max-w-md">

    <div class="relative bg-[rgba(17,26,46,0.8)] backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-[rgba(99,102,241,0.15)]">
        
        <!-- Glow effect -->
        <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-3xl blur-xl opacity-50"></div>
        
        <div class="relative">
            <!-- Logo -->
            <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center text-3xl font-bold shadow-lg shadow-indigo-500/30">
                {{ strtoupper(substr($business->name, 0, 1)) }}
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-center mb-2 text-white">
                {{ $business->name }}
            </h1>

            <p class="text-center text-slate-400 mb-8">
                How was your experience?
            </p>

            <!-- Stars -->
            <div class="flex justify-center gap-3 mb-8">
                <template x-for="star in 5" :key="star">
                    <button
                        type="button"
                        @click="rating = star"
                        @mouseenter="hoverRating = star"
                        @mouseleave="hoverRating = 0"
                        class="transition-all duration-200 hover:scale-110 active:scale-95 p-1"
                    >
                        <svg 
                            class="w-10 h-10 transition-all duration-200"
                            :class="star <= (hoverRating || rating) ? 'text-amber-400 drop-shadow-[0_0_8px_rgba(251,191,36,0.5)]' : 'text-slate-600'"
                            fill="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </button>
                </template>
            </div>

            <!-- Rating label -->
            <div x-show="rating > 0" x-transition class="text-center mb-6">
                <span 
                    class="inline-block px-4 py-1.5 rounded-full text-sm font-medium"
                    :class="rating <= 3 ? 'bg-red-500/20 text-red-400 border border-red-500/30' : 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30'"
                    x-text="rating <= 3 ? 'We can do better' : 'Excellent!'"
                ></span>
            </div>

            <!-- FORM -->
            <form
                x-show="rating > 0"
                x-transition
                method="POST"
                action="{{ route('feedback.submit', $business->uuid) }}"
                class="space-y-4"
            >
                @csrf

                <input type="hidden" name="rating" :value="rating">

                <!-- NEGATIVE FLOW (1-3) -->
                <div x-show="rating <= 3" x-transition class="space-y-4">

                    <div class="bg-[rgba(239,68,68,0.1)] border border-red-500/20 rounded-2xl p-4 text-center">
                        <div class="flex items-center justify-center gap-2 text-red-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="font-medium">We&apos;re sorry to hear that</p>
                        </div>
                        <p class="text-slate-400 text-sm mt-1">Please tell us what happened</p>
                    </div>

                    <textarea
                        name="message"
                        class="w-full bg-[rgba(15,23,42,0.6)] border border-slate-700/50 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/50 rounded-2xl p-4 resize-none text-white placeholder-slate-500 transition-all"
                        rows="4"
                        placeholder="Your feedback helps us improve..."
                    ></textarea>

                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white py-4 rounded-xl font-semibold transition-all duration-200 active:scale-[0.98] shadow-lg shadow-indigo-500/30 flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Submit Feedback
                    </button>

                </div>

                <!-- POSITIVE FLOW (4-5) -->
                <div x-show="rating >= 4" x-transition class="space-y-4">

                    <div class="bg-[rgba(16,185,129,0.1)] border border-emerald-500/20 rounded-2xl p-4 text-center">
                        <div class="flex items-center justify-center gap-2 text-emerald-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <p class="font-medium">Thank you for your support!</p>
                        </div>
                    </div>

                    <p class="text-center text-sm text-slate-400">
                        Share your experience on your preferred platform
                    </p>

                    <div class="space-y-3">

                        @if($business->google_review_url)
                            <a
                                href="{{ route('review.google', $business) }}"
                                class="group block w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-4 rounded-xl text-center font-semibold transition-all duration-200 active:scale-[0.98] shadow-lg shadow-blue-500/30"
                            >
                                <span class="flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                    </svg>
                                    Review on Google
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </a>
                        @endif

                        @if($business->naver_review_url)
                            <a
                                href="{{ route('review.naver', $business) }}"
                                class="group block w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white py-4 rounded-xl text-center font-semibold transition-all duration-200 active:scale-[0.98] shadow-lg shadow-emerald-500/30"
                            >
                                <span class="flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16.273 12.845L7.376 0H0v24h7.727V11.155L16.624 24H24V0h-7.727v12.845z"/>
                                    </svg>
                                    Review on Naver
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </a>
                        @endif

                    </div>

                </div>

            </form>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mt-6 rounded-2xl bg-emerald-500/20 border border-emerald-500/30 px-4 py-4 text-emerald-400 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Footer -->
            <p class="text-center text-xs text-slate-500 mt-8">
                Powered by <span class="text-indigo-400">{{ config('app.name') }}</span>
            </p>
        </div>
    </div>

</div>

</body>
</html>