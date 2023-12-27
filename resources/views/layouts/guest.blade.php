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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">


    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="relative">

        <x-header />
        <div class="w-full min-h-screen">
            <main class="w-full min-h-full bg-bgmain">
                {{ $slot }}
            </main>
        </div>


        {{-- @if (Auth::user() == null)
            <div class="fixed bottom-12 right-12 z-10 flex flex-col gap-p-2 mb-5" x-data="{ toggle: true }">

                <form method="post" action="{{ route('message') }}"
                    class="bg-bgmain rounded-lg h-96 w-64 top-0 shadow-lg flex flex-col space-y-5 p-2" x-show="toggle"
                    x-transition.duration.700ms x-cloak @click.outside="toggle = false">
                    <h1 class="font-bold text-lg text-center text-black">Message</h1>
                    @csrf
                    @if (Session::has('message'))
                        <div class="alert alert-success shadow-lg">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ Session::get('message') }}</span>
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-col gap-2">
                        <label for="" class="text-xs text-gray-500">Email</label>
                        <input type="email" name="email" placeholder="Enter Email"
                            class="input input-accent input-sm w-full max-w-xs bg-white" />

                        @if ($errors->has('email'))
                            <p class="text-xs text-error">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="" class="text-xs text-gray-500">Message</label>
                        <textarea class="textarea textarea-accent bg-white h-32" name="content" placeholder="Message"></textarea>
                        @if ($errors->has('content'))
                        <p class="text-xs text-error">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <button class="btn btn-accent btn-xs">Send</button>

                </form>
                <div class="flex justify-end">
                    <button class="bg-blue-500
             text-4xl px-2 pt-2 rounded-lg text-white" id="anchor"
                        @click="toggle = !toggle">
                        <i class="fi fi-rr-comment-alt"></i>
                    </button>
                </div>

            </div>
        @endif --}}
        <div class="inline-block h-8 w-8 animate-[spinner-grow_0.75s_linear_infinite] rounded-full bg-current align-[-0.125em] text-primary opacity-0 motion-reduce:animate-[spinner-grow_1.5s_linear_infinite]"
            role="status">
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
        <div class="inline-block h-8 w-8 animate-[spinner-grow_0.75s_linear_infinite] rounded-full bg-current align-[-0.125em] text-secondary opacity-0 motion-reduce:animate-[spinner-grow_1.5s_linear_infinite]"
            role="status">
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
        <div class="inline-block h-8 w-8 animate-[spinner-grow_0.75s_linear_infinite] rounded-full bg-current align-[-0.125em] text-warning opacity-0 motion-reduce:animate-[spinner-grow_1.5s_linear_infinite]"
            role="status">
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
        @if (Auth::user() == null)
            <div class="fixed bottom-12 right-12 z-10 flex flex-col gap-p-2" x-data="{ toggle: true }">

                <form method="post" action="{{ route('message') }}"
                    class="bg-bgmain rounded-lg h-96 w-64 top-0 shadow-lg flex flex-col space-y-5 p-2" x-show="toggle"
                    x-transition.duration.700ms x-cloak @click.outside="toggle = false">
                    <h1 class="font-bold text-lg text-center text-black">Message</h1>
                    @csrf
                    @if (Session::has('message'))
                        <div class="alert alert-success shadow-lg">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ Session::get('message') }}</span>
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-col gap-3">
                        <label for="email" class="text-xs text-black">Email</label>
                        <input type="email" id="email" name="email"
                            class="input input-accent  text-gray input-sm w-full max-w-xs bg-white"
                            placeholder="Enter your email" value="{{ old('email') }}" />
                        @if ($errors->has('email'))
                            <p class="text-xs text-error">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="content" class="text-xs text-black">Message</label>
                        <textarea id="content" class="textarea textarea-accent bg-white h-32" name="content" placeholder="Enter your message">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <p class="text-xs text-error">{{ $errors->first('content') }}</p>
                        @endif
                    </div>

                    <button
                        class="buttonh text-sm text-black font-semibold py-1 px-4 rounded bg-yellowmain hover:bg-yellowmain hover:text-black">Send</button>

                </form>
                <div class="flex justify-end">
                    <button
                        class="text-5xl text-black font-semibold pt-1 px-1 rounded hover:bg-bluemain hover:text-white"
                        id="anchor" @click="toggle = !toggle">
                        <i class="fi fi-rr-comment-alt"></i>
                    </button>
                </div>
            </div>
        @endif


    </div>


    {{-- floating ui --}}
    <script src="https://cdn.jsdelivr.net/npm/@floating-ui/core@1.5.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.5.3"></script>

</body>
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></script>
<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')
</style>

</html>
