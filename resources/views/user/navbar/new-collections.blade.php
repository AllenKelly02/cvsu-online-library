<x-app-layout>
        <div class="px-20 pt-8 mx-auto py-24">
            <div class="flex flex-wrap w-full mb:pt-5">
                <div class="lg:w-1/2 w-fulll lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">New Collections</h1>
                    <div class="h-1 w-20 bg-green-900 rounded"></div>
                </div>
            </div>
        <div class="w-full flex items-center justify-end px-4 py-3 border-b border-gray-300">
            <form action="/user/new-collections" class="w-full">
                <div class="w-full flex justify-end space-x-3 ">
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2"
                        placeholder="Type here..">
                    <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white">Search</button>
                </div>
            </form>
        </div>
        <div class="px-4 py-2">
            <div class="flex items-center space-x-2">
                <a href="/user/new-collections"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">All</a>
                <a href="/user/new-collections?category=book"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Book</a>
                <a href="/user/new-collections?category=e-book"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">E-Book</a>
                <a href="/user/new-collections?category=journal"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Journal</a>
                <a href="/user/new-collections?category=thesis"
                    class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Thesis</a>
            </div>
        </div>
        <div class="flex flex-wrap -m-4">
            @forelse ($books as $book)
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-green-200 p-6 rounded-lg">
                        <div class="flex gap-2">
                            <div class="grow">
                                <a class="text-xs text-red-600 py-1 px-3 border capitalize border-red-600 rounded"
                                href="/admin/books?category={{ $book->category }}">{{ $book->category }}</a>
                            </div>
                            @if ($book->created_at->diffInDays() < 2)
                                <h1 class="bg-green-400 rounded-lg drop-shadow-lg text-xs py-1 px-3 text-white">
                                     New {{ $book->created_at->diffInDays() }} days Ago
                                </h1>
                            @endif
                        </div>
                        @if ($book->image !== null)
                            <img class="h-70 rounded w-full object-cover object-center py-6"
                                src="{{ url($book->image) }}" alt="content">
                        @else
                            <img class="h-70 rounded w-full object-cover object-center py-6"
                                src="{{ asset('img/b1.jpg') }}" alt="content">
                        @endif

                        @if ($book->status === 'available')
                            <span
                                class="capitalize inline-flex items-center mb-2 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full">
                                </span>
                                {{ $book->status }}

                            </span>
                        @else
                            <span
                                class="capitalize inline-flex items-center mb-2 bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full">
                                </span>
                                {{ $book->status }}

                            </span>
                        @endif

                        <h2 class="truncate text-lg text-gray-900 font-medium title-font m-1">{{ $book->title }}</h2>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Author:</b> {{ $book->author }}
                        </h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Published Year:</b>
                            {{ $book->published_year }}</h3>

                        <a href="{{ route('user.books.show', ['book' => $book]) }}" type="submit"
                            class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                            View
                        </a>
                    </div>
                </div>

            @empty
            <div class="alert alert-warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                <span>No Books Available</span>
            </div>
            @endforelse
        </div>
</x-app-layout>
