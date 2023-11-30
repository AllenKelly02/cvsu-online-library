<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-bgmain">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- flat icom --}}

        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>


        {{-- Venobox --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.8/venobox.css" integrity="sha512-DdJCxSEliAOOcwNXGOzXyBJIZ/K6KAv4OkrH46eBd7nOIbkOHoQPYrS6bbT53nsFWAYqE3/jNGGWH/3ELRgCnQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- quill editor  --}}

        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <style>
            [x-cloak] { display: none !important; }
        </style>


        {{-- html2pdf --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body class="font-sans antialiased bg-bgmain">

        <div>

            <x-header/>

            <!-- Page Content -->
            <div class="min-h-screen sm:flex md:pt-20 relative" >
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <x-admin-sidebar/>
                @else
                    <x-user-sidebar/>
                @endif

                <div class="w-full bg-bgmain">
                    <main class="w-full ">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
        <x-footer/>


        <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


          {{-- Venobox --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.8/venobox.min.js" integrity="sha512-RwADmV7VD+jDR+1KL6kzLn6mOXVju0tQ0BnxWgXe2MYgDbeFK+ErI9MZdhX5OshfFqAX/rS5nOdfPetPLj6Nyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script>

            let venobox = new VenoBox({
                seletor : '.venobox'
            })
        </script>

        @stack('js')
    </body>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>
</html>
