<section class="space-y-6">

    <div class="bg-slate-900/80 backdrop-blur-xl border border-red-500/20 rounded-2xl p-6 shadow-2xl shadow-black/20">

        <header class="mb-6">
            <h2 class="text-xl font-bold text-white">
                {{ __('Delete Account') }}
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-400 max-w-2xl">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </header>

        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="rounded-xl px-5 py-2.5 font-semibold transition-all active:scale-95"
        >
            {{ __('Delete Account') }}
        </x-danger-button>

    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-slate-900 text-white">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-white">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-3 text-sm leading-6 text-slate-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">

                <x-input-label
                    for="password"
                    value="{{ __('Password') }}"
                    class="sr-only"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full md:w-3/4 rounded-xl border border-slate-700 bg-slate-800/70 text-white placeholder-slate-500 focus:border-red-500 focus:ring-0"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />

            </div>

            <div class="mt-8 flex justify-end gap-3">

                <x-secondary-button
                    x-on:click="$dispatch('close')"
                    class="rounded-xl border border-slate-700 bg-slate-800 text-slate-300 hover:bg-slate-700 transition-all"
                >
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button
                    class="rounded-xl px-5 py-2.5 font-semibold transition-all active:scale-95"
                >
                    {{ __('Delete Account') }}
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>

