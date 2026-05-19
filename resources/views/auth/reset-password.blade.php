<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-8 shadow-2xl shadow-black/20">

            <div class="mb-6">

                <h1 class="text-3xl font-extrabold text-white">
                    Reset Password
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    Create a new secure password for your account.
                </p>

            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf

                <!-- Password Reset Token -->
                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >

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
                        :value="old('email', $request->email)"
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
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>

                <!-- Confirm Password -->
                <div>

                    <x-input-label
                        for="password_confirmation"
                        :value="__('Confirm Password')"
                        class="text-sm font-medium text-slate-300"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="block mt-2 w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2"
                    />

                </div>

                <div class="pt-2">

                    <x-primary-button
                        class="w-full justify-center rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-3 font-semibold text-white transition-all active:scale-[0.98]"
                    >
                        {{ __('Reset Password') }}
                    </x-primary-button>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>