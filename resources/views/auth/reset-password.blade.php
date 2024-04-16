<x-guest-layout>
    {{-- <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form> --}}
    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 ">
            <div class="w-full p-6 bg-white border-[1px] border-gray-800 rounded-3xl shadow-2xl md:mt-0 sm:max-w-md sm:p-8 text-gray-800 overflow-hidden bg-no-repeat"
            style="background-image: url('../img/blob-scene-haikei (6).svg'); max-width:500px">
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                        <div class="card-header"> <a class="cta" href="{{ route('login') }}">
                            <span class="black">Go To Login</span>
                        </a></div>
                        <div class="card-body">

                            <form action="{{ route('password.store') }}" method="POST">
                                @csrf

                                 <!-- Password Reset Token -->
                                 <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group row">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <div class="col-md-6">
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                            @if ($errors->has('email'))
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            @endif
                                    </div>
                                </div>

                                 <!-- Password -->
                                <div class="form-group row">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <div class="col-md-6">
                                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                        @if ($errors->has('password'))
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        @endif
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group row">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <div class="col-md-6">
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        @if ($errors->has('password_confirmation'))
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4 py-2">
                                    <x-primary-button>
                                        {{ __('Reset Password') }}
                                    </x-primary-button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
      </main>
    </div>
</div>
</section>
</x-guest-layout>
