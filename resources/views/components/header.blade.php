<div class="w-full z-50 border-b border-gray-200 bg-white">
    <div class="navbar flex justify-between items-center container mx-auto md:px-22 lg:px-28 ">
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
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{ asset('img/icons/avatar.jpg') }}" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/profile/index">Profile</a></li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </ul>
                </div>
            @else
                <div class="flex items-center space-x-2">
                    <a href="{{ route('login') }}"
                        class="text-sm text-white py-2 px-4 rounded bg-green3 border border-green3">
                        LOGIN
                    </a>

                    <a href="{{ route('register') }}" class="text-sm text-green4 py-2 px-4 rounded border border-green4">
                        REGISTER
                    </a>
                </div>

            @endauth
        </div>
    </div>
</div>
