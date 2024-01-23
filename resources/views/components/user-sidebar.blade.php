<body class="flex items-center justify-center w-screen h-screen p-10 space-x-6 bg-green-50">

    <!-- Component Start -->
    <div class="wrapper">
        <div class="sidebar">
            <div class="flex flex-col items-center w-60 h-full overflow-hidden sticky shadow-2xl text-gray-700 bg-blue-50 rounded">
                <div class="flex flex-row justify-between md:py-6 p-2 space-x-4 mt-20 md:mt-0">
                    {{-- For Localhost Profile --}}
                    {{-- <img src="{{ Auth::user()->profile->avatar ?? 'https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg' }}" class="w-12 h-12 rounded-full shadow-lg"> --}}

                    {{-- For Deployment Profile --}}
                    <img src="{{ Auth::user()->profile->avatar ? route('avatar-profile', ['name' => Auth::user()->profile->avatar]) : 'https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg' }}" class="w-12 h-12 rounded-full shadow-lg">
                    <div>
                        <h2 class="text-lg font-semibold">Hello! {{ Auth::user()->profile->first_name }}</h2>
                        <span class="flex items-center space-x-1">
                            <a rel="noopener noreferrer" href="{{route('profile.show', ['id' => Auth::user()->id])}}" class="text-xs hover:underline text-gray-400">View profile</a>
                        </span>
                    </div>

                    <div class="close-btn ml-12 mt-4 text-gray-700">X</div>

                </div>

                <div class="divide-y">
                <ul class="pt-2 pb-4 space-y-1 text-sm">
                    <li>
                        <a rel="noopener noreferrer" href="{{ route('user.catalog') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white cursor-pointer {{ request()->routeIs('user.catalog') ? 'bg-blue2 text-white' : '' }}">
                            <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/catalog.png') }}" alt="content">
                            <span class="ml-2 text-sm font-medium">Catalog</span>
                        </a>
                    </li>
                    <li>
                        <a rel="noopener noreferrer" href="{{ route('user.top-collect') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white cursor-pointer {{ request()->routeIs('user.top-collect') ? 'bg-blue2 text-white' : '' }}">
                            <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/top.png') }}" alt="content">
                            <span class="ml-2 text-sm font-medium">Top Collection</span>
                        </a>
                    </li>
                    <li>
                        <a rel="noopener noreferrer" href="{{ route('user.new-collections') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white cursor-pointer {{ request()->routeIs('user.new-collections') ? 'bg-blue2 text-white' : '' }}">

                            <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/new.png') }}" alt="content">
                            <span class="ml-2 text-sm font-medium">New Acquisition</span>
                        </a>
                        </a>
                    </li>
                    <li>
                        <a rel="noopener noreferrer" href="{{ route('user.borrow-history') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white cursor-pointer {{ request()->routeIs('user.borrow-history') ? 'bg-blue2 text-white' : '' }}">
                            <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/history-line.png') }}" alt="content">
                            <span class="ml-2 text-sm font-medium">Borrowed History</span>
                        </a>
                        </a>
                    </li>
                </ul>
                <ul class="pt-4 pb-2 space-y-1 text-sm">
                    <li>
                        <a rel="noopener noreferrer" href="{{ route('user.about-us') }}"  class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white cursor-pointer {{ request()->routeIs('user.about-us') ? 'bg-blue2 text-white' : '' }}">
                            <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/info.png') }}" alt="content">
                            <span class="ml-2 text-sm font-medium">About Us</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <a rel="noopener noreferrer" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"  class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white">
                            <img class="object-center w-8 h-14 ml-30 py-3" src="{{ asset('img/logout.png') }}" alt="content">
                            <span class="ml-2 text-sm font-medium">{{ __('Log Out') }}</span>
                        </a>
                        </form>

                    </li>
                </ul>
            </div>
            </div>

            <!--sidebar button-->
        </div>
        <div class="content">
            <button class="toggle-btn mt-20">
                <img class="object-center w-6 ml-45 mt-1" src="{{ asset('img/menu.png') }}" alt="content">
            </button>
        </div>
    </div>
    <!-- Component End  -->

</body>


<script src="https://cdn.tailwindcss.com"></script>
<script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    const wrapper = document.querySelector('.wrapper');
    const toggleBtn = document.querySelector('.toggle-btn');
    const closeBtn = document.querySelector('.close-btn');

    toggleBtn.addEventListener('click', function() {
        console.log('click toggle')
        wrapper.classList.remove('hide-sidebar');
    });

    closeBtn.addEventListener('click', function() {
        wrapper.classList.add('hide-sidebar');
    });

    // Event listener for window resize
    window.addEventListener('resize', function() {
        const sidebar = document.querySelector('.sidebar');
        const screenWidth = window.innerWidth;

        // If the screen size is smaller than a certain breakpoint, hide the sidebar
        if (window.innerWidth <= 480) {
            wrapper.classList.add('hide-sidebar');
        } //else {
        //     sidebar.classList.remove('hidden');
        // }
    });
</script>
