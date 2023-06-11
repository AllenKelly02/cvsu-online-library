<div class="header-container">
    <div class="w-full z-50 border-b border-green-800 bg-green-200">
        <div class="navbar flex sticky justify-between items-center container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                                <img class="w-16 h-16" src="{{ asset('img/logo.png') }}" alt="">
                                <div class="flex flex-col">
                                    <p class="castoro text-sm font-bold text-black">CAVITE STATE UNIVERSITY</p>
                                    <p class="castoro text-xs font-medium text-black">BACOOR CITY CAMPUS</p>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('user.catalog') }}" class="flex items-center space-x-2">
                                <img class="w-16 h-16" src="{{ asset('img/logo.png') }}" alt="">
                                <div class="flex flex-col">
                                    <p class="castoro text-sm font-bold text-black">CAVITE STATE UNIVERSITY</p>
                                    <p class="castoro text-xs font-medium text-black">BACOOR CITY CAMPUS</p>
                                </div>
                            </a>
                        @endif
                    @endauth

                    @guest
                        <a href="/" class="flex items-center space-x-2">
                            <img class="w-16 h-16" src="{{ asset('img/logo.png') }}" alt="">
                            <div class="flex flex-col">
                                <p class="castoro text-sm font-bold text-black">CAVITE STATE UNIVERSITY</p>
                                <p class="castoro text-xs font-medium text-black">BACOOR CITY CAMPUS</p>
                            </div>
                        </a>
                    @endguest
                </div>
            </div>

            <div class="flex space-x-2 justify-center">
                @auth
                    <form class="sm:inline-block hidden">
                        <label for="default-search" class="mb-2 -ml-10 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" id="default-search" class="block w-full sm:w-64 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 " placeholder="Search title of books, authors" required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        </div>
                    </form>

                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="avatar ml-10 hover:border-black">
                            <div class="w-12 rounded-full">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </label>

                        <ul tabindex="1"
                            class="text-black menu menu-compact dropdown-content mt-3 p-2 shadow bg-emerald-100 rounded-box w-52 hover:bg-white">
                            <a href="{{route('profile.show', ['id' => Auth::user()->id])}}">Profile</a>

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
                            class="text-sm text-white py-2 px-4 rounded bg-green-600 border-green-500 hover:bg-green-800">
                            LOGIN
                        </a>

                        <a href="{{ route('register') }}"
                            class="text-sm text-white py-2 px-4 rounded bg-green-600 border-green-500 hover:bg-green-800">
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
