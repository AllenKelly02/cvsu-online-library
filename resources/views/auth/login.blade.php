<x-guest-layout>
    <section class=" full-screen body-font bg-bottom bg-no-repeat solid-bg-bgmain"
        style="background-image: url('../img/wave (13).svg');">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="flex items-center justify-center h-screen">
                <div class="bg-white p-8 rounded-3xl shadow-lg max-w-sm w-full border-[1px] mt-10 bg-no-repeat solid-border-bgmain flex flex-col items-center space-y-6"
                style="background-image: url('../img/blob-scene-haikei (7).svg');">
                    <div class="flex justify-center">
                        <span class="inline-block">
                            <a href="/"><img class="w-22 h-20" src="{{ asset('img/logo.png') }}" /></a>
                        </span>
                    </div>
                    <h2 class="text-2xl text-black font-bold text-center">LOGIN</h2>
                    <p class="text-black text-center mb-6">Enter your information to login.</p>
                   <form method="POST" action="{{ route('login') }}" class="max-w-md w-full">
                    @csrf
                        @if ($errors->any())
                            <div class="fixed top-44 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                                <p class="alert alert-error shadow-lg rounded-box w-auto text-center animate-bounce">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach</p>
                            </div>
                        @endif
                        <div class="mb-4">
                            <label for="email" class="block text-black text-xs font-semibold px-1 mb-2">
                                Email Address <span style="color: red;">*</span>
                            </label>
                            <span class="error  text-red-700 text-xs"></span>
                            <div class="relative">
                                <input type="email" name="email" maxlength="50" minlength="5"
                                        :value="old('Email')" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                        class="w-full pl-10 pr-3 py-2 rounded-lg text-black border-2 border-blue-100 outline-none focus:border-green3"
                                        placeholder="cvsubacoor@gmail.com" required>
                                <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                    <i class="mdi mdi-email-outline text-bluemain text-lg"></i>
                                </div>
                            </div>
                        </div>
                        @if (Session::has('message'))
                            <div class="fixed top-44 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                                <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                                    {{ Session::get('message') }}</p>
                            </div>
                        @endif
                        <div class="mb-6">
                            <label for="password" class="block text-black text-xs font-semibold px-1 mb-2">
                                Password <span style="color: red;">*</span>
                            </label>
                            <span class="error  text-red-700 text-xs"></span>
                            <div class="relative">
                                <input type="password" name="password" id="password" maxlength="20"
                                    class="w-full pl-10 pr-3 py-2 rounded-lg text-black border-2 border-blue-100 outline-none focus:border-green3"
                                    placeholder="************" required>
                                <i onclick="togglePasswordVisibility('password')"
                                    class="absolute top-1/2 right-8 transform -translate-y-1/2 cursor-pointer">
                                    <i id="toggle_icon" class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                                </i>
                                <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                    <i class="mdi mdi-lock-outline text-bluemain text-lg"></i>
                                </div>
                            </div>
                        </div>
                        {{-- Forgot Password --}}
                        <div class="flex items-center justify-center my-4">
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
                    </form>
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
            <script>
                // Remove the alert message after 5 seconds (adjust the timeout value as needed)
                setTimeout(function() {
                    document.querySelector('.alert').remove();
                }, 3000);
            </script>
    </section>
    <x-footer />
</x-guest-layout>
