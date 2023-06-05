<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
    
        <div class="min-h-screen">

            <x-header/>

            <!-- Page Content -->
            <div class="w-full h-full min-h-screen sm:flex container md:pt-20 bg-gradient-to-b from-green-200 to-emerald-400">
            {{-- <div class="relative sm:flex min-h-screen w-full h-full flex container md:pt-20 bg-no-repeat bg-cover" style="background-image:url('../img/cover.svg');"> --}}
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <x-admin-sidebar/>
                @else
                    <x-user-sidebar/>
                @endif

                <div class="w-4/5">
                    <main class="w-full">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
        <x-footer/>
        @stack('js')
    </body>


    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>
</html>
