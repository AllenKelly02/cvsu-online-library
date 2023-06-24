<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24">
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">List of Books</h1>
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
                        class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">All</a>
                    <a href="/admin/books?category=book"
                        class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Book</a>
                    <a href="/admin/books?category=e-book"
                        class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">E-Book</a>
                    <a href="/admin/books?category=journal"
                        class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Journal</a>
                    <a href="/admin/books?category=thesis"
                        class="text-sm px-3 py-1 rounded border text-black border-gray-500 hover:bg-green-400 hover:text-white">Thesis</a>
                </div>
            </div>
            @if (count($books) == 0)
                <div class="w-full h-96 flex flex-col items-center justify-center mt-20">
                    <p class=" text-base text-red-500 mt-5">Oops! No book found.</p>
                    <a class=" text-xm text-blue-500 underline" href="/admin/books">refresh</a>
                </div>
            @endif
            <div class="p-4 flx flex-col space-y-2">
                @forelse ($books as $book)
                    <div class=" flex flex-wrap md:flex-nowrap items-center space-x-4">
                        <div class="md:w-36 h-48 md:mb-0 mb-6 flex-shrink-0 flex flex-col">

                            @if ($book->image !== null)
                                <img class="rounded h-full" src="{{url($book->image)}}" alt="image">
                            @else
                                <img class="rounded h-full" src="{{ asset('img/b1.jpg') }}" alt="image">
                            @endif

                        </div>

                        <div class="md:flex-grow">
                            <div class="flex items-start space-x-4">
                                <h2 class="poppins text-xl font-medium text-gray-900 title-font mb-1">
                                    {{ $book->title }}</h2>
                                <a class="text-xs text-red-600 py-1 px-2 border border-red-600 rounded capitalize"
                                    href="/admin/books?category={{ $book->category }}">{{ $book->category }}</a>
                            </div>
                            <div class="mb-1">
                                <span class="poppins mt-1 text-gray-500 text-sm">Date</span>
                            </div>
                            <p class="poppins text-sm">{{ $book->author }}</p>
                            <a
                                class="flex items-center space-x-2 border border-blue-500 px-2 rounded w-fit mt-4 hover:bg-lightgray">
                                <a href="{{ route('admin.books.show', ['book' => $book]) }}" class="poppins text-sm text-blue-500">Edit</a>
                                <i class='bx bx-right-arrow-alt text-base text-blue-500'></i>
                            </a>
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
    </div>
</x-app-layout>
