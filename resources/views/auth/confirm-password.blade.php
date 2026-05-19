<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-8 shadow-2xl shadow-black/20">

            <div class="mb-6">

                <h1 class="text-2xl font-extrabold text-white">
                    {{ __('Confirm Password') }}
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>

            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf

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

                <div class="flex justify-end">

                    <x-primary-button
                        class="rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-2.5 font-semibold text-white transition-all active:scale-95"
                    >
                        {{ __('Confirm') }}
                    </x-primary-button>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>