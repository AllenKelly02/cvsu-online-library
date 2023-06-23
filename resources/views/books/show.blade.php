<x-app-layout>
    <div class="pt-5 pl-20">
        @auth
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.books.index') }}"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-greem-700 dark:focus:ring-green-800">
                    <svg aria-hidden="true" class="w-5 h-5 transform rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            @else
                <a href="{{ route('user.catalog') }}"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-greem-700 dark:focus:ring-green-800">
                    <svg aria-hidden="true" class="w-5 h-5 transform rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            @endif
        @endauth
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-fulls p-4 flex justify-center">
            <div class="w-5/6 flex gap-4">
                <img alt="ecommerce" class="w-3/6 h-full object-cover object-center rounded"
                    src="{{ asset('img/b1.jpg') }}" alt="content">
                <div class="w-full space-y-5">
                    <p class="text-xs w-max text-red-600 py-1 px-3 border capitalize border-red-600 rounded mb-5">
                        {{ $book->category }}
                    </p>
                    <h5 class="text-gray-900 text-lg title-font font-medium mb-1"><b>ISBN</b> {{ $book->ISBN }}</h5>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $book->title }}</h1>
                    <p class="text-gray-600 ml-1">by {{ $book->author }}</p>
                    <p class="text-gray-600 ml-1">
                        <b>Published Year:</b> {{ $book->published_year }}
                    </p>
                    <p class="text-gray-600 ml-1">
                        <b>Publisher:</b> {{ $book->publisher }}
                    </p>

                    <div class="ml-1">
                        <p class="leading-relaxed"><b>Description:</b> {{ $book->description }}</p>
                    </div>
                    <div>
                        <div class="flex space-x-5">
                            @if (Auth::user()->role === 'admin')
                            @else
                                @if (Auth::user()->favourite_books()->where('book_id', $book->id)->get()->count() === 0)
                                    <form action="{{ route('user.addBookFavourite', ['id' => $book->id]) }}"
                                        method="post">
                                        @csrf
                                        <button>
                                            <img src="{{ asset('img/heart-add-line.png') }}" alt="">
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('user.removeBookFavourite', ['id' => $book->id]) }}"
                                        method="post">
                                        @csrf
                                        <button>
                                            <img src="{{ asset('img/heart-3-fill.png') }}" alt="">
                                        </button>
                                    </form>
                                @endif
                                <label for="my_modal_6" class="btn btn-success">Borrow</label>

                                <!-- Put this part before </body> tag -->
                                <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                                <div class="modal">
                                    <div class="modal-box bg-white">
                                        <h3 class="font-bold text-lg">Agreement!</h3>
                                        <p class="py-4">In accordance with the terms of this agreement, you agree to
                                            pay a fine of 10 Pesos each day if the borrowing period exceedes than the
                                            allotted 3-9 day period.</p>
                                        <div class="flex gap-2">
                                            <label for=""> Start Date: </label>
                                            <P>{{ now()->format('M-d-Y') }}</P>
                                        </div>
                                        <label for="">Days</label>
                                        <input type="text" id="days" maxlength="1" class="w-1/2"
                                            onchange="getTotalDays()">
                                        <div class="modal-action">
                                            {{-- action="{{ route('user.borrow-book', ['id' => $book->id]) }}" --}}
                                            <form action="{{ route('user.borrow-book', ['id' => $book->id]) }}"
                                                method="POST">
                                                <input type="hidden" id="totalDays" name="total_days" required>
                                                @csrf
                                                <button class="btn btn-success" onclick="getTotalDays()">Borrow</button>
                                            </form>
                                            <label for="my_modal_6" class="btn">Close!</label>
                                        </div>
                                    </div>
                                </div>
                                {{--
                                <form action="{{ route('user.borrow-book', ['id' => $book->id]) }}" method="post">
                                    @csrf
                                    <button class="btn btn-success">Borrow</button>
                                </form> --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function getTotalDays() {
            const days = document.getElementById('days').value;
            const totalDays = document.getElementById('totalDays').value = days;
        }
    </script>
</x-app-layout>
