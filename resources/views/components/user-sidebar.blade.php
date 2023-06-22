<body class="flex items-center justify-center w-screen h-screen p-10 space-x-6 bg-gray-300">

	<!-- Component Start -->
    <div class="wrapper">
    <div class="sidebar">
	<div class="flex flex-col items-center w-60 h-full overflow-hidden border-r border-green-800 text-gray-700 bg-green-50 rounded" >
		<div class="flex flex-row justify-between">
        <a href="{{ route('user.catalog') }}" class="flex items-center w-full px-3 mt-3">
			<span class="ml-2 text-sm font-bold">CvSU Library</span>
		</a>
        <div class="close-btn ml-12 mt-4 text-gray-700">✕</div>
        </div>
		<div class="w-full px-2">
			<div class="flex flex-col items-center w-full mt-3 border-t border-green-800">
				<a  href="{{ route('user.catalog') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-100">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/catalog.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Catalog</span>
				</a>
				<a href="{{ route('user.top-collect') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-100">
				<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/top.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Top Collection</span>
				</a>
				<a href="{{ route('user.new-collections') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-100">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/new.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">New Collection</span>
				</a>
				<a href="{{ route('user.about-us') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-100">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/info.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">About Us</span>
				</a>
                <a href="{{ route('user.ask-librarian') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-100">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/ask.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Ask a Librarian</span>
				</a>
                <a href="{{ route('user.borrow-history') }}" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-100">
					<img class="object-center w-6 ml-30 py-3" src="{{ asset('img/history-line.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Borrowed History</span>
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
	if (screenWidth <0) {
		sidebar.classList.add('hidden');
	} else {
		sidebar.classList.remove('hidden');
	}
	});
  </script>
