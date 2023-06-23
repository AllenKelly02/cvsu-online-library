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
                @foreach ($books as $book)
                    <div class=" flex flex-wrap md:flex-nowrap items-center space-x-4">
                        <div class="md:w-36 h-48 md:mb-0 mb-6 flex-shrink-0 flex flex-col">

                            @if ($book->image !== null)
                                <img class="rounded h-full" src="{{url($book->image)}}" alt="image">
                            @else
                                <img class="rounded h-full" src="{{ asset('img/b1.jpg') }}" alt="image">
                            @endif

                        </div>
                        
                        <div class="md:flex-grow">
                         <h5 class="text-gray-900 text-lg title-font font-medium mb-1"><b>ISBN</b> {{ $book->ISBN }}</h5>
                            <div class="flex items-start space-x-4">
                                <h2 class="poppins text-xl font-medium text-gray-900 title-font mb-1">
                                    {{ $book->title }}</h2>
                                <a class="text-xs text-red-600 py-1 px-2 border border-red-600 rounded capitalize"
                                    href="/admin/books?category={{ $book->category }}">{{ $book->category }}</a>
                            </div>
                            <p class="poppins text-sm">by {{ $book->author }}</p>
                             <div class="mb-1">
                                <span class="poppins mt-1 text-gray-500 text-sm"><b>Published Year:</b> {{$book->published_year}}</span>
                            </div>
                            <a
                                class="flex items-center space-x-2 border border-blue-500 px-2 rounded w-fit mt-4 hover:bg-lightgray">
                                <a href="{{ route('admin.books.show', ['book' => $book]) }}" class="poppins text-sm text-blue-500">Edit</a>
                                <i class='bx bx-right-arrow-alt text-base text-blue-500'></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>
