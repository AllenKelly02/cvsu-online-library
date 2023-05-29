<x-guest-layout>
    <div class="ml-40 mr-40">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            {{-- Email Address --}}
            <div class="flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i
                        class="mdi mdi-email-outline text-black text-lg"></i></div>
                <input type="mail" id="email" name="email" :value="old('email')"required autofocus
                    autocomplete="email"
                    class="w-full -ml-10 pl-10 pr-3 py-2 bg-white text-black rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                    placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a>
                    <button class="w-full border-green3 hover:border-green4 hover:border-[2px] border-[1px] rounded-3xl p-3 text-green4 font-bold transition duration-200">{{ __('Email Password Reset Link') }}</button>
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
