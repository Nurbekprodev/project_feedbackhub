<x-app-layout>

    <div class="min-h-screen bg-[#0b1120] text-white overflow-hidden">

        <!-- Background Glow -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-indigo-500/10 blur-3xl rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-500/10 blur-3xl rounded-full"></div>
        </div>


        <!-- HERO -->
        <section class="relative z-10">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">

                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left -->
                    <div>

                        <div class="inline-flex items-center gap-2 rounded-full border border-indigo-500/20 bg-indigo-500/10 px-4 py-2 text-sm text-indigo-300 mb-6">
                            ⭐ Trusted by growing businesses
                        </div>

                        <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-white">
                            Turn customer feedback into
                            <span class="text-indigo-400">5-star reviews</span>
                        </h1>

                        <p class="mt-6 text-lg leading-8 text-slate-400 max-w-2xl">
                            Collect private feedback, improve customer satisfaction, and guide happy customers to public reviews automatically.
                        </p>

                        <div class="mt-10 flex flex-col sm:flex-row gap-4">

                            <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center rounded-2xl bg-indigo-500 hover:bg-indigo-600 px-6 py-4 text-base font-semibold text-white transition-all active:scale-95 shadow-xl shadow-indigo-500/20">
                                Start Free
                            </a>

                            <a href="#features"
                            class="inline-flex items-center justify-center rounded-2xl border border-slate-700 bg-slate-900/70 hover:bg-slate-800 px-6 py-4 text-base font-semibold text-white transition-all">
                                Learn More
                            </a>

                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-4 mt-14">

                            <div>
                                <div class="text-3xl font-extrabold text-white">12k+</div>
                                <div class="mt-2 text-sm text-slate-500">Reviews Generated</div>
                            </div>

                            <div>
                                <div class="text-3xl font-extrabold text-white">98%</div>
                                <div class="mt-2 text-sm text-slate-500">Customer Satisfaction</div>
                            </div>

                            <div>
                                <div class="text-3xl font-extrabold text-white">320+</div>
                                <div class="mt-2 text-sm text-slate-500">Businesses</div>
                            </div>

                        </div>

                    </div>

                    <!-- Right -->
                    <div class="relative">

                        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-3xl p-6 shadow-2xl shadow-black/30">

                            <!-- Top -->
                            <div class="flex items-center justify-between mb-6">

                                <div>
                                    <h3 class="text-lg font-bold text-white">
                                        Dashboard Overview
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Last 7 days analytics
                                    </p>
                                </div>

                                <div class="px-3 py-1 rounded-full bg-green-500/10 border border-green-500/20 text-green-400 text-xs font-semibold">
                                    +18.2%
                                </div>

                            </div>

                            <!-- Cards -->
                            <div class="grid grid-cols-2 gap-4 mb-6">

                                <div class="rounded-2xl border border-slate-800 bg-slate-950/50 p-5">
                                    <div class="text-xs uppercase text-slate-500">Reviews</div>
                                    <div class="text-3xl font-bold text-white mt-3">1,284</div>
                                    <div class="text-sm text-green-400 mt-2">+12% this month</div>
                                </div>

                                <div class="rounded-2xl border border-slate-800 bg-slate-950/50 p-5">
                                    <div class="text-xs uppercase text-slate-500">Average Rating</div>
                                    <div class="text-3xl font-bold text-white mt-3">4.9</div>
                                    <div class="text-sm text-indigo-400 mt-2">Excellent</div>
                                </div>

                            </div>

                            <!-- List -->
                            <div class="space-y-4">

                                <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-4 flex items-center justify-between">

                                    <div>
                                        <div class="text-sm font-medium text-white">
                                            New Feedback Received
                                        </div>

                                        <div class="text-xs text-slate-500 mt-1">
                                            2 minutes ago
                                        </div>
                                    </div>

                                    <div class="text-green-400 text-sm font-semibold">
                                        Positive
                                    </div>

                                </div>

                                <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-4 flex items-center justify-between">

                                    <div>
                                        <div class="text-sm font-medium text-white">
                                            Google Review Submitted
                                        </div>

                                        <div class="text-xs text-slate-500 mt-1">
                                            12 minutes ago
                                        </div>
                                    </div>

                                    <div class="text-indigo-400 text-sm font-semibold">
                                        5 Stars
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- FEATURES -->
        <section id="features" class="relative z-10 py-24 border-t border-slate-800/60">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center max-w-3xl mx-auto">

                    <div class="text-xs font-semibold uppercase tracking-widest text-indigo-400">
                        Features
                    </div>

                    <h2 class="mt-4 text-4xl font-extrabold text-white">
                        Everything you need to manage customer feedback
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-400">
                        Designed for modern businesses that care about customer experience and online reputation.
                    </p>

                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">

                    <div class="rounded-3xl border border-slate-800/60 bg-slate-900/70 backdrop-blur-xl p-6 shadow-xl shadow-black/10">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 mb-5">
                            📊
                        </div>
                        <h3 class="text-xl font-bold text-white">Analytics Dashboard</h3>
                        <p class="mt-3 text-slate-400 leading-7">
                            Monitor trends, ratings, and review performance in real time.
                        </p>
                    </div>

                    <div class="rounded-3xl border border-slate-800/60 bg-slate-900/70 backdrop-blur-xl p-6 shadow-xl shadow-black/10">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 mb-5">
                            ⭐
                        </div>
                        <h3 class="text-xl font-bold text-white">Review Funnel</h3>
                        <p class="mt-3 text-slate-400 leading-7">
                            Guide satisfied customers directly to your Google and Naver reviews.
                        </p>
                    </div>

                    <div class="rounded-3xl border border-slate-800/60 bg-slate-900/70 backdrop-blur-xl p-6 shadow-xl shadow-black/10">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 mb-5">
                            🔒
                        </div>
                        <h3 class="text-xl font-bold text-white">Private Feedback</h3>
                        <p class="mt-3 text-slate-400 leading-7">
                            Resolve customer issues privately before they become public reviews.
                        </p>
                    </div>

                </div>

            </div>

        </section>

        <!-- CTA -->
        <section class="relative z-10 py-24 border-t border-slate-800/60">

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="rounded-[2rem] border border-slate-800/60 bg-slate-900/80 backdrop-blur-xl p-10 lg:p-16 text-center shadow-2xl shadow-black/20">

                    <div class="inline-flex items-center gap-2 rounded-full border border-indigo-500/20 bg-indigo-500/10 px-4 py-2 text-sm text-indigo-300 mb-6">
                        Start growing today
                    </div>

                    <h2 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                        Ready to grow your online reputation?
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-400 max-w-2xl mx-auto">
                        Join businesses already using FeedbackFlow to collect more reviews and improve customer satisfaction.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">

                        <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center rounded-2xl bg-indigo-500 hover:bg-indigo-600 px-6 py-4 text-base font-semibold text-white transition-all active:scale-95 shadow-xl shadow-indigo-500/20">
                            Get Started Free
                        </a>

                        <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center rounded-2xl border border-slate-700 bg-slate-900/70 hover:bg-slate-800 px-6 py-4 text-base font-semibold text-white transition-all">
                            Sign In
                        </a>

                    </div>

                </div>

            </div>

        </section>

    </div>
   


</x-app-layout>