<section>

    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-6 shadow-2xl shadow-black/20">

        <header class="mb-6">

            <h2 class="text-xl font-bold text-white">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-400 max-w-2xl">
                {{ __("Update your account's profile information and email address.") }}
            </p>

        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <div>

                <x-input-label
                    for="name"
                    :value="__('Name')"
                    class="text-sm font-medium text-slate-300"
                />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                    :value="old('name', $user->name)"
                    required
                    autofocus
                    autocomplete="name"
                />

                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('name')"
                />

            </div>

            <div>

                <x-input-label
                    for="email"
                    :value="__('Email')"
                    class="text-sm font-medium text-slate-300"
                />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-2 block w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                    :value="old('email', $user->email)"
                    required
                    autocomplete="username"
                />

                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('email')"
                />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                    <div class="mt-4 rounded-xl border border-yellow-500/20 bg-yellow-500/10 p-4">

                        <p class="text-sm text-yellow-200 leading-6">
                            {{ __('Your email address is unverified.') }}
                        </p>

                        <button
                            form="send-verification"
                            class="mt-3 inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300 transition underline underline-offset-4"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')

                            <p class="mt-3 text-sm font-medium text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>

                        @endif

                    </div>

                @endif

            </div>

            <div class="flex items-center gap-4 pt-2">

                <x-primary-button
                    class="rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-2.5 font-semibold text-white transition-all active:scale-95"
                >
                    {{ __('Save') }}
                </x-primary-button>

                @if (session('status') === 'profile-updated')

                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-green-400"
                    >
                        {{ __('Saved.') }}
                    </p>

                @endif

            </div>

        </form>

    </div>

</section>

