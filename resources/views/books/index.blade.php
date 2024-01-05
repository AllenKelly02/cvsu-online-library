<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24 bg-bgmain">
        <div class="flex w-full mb:pt-5 justify-between">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">List of Books</h1>
                <div class="h-1 w-20 bg-bluemain rounded"></div>
            </div>
            <div class="py-3">
                <a href="{{route('admin.book.import.create')}}" class="btn btn-primary rounded-full text-black bg-yellowmain border-yellowmain hover:bg-yellow-500 hover:border-yellow-500 hover:text-black ">Import</a>
                <a href="{{route('admin.scan.book.index')}}" target="_blank" class="text-black hover:underline">Scan Book</a>
            </div>
        </div>
        <div class="w-full flex items-center justify-end px-4 py-3 border-b border-gray-300">
            <form action="" class="w-full">
                <div class="w-full flex justify-end space-x-3 ">
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2" placeholder="Type here..">
                    <button type="submit"
                        class="px-4 py-2 rounded bg-yellowmain hover:bg-yellow-500 text-black">Search</button>
                </div>
            </form>
        </div>
        {{-- <div class="px-1 py-2 mb-5 flex justify-center">
            <div class="flex items-center space-x-5">
                <a href="{{ route('admin.books.index') }}"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->routeIs('default') ? 'bg-yellowmain text-black' : '' }}">All</a>
                <a href="{{ route('admin.books.index') }}?type=book"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('type') === 'book' ? 'bg-yellowmain text-black' : '' }}">Book</a>
                <a href="{{ route('admin.books.index') }}?type=e-Book"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('type') === 'e-book' ? 'bg-yellowmain text-black' : '' }}">E-Book</a>
                <a href="{{ route('admin.books.index') }}?type=journal"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('type') === 'journal' ? 'bg-yellowmain text-black' : '' }}">Journal</a>
                <a href="{{ route('admin.books.index') }}?type=thesis"
                    class="text-lg px-3 py-1 rounded border text-black border-yellowmain hover:bg-yellowmain hover:text-black {{ request()->query('type') === 'thesis' ? 'bg-yellowmain text-black' : '' }}">Thesis</a>
            </div>
        </div> --}}
        @if (Session::has('delete'))
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{Session::get('delete')}}</span>
          </div>
        @endif
        <div class="flex flex-wrap -m-4">


            @forelse ($books as $book)
                <div class="w-full md:w-1/2 lg:w-1/4 p-4 py-10">

                    <div class="bg-white shadow-2xl p-6 rounded-lg h-full">
                        <div class="flex gap-2">
                            <div class="grow">
                                <h1
                                    class="bg-white border-2 border-bluemain rounded-xl drop-shadow-lg w-32 flex justify-center text-sm py-1 px-3 text-black capitalize">
                                    {{ $book->type }}
                                </h1>
                            </div>
                            {{-- @if ($book->created_at->diffInWeeks() < 1)
                                <h1 class="bg-bluemain rounded-lg drop-shadow-lg text- py-1 px-3 text-bgmain">
                                    New
                                </h1>
                            @endif --}}
                        </div>

                        @if ($book->image !== null)

                        <img class="w-full object-cover object-center py-6 rounded"
                        style="max-height: 450px;"
                        src="{{ route('image-view', ['name' => $book->image]) }}" alt="content">
                        @else

                        <img class="w-full object-cover object-center py-6 rounded"
                        style="max-height: 450px;"
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
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>ISBN:</b> {{ $book->ISBN }}
                        </h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Published Year:</b>
                            {{ $book->published_year }}</h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Call Number:</b>
                            {{ $book->call_number }}</h3>
                        <h3 class="truncate tracking-widest text-black text-sm m-1"><b>Publisher:</b>
                            {{ $book->publisher }}</h3>
                        <a href="{{ route('admin.books.show', ['book' => $book]) }}" class="buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out">
                            View Book
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
                        <a class=" text-xm text-black underline" href="/admin/books">Refresh</a>
                    </div>
                @endif
            @endforelse
        </div>

    </div>
    </div>
</x-app-layout>
