<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24">
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">New Collection</h1>
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
        <div class="px-1 py-2 mb-5 flex justify-center">
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
        </div>
        <div class="flex flex-wrap -m-4">
            @forelse ($borrowed as $borrow)
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-white shadow-2xl p-6 rounded-lg h-full">

                        <a class="bg-white border-2 border-bluemain rounded-xl drop-shadow-lg w-32 flex justify-center text-sm py-1 px-3 text-black capitalize">{{ $borrow->book->type }}</a>

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

                        @if ($borrow->status === 'pending')
                            <h3 class="truncate tracking-widest text-black text-xs m-1"><b>status:</b>
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5
                                 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 capitalize">
                                    {{ $borrow->status }}</span>
                            </h3>
                        @else
                            <h3 class="truncate tracking-widest text-black text-xs m-1"><b>Status:</b>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2
                                    px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 capitalize">{{$borrow->status}}</span>
                            </h3>
                        @endif


                        @if ($borrow->penalty)
                            <h3 class="truncate tracking-widest text-black text-xs m-1"><b>Penalty</b>
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2
                                px-2.5 py-0.5 rounded">₱{{$borrow->penalty_payment}}</span>
                            </h3>
                        @endif

                        {{-- Return Button will be on admin --}}

                        {{-- @if ($borrow->is_approved === 1 && $borrow->returned_date === '0000-00-00')
                            <form action="{{ route('user.returned-book', ['id' => $borrow->id]) }}" method="post"
                                class="w-full">

                                @csrf
                                <button
                                    class="text-white bg-green-400 drop-shadow-lg px-4 py-2 rounded-lg text-xs capitalize">
                                    return
                                </button>
                            </form>
                        @endif --}}

                    </div>
                </div>
            @empty
                <div class="m-auto mt-36">
                    <div class="alert alert-warning px-10 py-10 h-10 w-96">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>No Borrowed Books Available</span>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
