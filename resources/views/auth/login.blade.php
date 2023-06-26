<x-guest-layout>
    <section class=" full-screen body-font bg-bottom bg-no-repeat solid-bg-bgmain"
        style="background-image: url('../img/wave (13).svg');">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @if (Session::has('message'))
            <p class="alert alert-success shadow-lg w-96 ml-96 animate-bounce mt-32">{{ Session::get('message') }}</p>
        @endif

        <div class="flex items-center justify-center py-40 pt-36 mt-16 w-full">
            <form method="POST" action="{{ route('login') }}" class="max-w-md w-full">
                @csrf
                <div class="p-10 border-[1px] -mt-10 bg-no-repeat solid-border-bgmain rounded-3xl shadow-2xl flex flex-col items-center space-y-6"
                    style="background-image: url('../img/blob-scene-haikei (7).svg');">
                    <div>
                        <a href="/"><img class="w-22 h-20 mb-5" src="{{ asset('img/logo.png') }}" /></a>
                    </div>
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">LOGIN</h1>
                        <p class="mb-5 text-black">Enter your information to login</p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-error w-96">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- Email Address --}}
                    <div class="formGroup w-full px-5 mb-5">
                        <div class="flex space-x-2">
                            <label for="email" class="text-xs font-semibold px-1 text-black">Email Address</label>
                            <p class="text-red-500 text-center text-xs">*</p>
                            <span class="error  text-red-700 text-xs"></span>
                        </div>
                        <div class="flex">
                            <div
                                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="mdi mdi-email-outline text-bluemain text-lg"></i>
                            </div>
                            <input type="email" name="email" custommaxlength="50" minlength="5"
                                :value="old('Email')" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                class="w-80 -ml-10 pl-10 pr-3 py-2 rounded-lg text-black border-2 border-blue-100 outline-none focus:border-green3"
                                placeholder="cvsubacoor@gmail.com" required>
                            <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                <i class="ri-error-warning-fill"></i>
                            </span>
                            <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                <i class="ri-checkbox-fill"></i>
                            </span>
                        </div>
                    </div>
                    {{-- Password --}}
                    <div class="formGroup w-full px-5 mb-5">
                        <div class="flex space-x-2">
                            <label for="password" class="text-xs text-black font-semibold px-1">Password</label>
                            <p class="text-red-500 text-center text-xs">*</p>
                            <span class="error  text-red-700 text-xs"></span>
                        </div>
                        <div class="flex">
                        <div class="relative">
                            <input type="password" name="password" id="password" custommaxlength="20"
                                class=" w-80 pl-10 pr-3 py-2 rounded-lg text-black border-2 border-blue-100 outline-none focus:border-green3"
                                placeholder="************" required>
                            <i onclick="togglePasswordVisibility('password')"
                                class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                <i id="toggle_icon"
                                    class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                            </i>
                            <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                <i class="mdi mdi-lock-outline text-bluemain text-lg"></i>
                            </div>
                        </div>
                    </div>
                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                            <i class="ri-error-warning-fill"></i>
                        </span>
                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                            <i class="ri-checkbox-fill"></i>
                        </span>
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
                            class="buttonl w-full bg-yellowmain rounded-3xl p-3 text-center text-black text-lg font-bold transition duration-200 hover:bg-yellowmain">LOGIN</button>
                        <div class="flex items-center justify-center border-t-[1px] border-t-bluemain w-full relative">
                            <div class="-mt-1 font-bod rounded bg-blue-100 px-5 absolute">Or</div>
                        </div>
                        <a href="{{ route('register') }}"
                            class="button3 w-full border-yellowmain hover:border-yellowmain hover:bg-yellowmain hover:text-black hover:border-[2px] border-[1px] rounded-3xl p-3 text-center text-lg text-black font-bold transition duration-200">REGISTER</a>
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
            <script>
                // Remove the alert message after 5 seconds (adjust the timeout value as needed)
                setTimeout(function() {
                    document.querySelector('.alert').remove();
                }, 3000);
            </script>
    </section>
    <x-footer />
</x-guest-layout>
