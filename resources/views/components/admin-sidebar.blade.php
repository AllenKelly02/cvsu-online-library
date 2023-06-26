
	<!-- Component Start -->
    <div class="wrapper">
    <div class="sidebar">
	<div class="flex flex-col items-center w-60 h-full overflow-hidden sticky shadow-2xl text-gray-700 bg-blue-50 rounded" >
		<div class="flex flex-row justify-between">
		<img class="object-center w-10 ml-30 py-3" src="{{ asset('img/logo.png') }}" alt="logo">
		<br>
        <a href="{{ route('user.catalog') }}" class="flex items-center w-full px-3 mt-3">
			<span class="ml-2 text-sm font-bold">CvSU Library</span>
		</a>
        <div class="close-btn ml-12 mt-4">X</div>
        </div>
		<div class="w-full px-2">
			<div class="flex flex-col items-center w-full mt-3 border-t border-bluemain">
				<a href="{{ route('admin.dashboard') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white {{ request()->routeIs('admin.dashboard') ? 'bg-blue2 text-white' : '' }}">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/verified.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Dashboard</span>
				</a>
				<a id="openBooks" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white cursor-pointer {{ request()->routeIs('admin.books.index') ? 'bg-blue2 text-white' : '' }} {{ request()->routeIs('admin.books.create') ? 'bg-blue2 text-white' : '' }}
                    {{ request()->routeIs('admin.getAllBorrowedBooks') ? 'bg-blue2 text-white' : '' }} {{ request()->routeIs('admin.listRequestBorrowedBooks') ? 'bg-blue2 text-white' : '' }}">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/top.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Books</span>
				</a>
				<div id="bookLinks" class="w-full hidden flex flex-col space-y-2 px-6">
					<a href="{{ route('admin.books.index') }}" class="text-base px-4 py-2 rounded-lg hover:bg-blue2 hover:text-white">All Books</a>
					<a href="{{ route('admin.books.create') }}" class="text-base px-4 py-2 rounded-lg hover:bg-blue2 hover:text-white">Add New</a>
					<a href="{{route('admin.getAllBorrowedBooks')}}" class="text-base px-4 py-2 rounded-lg hover:bg-blue2 hover:text-white">Borrowed Books</a>
                    <a href="{{route('admin.listRequestBorrowedBooks')}}" class="text-base px-4 py-2 rounded-lg hover:bg-blue2 hover:text-white"> Request Borrowed Books</a>
				</div>
				<a href="{{ route('admin.verified-accounts') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white {{ request()->routeIs('admin.verified-accounts') ? 'bg-blue2 text-white' : '' }}">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/verified.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Verified Accounts</span>
				</a>
				<a href="{{ route('admin.unverified-accounts') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white {{ request()->routeIs('admin.unverified-accounts') ? 'bg-blue2 text-white' : '' }}">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/unverified.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Unverified Accounts</span>
				</a>
                <a href="{{ route('admin.books.archivedbooks') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-blue2 hover:text-white {{ request()->routeIs('admin.books.archivedbooks') ? 'bg-blue2 text-white' : '' }}">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/delete.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Archive Books</span>
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
