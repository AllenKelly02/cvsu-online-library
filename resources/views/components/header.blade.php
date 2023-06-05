<div class="header-container">
    <div class="w-full z-50 border-b border-green-800 bg-green-200">
        <div class="navbar flex sticky justify-between items-center container mx-auto md:px-22 lg:px-28 ">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">

                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                                <img class="w-16 h-16" src="{{ asset('img/logo.png') }}" alt="">
                                <div class="flex flex-col">
                                    <p class="castoro text-sm font-bold">CAVITE STATE UNIVERSITY</p>
                                    <p class="castoro text-xs font-medium">BACOOR CITY CAMPUS</p>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-2">
                                <img class="w-16 h-16" src="{{ asset('img/logo.png') }}" alt="">
                                <div class="flex flex-col">
                                    <p class="castoro text-sm font-bold">CAVITE STATE UNIVERSITY</p>
                                    <p class="castoro text-xs font-medium">BACOOR CITY CAMPUS</p>
                                </div>
                            </a>
                        @endif

                    @endauth

                    @if (!Auth::user())
                        <a href="/" class="flex items-center space-x-2">
                            <img class="w-16 h-16" src="{{ asset('img/logo.png') }}" alt="">
                            <div class="flex flex-col">
                                <p class="castoro text-sm font-bold">CAVITE STATE UNIVERSITY</p>
                                <p class="castoro text-xs font-medium">BACOOR CITY CAMPUS</p>
                            </div>
                        </a>
                    @endif

                </div>
            </div>

            <div class="flex space-x-2">
                @auth
                {{-- Search bar --}}
                    {{-- <div class="mr-20">
                        <input class="rounded-full w-100" type="text" placeholder="Search for books, authors..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button> 
                    </div> --}}

                    <form>   
                        <label for="default-search" class="mb-2 -ml-10 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="search" id="default-search" class="block w-96 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Search title of books, authors" required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                        </div>
                    </form>

                    <div class="dropdown dropdown-end">
                        {{-- Avatar/Profile --}}
                        <label tabindex="0" class="avatar ml-10 hover:border-black">
                            <div class="w-12 rounded-full">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </label>

                        <ul tabindex="1"
                            class="text-black menu menu-compact dropdown-content mt-3 p-2 shadow bg-emerald-100 rounded-box w-52 hover:bg-white">
                            <a href="/profile/index"> Profile</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="text-black menu menu-compact dropdown-content mt-3 p-2 shadow bg-emerald-100 rounded-box w-52 hover:bg-white">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </ul>
                    </div>
                @else
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('login') }}"
                            class="text-sm text-white py-2 px-4 rounded bg-green5 border-green5-500 hover:bg-green3">
                            LOGIN
                        </a>

                        <a href="{{ route('register') }}"
                            class="text-sm text-green5 py-2 px-4 rounded border border-green5 hover:bg-green5 hover:text-white">
                            REGISTER
                        </a>
                    </div>

                @endauth
            </div>
        </div>
    </div>
</div>

{{-- <script>
var prevScrollPos = window.pageYOffset;

window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;

  if (prevScrollPos > currentScrollPos) {
    document.querySelector('.header-container').classList.remove('hidden');
  } else {
    document.querySelector('.header-container').classList.add('hidden');
  }

  prevScrollPos = currentScrollPos;
};
</script> --}}
