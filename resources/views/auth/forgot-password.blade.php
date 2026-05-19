
<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-8 shadow-2xl shadow-black/20">

            <div class="mb-6">

                <h1 class="text-2xl font-extrabold text-white">
                    {{ __('Forgot Password') }}
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>

            </div>

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>

                <div class="flex items-center justify-end pt-2">

                    <x-primary-button
                        class="rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-2.5 font-semibold text-white transition-all active:scale-95"
                    >
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>
