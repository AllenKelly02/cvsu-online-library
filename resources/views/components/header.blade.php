<div class="header-container">
    <div class="w-full z-50 shadow-2xl bg-bluemain">
        <div class="navbar flex justify-between items-center container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                                <img class="w-18 h-16" src="{{ asset('img/logo.png') }}" alt="">
                                <div class="flex flex-col">
                                    <p class="castoro text-sm font-bold text-white">CAVITE STATE UNIVERSITY</p>
                                    <p class="castoro text-xs font-medium text-white">BACOOR CITY CAMPUS</p>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('user.catalog') }}" class="flex items-center space-x-2">
                                <img class="w-18 h-16" src="{{ asset('img/logo.png') }}" alt="">
                                <div class="flex flex-col">
                                    <p class="castoro text-sm font-bold text-white">CAVITE STATE UNIVERSITY</p>
                                    <p class="castoro text-xs font-medium text-white">BACOOR CITY CAMPUS</p>
                                </div>
                            </a>
                        @endif
                    @endauth

                    @guest
                        <a href="/" class="flex items-center space-x-2">
                            <img class="w-18 h-16" src="{{ asset('img/logo.png') }}" alt="">
                            <div class="flex flex-col">
                                <p class="castoro text-sm font-bold text-white">CAVITE STATE UNIVERSITY</p>
                                <p class="castoro text-xs font-medium text-white">BACOOR CITY CAMPUS</p>
                            </div>
                        </a>
                    @endguest
                </div>
            </div>

            <div class="flex space-x-2 justify-center">
                @auth
                    {{-- <form class="sm:inline-block hidden">
                        <label for="default-search" class="mb-2 -ml-10 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" id="default-search" class="block w-full sm:w-64 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 " placeholder="Search title of books, authors" required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        </div>
                    </form> --}}

                    @if (Auth::user()->role === 'admin')
                        <div class="dropdown dropdown-end">
                            <label tabindex="0" class="avatar ml-10 hover:border-black">
                                <div class="w-12 rounded-full">
                                    <img src=" {{ Auth::user()->profile->avatar ?? 'https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg'}}" />
                                </div>
                            </label>

                            <ul tabindex="1"
                                class="text-black menu menu-compact dropdown-content mt-3 p-2 shadow bg-emerald-100 rounded-box w-52 hover:bg-white">
                                <a href="{{route('profile.show', ['id' => Auth::user()->id])}}">Profile</a>
                                <a href="{{route('profile.show', ['id' => Auth::user()->id])}}"> </a>

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
                        {{-- <div class="dropdown dropdown-end" tabindex="0">
                        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="/img/logo.png" alt="User dropdown">

                        <!-- Dropdown menu -->
                        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>Bonnie Green</div>
                                    <div class="font-medium truncate">name@flowbite.com</div>
                                </div>
                                <ul tabindex="1" class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                                    <li>
                                         <a href="{{route('profile.show', ['id' => Auth::user()->id])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    </ul>
                                        <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                     <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-black menu menu-compact dropdown-content mt-3 p-2 shadow bg-emerald-100 rounded-box w-52 hover:bg-white">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form></div>
                        </div>
                        </div> --}}
                        <div class="dropdown dropdown-end">
                            <label tabindex="0" class="avatar ml-10 hover:border-black">
                                <div class="w-12 rounded-full">
                                    <img src=" {{ Auth::user()->profile->avatar ?? 'https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg'}}" />

                                </div>
                            </label>

                            <ul tabindex="1"
                                class="text-black menu menu-compact dropdown-content mt-3 p-2 shadow bg-blue-100 rounded-box w-52 hover:bg-white">
                                <a href="{{route('profile.show', ['id' => Auth::user()->id])}}">Profile</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-black menu menu-compact dropdown-content mt-3 p-2 shadow bg-blue-100 rounded-box w-52 hover:bg-white">

                                        <button class="logout">

                                            <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>

                                            <div class="text">{{ __('Log Out') }}</div>
                                          </button>
                                    </x-dropdown-link>
                                </form>
                            </ul>
                        </div>
                    @endif

                @else
                    <div class="flex items-center space-x-5 hidden sm:flex">
                        <a href="{{ route('login') }}"
                            class="buttonh text-sm text-black font-semibold py-2 px-4 rounded shadow-2xl bg-yellowmain hover:bg-yellow-500">
                            LOGIN
                        </a>

                            <a href="{{ route('register') }}"
                                class="buttonh text-sm text-black font-semibold py-2 px-4 rounded bg-yellowmain hover:bg-yellow-500">
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
