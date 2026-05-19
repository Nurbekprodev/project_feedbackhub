<x-app-layout>

<div class="min-h-screen bg-[#0b1120]">

    <div class="max-w-5xl mx-auto px-4 py-10 space-y-6">

        <!-- Header -->
        <div>

            <h1 class="text-3xl font-extrabold text-white">
                Profile Settings
            </h1>

            <p class="text-slate-400 mt-2">
                Manage your account settings and security
            </p>

        </div>

        <!-- Profile Information -->
        <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800/60 rounded-3xl p-6 md:p-8 shadow-2xl shadow-black/20">

            <div class="max-w-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>

        </div>

        <!-- Password -->
        <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800/60 rounded-3xl p-6 md:p-8 shadow-2xl shadow-black/20">

            <div class="max-w-2xl">
                @include('profile.partials.update-password-form')
            </div>

        </div>

        <!-- Delete Account -->
        <div class="bg-red-500/5 border border-red-500/20 rounded-3xl p-6 md:p-8 shadow-2xl shadow-black/20">

            <div class="max-w-2xl">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

</div>

</x-app-layout>