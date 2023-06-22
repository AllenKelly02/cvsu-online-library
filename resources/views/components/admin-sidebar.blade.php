
	<!-- Component Start -->
    <div class="wrapper">
    <div class="sidebar">
	<div class="flex flex-col items-center w-60 h-full overflow-hidden sticky border-r border-green-800 text-gray-700 bg-white" >
		<div class="flex flex-row justify-between">
		<img class="object-center w-10 ml-30 py-3" src="{{ asset('img/logo.png') }}" alt="logo">
		<br>
        <a href="{{ route('user.catalog') }}" class="flex items-center w-full px-3 mt-3">
			<span class="ml-2 text-sm font-bold">CvSU Library</span>
		</a>
        <div class="close-btn ml-12 mt-4">X</div>
        </div>
		<div class="w-full px-2">
			<div class="flex flex-col items-center w-full mt-3 border-t border-green-800">
				<a  href="{{ route('admin.dashboard') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-green-600 hover:text-white">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/dashboard.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Dashboard</span>
				</a>
				<a id="openBooks" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-green-600 hover:text-white cursor-pointer">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/top.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Books</span>
				</a>
				<div id="bookLinks" class="w-full hidden flex flex-col space-y-2 px-6">
					<a href="{{ route('admin.books.index') }}" class="text-base px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white">All Books</a>
					<a href="{{ route('admin.books.create') }}" class="text-base px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white">Add New</a>
					<a href="{{route('admin.getAllBorrowedBooks')}}" class="text-base px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white">Borrowed Books</a>
				</div>
				<a href="{{ route('admin.verified-accounts') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-green-600 hover:text-white">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/verified.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Verified Accounts</span>
				</a>
				<a href="{{ route('admin.unverified-accounts') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-green-600 hover:text-white">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/unverified.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Unverified Accounts</span>
				</a>
			</div>
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
 <script>
	openBookLink();
	function openBookLink() {
		const openBtn = document.getElementById('openBooks');
		const links = document.getElementById('bookLinks');

		openBtn.addEventListener('click', () => {
			if(links.classList.contains('hidden')) {
				links.classList.remove('hidden');
			} else {
				links.classList.add('hidden');
			}
		})
	}


    const wrapper = document.querySelector('.wrapper');
    const toggleBtn = document.querySelector('.toggle-btn');
    const closeBtn = document.querySelector('.close-btn');

    toggleBtn.addEventListener('click', function() {
      wrapper.classList.toggle('hide-sidebar');
    });

    closeBtn.addEventListener('click', function() {
      wrapper.classList.add('hide-sidebar');
    });

	// Event listener for window resize
	window.addEventListener('resize', function() {
	const sidebar = document.querySelector('.sidebar');
	const screenWidth = window.innerWidth;

	// If the screen size is smaller than a certain breakpoint, hide the sidebar
	if (screenWidth < 1000) {
	sidebar.classList.add('hidden');
	} else {
	sidebar.classList.remove('hidden');
	}
	});
  </script>



{{-- <body class="flex items-center justify-center w-screen h-screen p-10 space-x-6 bg-gray-300">

	<!-- Component Start -->
    <div class="wrapper">
    <div class="sidebar">
	<div class="flex flex-col items-center w-60 h-full overflow-hidden text-gray-700 bg-gray-100 rounded" >
		<div class="flex flex-row justify-between">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center w-full px-3 mt-3" href="#">
			<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				<path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
			</svg>
			<span class="ml-2 text-sm font-bold">The App</span>
		</a>
        <div class="close-btn ml-12 mt-4">X</div>
        </div>
		<div class="w-full px-2">
			<div class="flex flex-col items-center w-full mt-3 border-t border-gray-300">
				<a  href="{{ route('admin.dashboard') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="#">
					<svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
					</svg>
					<span class="ml-2 text-sm font-medium">Dasboard</span>
				</a>
				<a href="{{ route('admin.books') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="#">
					<svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7  0 11-14 0 7 7 0 0114 0z" />
					</svg>
					<span class="ml-2 text-sm font-medium">Books</span>
				</a>
				<a href="{{ route('admin.verified-accounts') }}" class="flex items-center w-full h-12 px-3 mt-2 bg-gray-300 rounded" href="#">
					<svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
					</svg>
					<span class="ml-2 text-sm font-medium">Verified Accounts</span>
				</a>
				<a href="{{ route('admin.unverified-accounts') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="#">
					<svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
					</svg>
					<span class="ml-2 text-sm font-medium">Unverified Accounts</span>
				</a>
			</div>
			<div class="flex flex-col items-center w-full mt-2 border-t border-gray-300">
				<a class="relative flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="#">
					<svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
					</svg>
					<span class="ml-2 text-sm font-medium">Messages</span>
					<span class="absolute top-0 left-0 w-2 h-2 mt-2 ml-2 bg-indigo-500 rounded-full"></span>
				</a>
			</div>
		</div>
	</div>
</div>
    <div class="content">
      <button class="toggle-btn mt-20">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
</div>
	<!-- Component End  -->
</body>
 <script>
    const wrapper = document.querySelector('.wrapper');
    const toggleBtn = document.querySelector('.toggle-btn');
    const closeBtn = document.querySelector('.close-btn');

    toggleBtn.addEventListener('click', function() {
      wrapper.classList.toggle('hide-sidebar');
    });

    closeBtn.addEventListener('click', function() {
      wrapper.classList.add('hide-sidebar');
    });
  </script> --}}
