<x-guest-layout>
    {{-- <div class="ml-40 mr-40">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            {{-- Email Address --}}
            {{-- <div class="flex">
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
    </div> --}}
<section class="">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 ">
      <div class="w-full p-6 bg-white border-[1px] border-green-800 rounded-3xl shadow md:mt-0 sm:max-w-md sm:p-8 text-gray-800 overflow-hidden bg-no-repeat"
      style="background-image: url('../img/blob-scene-haikei (6).svg'); max-width:500px">

          <h2 class="text-center mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-black">
              Change Password
          </h2>
          <form method="POST" class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('password.email') }}">
            @csrf
              <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                  <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-black sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="cvsubacoor@gmail.com" required="">
              </div>
              {{-- <div>
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                  <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
              </div>
              <div>
                  <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                  <input type="confirm-password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
              </div> --}}
              <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="newsletter" aria-describedby="newsletter" type="checkbox" class="w-4 h-4 border rounded bg-gray-50 focus:ring-3 border-green-600 focus:ring-green-600 ring-offset-green-800" required="">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="newsletter" class="font-light text-gray-500 dark:text-black">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                  </div>
              </div>
              <button type="submit" class="w-full bg-green-600 rounded-3xl p-3 text-center text-white font-bold transition duration-200 hover:bg-green3 capitalize">Reset password</button>
          </form>
      </div>
  </div>
</section>
<x-footer/>
</x-guest-layout>
