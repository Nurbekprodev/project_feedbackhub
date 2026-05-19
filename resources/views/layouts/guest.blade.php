<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="font-sans antialiased bg-[#0b1120] text-white">

        <div class="relative min-h-screen overflow-hidden">

            <!-- Background Glow -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">

                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-indigo-500/10 blur-3xl rounded-full"></div>

                <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-500/10 blur-3xl rounded-full"></div>

            </div>

            <!-- Content -->
            <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 py-10">

                <!-- Logo -->
                <div class="mb-8">

                    <a href="/" class="flex items-center justify-center">

                        <div class="flex items-center justify-center w-20 h-20 rounded-3xl bg-slate-900/80 border border-slate-800/60 backdrop-blur-xl shadow-2xl shadow-black/20">

                            <x-application-logo class="w-10 h-10 fill-current text-white" />

                        </div>

                    </a>

                </div>

                <!-- Auth Card -->
                <div class="w-full sm:max-w-md">
                    {{ $slot }}
                </div>

            </div>

        </div>

    </body>
</html>