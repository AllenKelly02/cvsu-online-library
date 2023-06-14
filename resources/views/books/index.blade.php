<x-app-layout>
    <div class="w-full">
        <div class="w-full ">
            <div class="w-full flex items-center justify-end px-4 py-3 border-b border-gray-300">
                <form action="/admin/books" class="w-full">
                    <div class="w-full flex justify-end space-x-3 ">
                        <input type="text" name="search" class="border-gray-300 rounded w-1/2" placeholder="Type here..">
                        <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white">Search</button>
                    </div>
                </form>
            </div>
            <div class="px-4 py-2">
                <div class="flex items-center space-x-2">
                    <a href="/admin/books" class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">All</a>
                    <a href="/admin/books?category=book" class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">Book</a>
                    <a href="/admin/books?category=e-book" class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">E-Book</a>
                    <a href="/admin/books?category=journal" class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">Journal</a>
                    <a href="/admin/books?category=thesis" class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-blue-400 hover:text-white">Thesis</a>
                </div>
            </div>
            @if(count($books) == 0)
                    <div class="w-full h-96 flex flex-col items-center justify-center mt-20">
                        <p class=" text-base text-red-500 mt-5">Oops! No book found.</p>
                        <a class=" text-xm text-blue-500 underline" href="/admin/books">refresh</a>
                    </div>
                @endif
            <div class="p-4 flx flex-col space-y-2">
                @foreach ($books as $book)
                    <div class=" flex flex-wrap md:flex-nowrap items-center space-x-4">
                        <div class="md:w-36 h-48 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                        <img class="rounded h-full" src="{{ asset('img/b1.jpg') }}"  alt="image">
                        </div>
                        
                        <div class="md:flex-grow">
                            <div class="flex items-start space-x-4">
                                <h2 class="poppins text-xl font-medium text-gray-900 title-font mb-1">{{$book->title}}</h2>
                                <a class="text-xs text-red-600 py-1 px-2 border border-red-600 rounded" href="/admin/books?category={{$book->category}}" >{{$book->category}}</a>
                            </div>
                            <div class="mb-1">
                                <span class="poppins mt-1 text-gray-500 text-sm">Date</span>
                            </div>
                            <p class="poppins text-sm">{{$book->author}}</p>
                            <a class="flex items-center space-x-2 border border-blue-500 px-2 rounded w-fit mt-4 hover:bg-lightgray">
                                <a href="{{route('admin.books.show')}}" class="poppins text-sm text-blue-500">Edit</a>
                                <i class='bx bx-right-arrow-alt text-base text-blue-500'></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            
        </div>
    </div>
</x-app-layout>