<x-guest-layout>
    <section
        class="full-screen w-full sm:flex md:flex justify-center items-center sm:w-full bg-gradient-to-b from-green-200 to-emerald-400 pt-58 body-font bg-bottom bg-no-repeat bg-white" style="background-image: url('../img/wave.svg');">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <div class="flex justify-center items-center mt-12 -scroll-mb-28">
            <form method="POST" action="{{ route('login') }}" class="max-w-md w-full">
                @csrf
                <div class="p-10 border-[1px] -mt-10  bg-no-repeat border-green-800 rounded-3xl shadow-xl flex flex-col items-center space-y-3" style="background-image: url('../img/blob-scene-haikei.svg');">
                    <div>
                        <img class="w-22 h-20 mb-5" src="{{ asset('img/logo.png') }}" />
                    </div>
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">LOGIN</h1>
                        <p class="mb-5">Enter your information to login</p>
                    </div>
                    {{-- Email Address --}}
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="mdi mdi-email-outline text-black text-lg"></i>
                        </div>
                        <input type="mail" id="email" name="email" :value="old('Email')" required
                            autocomplete="email"
                            class="w-72 -ml-10 pl-10 pr-3 py-2 bg-white text-black rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                            placeholder="Email">
                    </div>
                    {{-- Password --}}
                    <div class="flex">
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                autocomplete="current-password"
                                class="w-72 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
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
                        <a href="{{ route('register') }}"
                            class="w-full border-green-600 hover:border-green-800 hover:bg-green-800 hover:text-white hover:border-[2px] border-[1px] rounded-3xl p-3 text-center text-green-800 font-bold transition duration-200">Register</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- OFFICIAL WEBSITE OF CAVITE STATE UNIVERSITY - BACOOR CAMPUS -->
        <div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
            <div>
                <a title="Facebook of CVSU-BACOOR" href="https://cvsu.edu.ph/bacoor/" target="_blank"
                    class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                    <img class="object-cover object-center w-full h-full rounded-full"
                        src="{{ asset('img/logo.png') }}" />
                </a>
            </div>
        </div>

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
