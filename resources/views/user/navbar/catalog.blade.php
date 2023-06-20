<x-app-layout>
    <div class="pl-9 px-5 pt-8 mx-auto py-24" src="{{ asset('img/wave.png') }}">
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Catalog</h1>
                <div class="h-1 w-20 bg-green-900 rounded"></div>
            </div>
        </div>
        <div class="w-full flex items-center justify-end px-4 py-3 border-b border-gray-300">
            <form action="/admin/books" class="w-full">
                <div class="w-full flex justify-end space-x-3 ">
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2"
                        placeholder="Type here..">
                    <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white">Search</button>
                </div>
            </form>
        </div>
        <div class="px-4 py-2">
            <div class="flex items-center space-x-2">
                <a href="/admin/books"
                    class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">All</a>
                <a href="/admin/books?category=book"
                    class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">Book</a>
                <a href="/admin/books?category=e-book"
                    class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">E-Book</a>
                <a href="/admin/books?category=journal"
                    class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">Journal</a>
                <a href="/admin/books?category=thesis"
                    class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">Thesis</a>
            </div>
        </div>
        {{-- @if (count($books) == 0)
            <div class="w-full h-96 flex flex-col items-center justify-center mt-20">
                <p class=" text-base text-red-500 mt-5">Oops! No book found.</p>
                <a class=" text-xm text-blue-500 underline" href="/admin/books">refresh</a>
            </div>
        @endif --}}
        @forelse ($books as $book)
            @csrf
            <div class="flex flex-wrap -m-4">
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-green-200 p-6 rounded-lg">
                        <a class="text-xs text-red-600 py-1 px-3 border capitalize border-red-600 rounded" href="/admin/books?category={{$book->category}}" >{{$book->category}}</a>
                        <img class="object-cover h-48 md:h-64 lg:h-96 rounded w-full object-center py-2"
                            src="{{ asset('img/b1.jpg') }}" alt="content">
                        <span
                            class="inline-flex items-center mb-2 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                            Available
                        </span>
                        <h2 class="truncate text-lg text-gray-900 font-medium title-font m-1">{{ $book->title }}</h2>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Author:</b> {{ $book->author }}</h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Published Year:</b> {{ $book->published_year }}</h3>

                        <a href="{{ route('user.books.show', $book->id) }}" type="submit"
                            class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @empty
        @endforelse
        </section>
</x-app-layout>
