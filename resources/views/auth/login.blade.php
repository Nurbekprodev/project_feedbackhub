<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-8 shadow-2xl shadow-black/20">

            <div class="mb-6">

                <h1 class="text-3xl font-extrabold text-white">
                    Welcome Back
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    Sign in to continue to your dashboard.
                </p>

            </div>

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>

                    <x-input-label
                        for="email"
                        :value="__('Email')"
                        class="text-sm font-medium text-slate-300"
                    />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>

                <!-- Password -->
                <div>

                    <x-input-label
                        for="password"
                        :value="__('Password')"
                        class="text-sm font-medium text-slate-300"
                    />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between gap-4">

                    <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">

                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-slate-600 bg-slate-800 text-indigo-500 shadow-sm focus:ring-indigo-500"
                            name="remember"
                        >

                        <span class="text-sm text-slate-400">
                            {{ __('Remember me') }}
                        </span>

                    </label>

                    @if (Route::has('password.request'))

                        <a
                            class="text-sm text-indigo-400 hover:text-indigo-300 transition underline underline-offset-4"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot your password?') }}
                        </a>

                    @endif

                </div>

                <div class="pt-2">

                    <x-primary-button
                        class="w-full justify-center rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-3 font-semibold text-white transition-all active:scale-[0.98]"
                    >
                        {{ __('Log in') }}
                    </x-primary-button>

                </div>

                <!-- Register -->
                <div class="text-center pt-2">

                    <span class="text-sm text-slate-400">
                        Don't have an account?
                    </span>

                    <a
                        href="{{ route('register') }}"
                        class="ml-1 text-sm font-semibold text-indigo-400 hover:text-indigo-300 transition"
                    >
                        Register
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>