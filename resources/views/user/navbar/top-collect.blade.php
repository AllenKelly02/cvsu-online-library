<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24">
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Top Collections</h1>
                <div class="h-1 w-20 bg-green-900 rounded"></div>
            </div>
        </div>
        <div class="w-full flex items-center justify-end px-4 py-3 border-b border-gray-300">
            <form action="/user/top-collect" class="w-full">
                <div class="w-full flex justify-end space-x-3 ">
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2" placeholder="Type here..">
                    <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white">Search</button>
                </div>
            </form>
        </div>
        <div class="px-4 py-2">
            <div class="flex items-center space-x-2">
                <a href="/user/top-collect"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">All</a>
                <a href="/user/top-collect?category=book"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Book</a>
                <a href="/user/top-collect?category=e-book"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">E-Book</a>
                <a href="/user/top-collect?category=journal"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Journal</a>
                <a href="/user/top-collect?category=thesis"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Thesis</a>
            </div>
        </div>
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
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">

                    <div class="bg-green-200 p-6 rounded-lg">
                        <div class="flex gap-2">
                            <div class="grow">
                                <a class="text-xs text-red-600 py-1 px-3 border capitalize border-red-600 rounded"
                                    href="/user/top-collect?category={{ $favorite->book->category }}">{{ $favorite->book->category }}</a>
                            </div>
                            @if ($favorite->book->created_at->diffInWeeks() < 1)
                                <h1 class="bg-green-400 rounded-lg drop-shadow-lg text-xs py-1 px-3 text-white">
                                    New
                                </h1>
                            @endif
                        </div>
                        @if ($favorite->book->image !== null)
                            <img class="h-70 rounded w-full object-cover object-center py-6"
                                src="{{ url($favorite->book->image) }}" alt="content">
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

                        <h2 class="truncate text-lg text-gray-900 font-medium title-font m-1">
                            {{ $favorite->book->title }}</h2>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Author:</b>
                            {{ $favorite->book->author }}
                        </h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Published Year:</b>
                            {{ $favorite->book->published_year }}</h3>

                        <a href="{{ route('user.books.show', ['book' => $favorite->book]) }}" type="submit"
                            class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                            View
                        </a>
                    </div>
                </div>

            @empty
                {{-- <div class="w-full h-96 flex flex-col items-center justify-center mt-20">
                    <p class=" text-base text-red-500 mt-5">Oops! No Favorite Books</p>

                </div> --}}
                <div class="w-full h-96 flex flex-col items-center justify-center mt-18">
                    <div class="alert alert-info">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>No Favorite Books </span>
                        <a class=" text-xm text-black underline" href="{{route('user.catalog')}}">See More Books</a>
                    </div>
                </div>
            @endforelse
        </div>
</x-app-layout>
