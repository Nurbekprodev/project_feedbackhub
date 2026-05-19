<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800/60 rounded-2xl p-8 shadow-2xl shadow-black/20">

            <div class="mb-6">

                <h1 class="text-3xl font-extrabold text-white">
                    Verify Your Email
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>

            </div>

            @if (session('status') == 'verification-link-sent')

                <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 p-4">

                    <p class="text-sm font-medium text-green-400 leading-6">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>

                </div>

            @endif

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>

                        <x-primary-button
                            class="w-full justify-center rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-3 font-semibold text-white transition-all active:scale-[0.98]"
                        >
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>

                    </div>

                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="text-sm font-medium text-slate-400 hover:text-white transition underline underline-offset-4"
                    >
                        {{ __('Log Out') }}
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-guest-layout>