<section>

    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-6 shadow-2xl shadow-black/20">

        <header class="mb-6">

            <h2 class="text-xl font-bold text-white">
                {{ __('Update Password') }}
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-400 max-w-2xl">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>

        </header>

        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <div>

                <x-input-label
                    for="update_password_current_password"
                    :value="__('Current Password')"
                    class="text-sm font-medium text-slate-300"
                />

                <x-text-input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                    autocomplete="current-password"
                />

                <x-input-error
                    :messages="$errors->updatePassword->get('current_password')"
                    class="mt-2"
                />

            </div>

            <div>

                <x-input-label
                    for="update_password_password"
                    :value="__('New Password')"
                    class="text-sm font-medium text-slate-300"
                />

                <x-text-input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                    autocomplete="new-password"
                />

                <x-input-error
                    :messages="$errors->updatePassword->get('password')"
                    class="mt-2"
                />

            </div>

            <div>

                <x-input-label
                    for="update_password_password_confirmation"
                    :value="__('Confirm Password')"
                    class="text-sm font-medium text-slate-300"
                />

                <x-text-input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="mt-2 block w-full rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-0"
                    autocomplete="new-password"
                />

                <x-input-error
                    :messages="$errors->updatePassword->get('password_confirmation')"
                    class="mt-2"
                />

            </div>

            <div class="flex items-center gap-4 pt-2">

                <x-primary-button
                    class="rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-2.5 font-semibold text-white transition-all active:scale-95"
                >
                    {{ __('Save') }}
                </x-primary-button>

                @if (session('status') === 'password-updated')

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