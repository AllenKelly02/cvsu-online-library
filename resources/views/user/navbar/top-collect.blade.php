<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24">
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Top Collection</h1>
                <div class="h-1 w-20 bg-bluemain rounded"></div>
            </div>
        </div>
        <div class="w-full flex items-center justify-end px-4 py-3 border-b border-gray-300">
            <form action="" class="w-full">
                <div class="w-full flex justify-end space-x-3 ">
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2" placeholder="Type here..">
                    <button type="submit" class="px-4 py-2 rounded bg-yellowmain hover:bg-yellow-500 text-black">Search</button>
                </div>
            </form>
        </div>
        {{-- <div class="px-1 py-2 mb-5 flex justify-center">
            <div class="flex items-center space-x-5">
                <a href="{{ route('admin.books.index') }}"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->routeIs('default') ? 'bg-yellowmain text-black' : '' }}">All</a>
                <a href="{{ route('admin.books.index') }}?category=book"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('category') === 'book' ? 'bg-yellowmain text-black' : '' }}">Book</a>
                <a href="{{ route('admin.books.index') }}??category=e-book"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('category') === 'e-book' ? 'bg-yellowmain text-black' : '' }}">E-Book</a>
                <a href="{{ route('admin.books.index') }}??category=journal"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('category') === 'journal' ? 'bg-yellowmain text-black' : '' }}">Journal</a>
                <a href="{{ route('admin.books.index') }}??category=thesis"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('category') === 'thesis' ? 'bg-yellowmain text-black' : '' }}">Thesis</a>
            </div>
        </div> --}}
        {{-- @if (count($favorites) == 0)
            <div class="w-full h-96 flex flex-col items-center justify-center mt-20">
                <p class=" text-base text-red-500 mt-5">Oops! No book found.</p>
            </div>
            <div class="alert alert-warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                <span>No Books Available</span>
                <a class=" text-xm text-black underline" href="/admin/books">Refresh</a>
            </div>
        @endif --}}
        <div class="flex flex-wrap -m-4">
            @forelse ($favorites as $favorite)
            <div class="w-full md:w-1/2 lg:w-1/4 p-4 ">

                <div class="bg-white shadow-2xl p-6 rounded-lg h-full">
                    <div class="flex gap-2">
                        <div class="grow">
                            <h1
                                class="bg-white border-2 border-bluemain rounded-xl drop-shadow-lg w-32 flex justify-center text-sm py-1 px-3 text-black capitalize">
                                {{ $favorite->book->type }}
                            </h1>
                        </div>
                    </div>
                    @if ($favorite->book->image !== null)
                            <img class="h-70 rounded w-full object-cover object-center py-6"
                                src="{{route('image-view', ['name' => $favorite->book->image])}}" alt="content">
                    @else
                        <img class="
                            h-70 rounded w-full object-cover object-center py-6"
                            src="{{ asset('img/b1.jpg') }}" alt="content">
                    @endif

                    @if ($favorite->book->status === 'available')
                        <span
                            class="capitalize inline-flex items-center mb-2 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full">
                            </span>
                            {{ $favorite->book->status }}

                        </span>
                    @else
                        <span
                            class="capitalize inline-flex items-center mb-2 bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                            <span class="w-2 h-2 mr-1 bg-red-500 rounded-full">
                            </span>
                            {{ $favorite->book->status }}

                        </span>
                    @endif

                    <h2 class="truncate text-lg text-gray-900 font-medium title-font m-1">{{ $favorite->book->title }}</h2>
                    <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Author:</b> {{ $favorite->book->author }}
                    </h3>
                    <h3 class="truncate tracking-widest text-black text-sm m-1"><b>ISBN:</b> {{ $favorite->book->ISBN }}
                    </h3>
                    <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Published Year:</b>
                        {{ $favorite->book->published_year }}</h3>
                    <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Call Number:</b>
                        {{ $favorite->book->call_number }}</h3>
                    <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Publisher:</b>
                        {{ $favorite->book->publisher }}</h3>
                </div>
            </div>

            @empty
                {{-- <div class="w-full h-96 flex flex-col items-center justify-center mt-20">
                    <p class=" text-base text-red-500 mt-5">Oops! No Favorite Books</p>

                </div> --}}
                <div class="w-full h-96 flex flex-col items-center justify-center mt-18">
                    <div class="alert alert-info">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>No Favorite Book </span>
                        <a class=" text-xm text-black underline" href="{{route('user.catalog')}}">See More Books</a>
                    </div>
                </div>
            @endforelse
        </div>
</x-app-layout>
