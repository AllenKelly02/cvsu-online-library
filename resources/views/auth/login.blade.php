<x-guest-layout>
    <section
        class="full-screen w-full sm:flex md:flex justify-center items-center sm:w-full bg-gradient-to-b from-green-200 to-emerald-400 p-12 body-font bg-bottom bg-no-repeat bg-white"
        style="background-image: url('../img/wave (9).svg');">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @if (Session::has('message'))
            <p class="alert alert-success mt-32">{{ Session::get('message') }}</p>
        @endif

        <div class="flex justify-center items-center mt-24 -scroll-mb-28">
            <form method="POST" action="{{ route('login') }}" class="max-w-md w-full">
                @csrf
                <div class="p-10 border-[1px] -mt-10  bg-no-repeat border-green-800 rounded-3xl shadow-xl flex flex-col items-center space-y-3"
                    style="background-image: url('../img/blob-scene-haikei.svg');">
                    <div>
                        <a href="/"><img class="w-22 h-20 mb-5" src="{{ asset('img/logo.png') }}" /></a>
                    </div>
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">LOGIN</h1>
                        <p class="mb-5">Enter your information to login</p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-error w-72">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @error('email')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                    {{-- Email Address --}}
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="mdi mdi-email-outline text-black text-lg"></i>
                        </div>
                        <input type="mail" id="email" name="email" :value="old('Email')" autocomplete="email"
                            class="w-72 -ml-10 pl-10 pr-3 py-2 bg-white text-black rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                            placeholder="Email">
                    </div>

                    @error('pasword')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                    {{-- Password --}}
                    <div class="flex">
                        <div class="relative">
                            <input type="password" id="password" name="password" autocomplete="current-password"
                                class="w-72 pl-10 pr-3 text-black py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                placeholder="Password">
                            <i onclick="togglePasswordVisibility('password')"
                                class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                <i id="toggle_icon" class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                            </i>
                            <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                <i class="mdi mdi-lock-outline text-black text-lg"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Forgot Password --}}
                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-900 hover:text-green-800"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    {{-- Buttons --}}
                    <div class="flex flex-col space-y-5 w-full">
                        <button
                            class="w-full bg-green-600 rounded-3xl p-3 text-center text-white font-bold transition duration-200 hover:bg-green-800">Log
                            in</button>
                        <div class="flex items-center justify-center border-t-[1px] border-t-green-800 w-full relative">
                            <div class="-mt-1 font-bod rounded bg-green-100 px-5 absolute">Or</div>
                        </div>
                        <!-- Social login buttons -->
                        <a class="mb-3 flex w-full items-center justify-center rounded-lg bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            style="background-color: #3b5998" href="#!" role="button" data-te-ripple-init
                            data-te-ripple-color="light">
                            <!-- Facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-3.5 w-3.5" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                            Continue with Facebook
                        </a>
                        <a class="mb-3 flex w-full items-center justify-center rounded-lg bg-info px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"
                            style="background-color: white" href="#!" role="button" data-te-ripple-init
                            data-te-ripple-color="light">
                            <!-- Twitter -->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                class="w-6 h-6" viewBox="0 0 48 48">
                                <defs>
                                    <path id="a"
                                        d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                                </defs>
                                <clipPath id="b">
                                    <use xlink:href="#a" overflow="visible" />
                                </clipPath>
                                <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                                <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                                <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                                <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                            </svg>
                            <span class="ml-1">Continue with Google
                        </a>
                        <a href="{{ route('register') }}"
                            class="w-full border-green-600 hover:border-green-800 hover:bg-green-800 hover:text-white hover:border-[2px] border-[1px] rounded-3xl p-3 text-center text-green-800 font-bold transition duration-200">Register</a>
                    </div>
                </div>
            </form>
            <script>
                function togglePasswordVisibility(inputId) {
                    const input = document.getElementById(inputId);
                    const icon = document.getElementById(inputId === 'password' ? 'toggle_icon' : 'toggle_icon_confirm');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('mdi-eye-off-outline');
                        icon.classList.add('mdi-eye-outline');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('mdi-eye-outline');
                        icon.classList.add('mdi-eye-off-outline');
                    }
                }
            </script>
    </section>
    <x-footer />
</x-guest-layout>
