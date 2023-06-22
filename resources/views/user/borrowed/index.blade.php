<x-app-layout>
    <div class="pl-9 px-5 pt-8 mx-auto py-24" src="{{ asset('img/wave.png') }}">
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Borrowed Books</h1>
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

        <div class="flex flex-wrap -m-4">
            @forelse ($borrowed as $borrow)
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-green-200 p-6 rounded-lg">

                        <a class="text-xs text-red-600 py-1 px-3 border capitalize border-red-600 rounded"
                            href="/admin/books?category={{ $borrow->book->category }}">{{ $borrow->book->category }}</a>

                        @if ($borrow->book->image !== null)
                            <img class="h-70 rounded w-full object-cover object-center py-6"
                                src="{{ $borrow->book->image }}" alt="content">
                        @else
                            <img class="h-70 rounded w-full object-cover object-center py-6"
                                src="{{ asset('img/b1.jpg') }}" alt="content">
                        @endif

                        @if ($borrow->book->status === 'available')
                            <span
                                class="capitalize inline-flex items-center mb-2 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full">
                                </span>

                                {{ $borrow->book->status }}
                            </span>
                        @else
                            <span
                                class="capitalize inline-flex items-center mb-2 bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full">
                                </span>
                                {{ $borrow->book->status }}

                            </span>
                        @endif

                        <h2 class="truncate text-lg text-gray-900 font-medium title-font m-1">{{ $borrow->book->title }}
                        </h2>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Author:</b>
                            {{ $borrow->book->author }}
                        </h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Published Year:</b>
                            {{ $borrow->book->published_year }}</h3>

                        <h3 class="truncate tracking-widest text-black text-xs m-1"><b>Borrowed Date:</b>
                            {{ $borrow->borrowed_date }}</h3>
                        <h3 class="truncate tracking-widest text-black text-xs m-1"><b>Return Date:</b>
                            {{ $borrow->returned_date }}</h3>

                        @if ($borrow->returned_date === '0000-00-00')
                            <form action="{{route('user.returned-book', ['id' => $borrow->id])}}" method="post" class="w-full">

                                @csrf
                                <button
                                    class="text-white bg-green-400 drop-shadow-lg px-4 py-2 rounded-lg text-xs capitalize">
                                    return
                                </button>
                            </form>
                        @endif

                    </div>
                </div>

            @empty
            @endforelse
        </div>
        </section>
</x-app-layout>
