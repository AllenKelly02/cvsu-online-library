<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24 bg-bgmain">

        @if (Session::has('message'))
            <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                    {{ Session::get('message') }}</p>
            </div>
        @endif
                <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Catalog</h1>
                <div class="h-1 w-20 bg-bluemain rounded mt-2"></div>
            </div>
        </div>

        <div class="w-full flex items-center justify-end px-4 py-3 border-b border-black mb-5">
            <form action="" class="w-full">
                <div class="w-full flex justify-end space-x-3 ">
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2" placeholder="Type here..">
                    <button type="buttonh"
                        class="px-4 py-2 rounded bg-yellowmain hover:bg-yellow-500 text-black">Search</button>
                </div>
            </form>
        </div>

<!-- Filter Category -->
<div class="relative flex flex-wrap ml-1 -m-4 py-5 gap-2">
    <button class="button-name text-black bg-yellowmain hover:bg-yellowmain focus:ring-4 focus:ring-yellowmain font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" data-dropdown-toggle="dropdown">Filter by Category <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

    <!-- Dropdown menu -->
    <div class="hidden bg-white text-base list-none divide-y divide-gray-100 rounded shadow my-4 overflow-y-auto max-h-48 w-32 z-20" id="dropdown">
        <ul class="py-1" aria-labelledby="dropdown">
        <li>
            <a href="{{ route('user.catalog') }}" class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100">
                All
            </a>
        </li>
        <li>
            @foreach ($categories as $category)
                <a href="{{ route('user.catalog') . '?category=' . $category->name }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100">
                    {{ $category->name }}
                </a>
            @endforeach
        </li>
        </ul>
    </div>
    {{-- <button class="button-name text-black bg-yellowmain hover:bg-yellowmain focus:ring-4 focus:ring-yellowmain font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" data-dropdown-toggle="typedropdown">Filter by Type <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<!-- Dropdown menu -->
<div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4 overflow-y-auto max-h-48 w-32" id="typedropdown">
    <ul class="py-1" aria-labelledby="typedropdown">
        <li>
            <a href="{{ route('user.catalog') }}" class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100">
                All
            </a>
        </li>
        @foreach ($books as $book)
        <li>
            <a href="{{ route('user.catalog') . '?type=book' }}" class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100 {{ request()->query('type') === 'book' ? 'bg-gray text-black' : '' }}">
                {{ $book->type }}
            </a>
        </li>
        @endforeach
    </ul>
</div>

    <button class="button-name text-black bg-yellowmain hover:bg-yellowmain focus:ring-4 focus:ring-yellowmain font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" data-dropdown-toggle="typedropdown">Filter by Category <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

    <!-- Dropdown menu -->
    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4 overflow-y-auto max-h-48 w-32" id="typedropdown">
        <ul class="py-1" aria-labelledby="typedropdown">
        <li>
            <a href="{{ route('user.catalog') }}" class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100">
                All
            </a>
        </li>
        <li>
            <a href="{{ route('user.catalog') . '?type=book' }}" class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100 {{ request()->query('category') === 'book' ? 'bg-yellowmain text-black' : '' }}">
                Book
            </a>
            <a href="{{ route('admin.books.index') }}?category=book"
            class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('category') === 'book' ? 'bg-yellowmain text-black' : '' }}">Book</a>
        </li>

        </ul>
    </div> --}}
    </div>
            <div class="flex flex-wrap -m-4 py-5">
            @forelse ($books as $book)
            <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-white shadow-2xl p-4 rounded-lg h-full">
                        <div class="flex gap-2">
                            <div class="grow">
                                <h1
                                    class="bg-white border-2 border-bluemain rounded-xl drop-shadow-lg w-32 z-10 flex justify-center text-sm py-1 px-3 text-black capitalize">
                                    {{ $book->type }}
                                </h1>
                            </div>
                        </div>
                        @if ($book->image !== null)
                            <img class="w-full object-cover object-center py-6 rounded"
                            style="height: 400px; width: 100%;"
                                src="{{ route('image-view', ['name' => $book->image]) }}" alt="content">
                        @else
                            <img class="w-full object-cover object-center py-6 rounded"
                            style="height: 400px; width: 100%;"
                                src="{{ asset('img/b1.jpg') }}" alt="content">
                        @endif
                        @if ($book->status === 'available')
                            <span
                                class="capitalize inline-flex items-center mb-2 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                {{ $book->status }}
                            </span>
                        @else
                            <span
                                class="capitalize inline-flex items-center mb-2 bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                {{ $book->status }}
                            </span>
                        @endif
                        <h2 class="truncate text-lg text-gray-900 font-medium title-font m-1">{{ $book->title }}</h2>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Author:</b> {{ $book->author }}
                        </h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>ISBN:</b> {{ $book->ISBN }}
                        </h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Published Year:</b>
                            {{ $book->published_year }}</h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Call Number:</b>
                            {{ $book->call_number }}</h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Publisher:</b>
                            {{ $book->publisher }}</h3>
                        <a href="{{ route('user.books.show', ['book' => $book]) }}"
                            class="buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out">
                            <b>Details</b>
                        </a>
                    </div>
                </div>
            @empty
                @if (count($books) == 0)
                    <div class="alert alert-warning mt-28">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>No Books Available</span>
                        <a class="text-xm text-black underline" href="/admin/books">Refresh</a>
                    </div>
                @endif
            @endforelse
        </div>
    </div>

    <script>
        document.getElementById('categoryDropdownButton').addEventListener('click', function() {
            document.getElementById('categoryDropdown').classList.toggle('hidden');
        });

        // Close the dropdown when clicking outside of it
        window.addEventListener('click', function(event) {
            if (!event.target.matches('#categoryDropdownButton')) {
                var dropdown = document.getElementById('categoryDropdown');
                if (dropdown.classList.contains('hidden') === false) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    </script>
    <script>
        document.getElementById('typeDropdownButton').addEventListener('click', function() {
            document.getElementById('typeDropdown').classList.toggle('hidden');
        });

        // Close the dropdown when clicking outside of it
        window.addEventListener('click', function(event) {
            if (!event.target.matches('#typeDropdownButton')) {
                var dropdown = document.getElementById('typeDropdown');
                if (dropdown.classList.contains('hidden') === false) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    </script>
    <script>
        // Remove the alert message after seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert-success').remove();
        }, 3000);
    </script>

    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
</x-app-layout>
