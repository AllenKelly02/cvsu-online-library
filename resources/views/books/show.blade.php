@php

    $BookIssuingIsNull =
        Auth::user()
            ->booksIssuing()
            ->where('book_id', $book->id)
            ->first() === null;

    $bookType = $book->type;

@endphp


<x-app-layout>
    <div class="pt-5 pl-20">
        @auth
            @if (Auth::user()->role === 'admin')
                <a class="cta" href="{{ route('admin.books.index') }}">
                    <span class="black">Back</span>
                </a>
            @else
                <a class="cta" href="{{ route('user.catalog') }}">
                    <span class="black">Back</span>
                </a>
            @endif
        @endauth
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success shadow-lg w-80 ml-60 animate-bounce bg-blue-200">
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
    @if (session()->has('warning'))
        <div class="alert alert-warning shadow-lg w-80 ml-60 animate-bounce bg-yellow-200">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('warning') }}</span>
            </div>
        </div>
    @endif
    <section class="text-gray-600 body-font overflow-hidden relative pt-5" x-data="removeModal">
        <div class="w-auto h-auto flex flex-col gap-2">
            @if ($bookType == 'e-Book')
                <div class="w-full h-96 relative" x-data="disableRightClicked" x-init="disableRClicked($event)">


                    @if ($book->ebook_source === `{{ App\Enums\EbookSourceType::OUTSIDE->value }}`)
                        <embed src="{{ $book->ebook_link }}" type="" class="w-full h-full">
                    @else
                        <embed id="pdfCanvas" src="{{ $book->ebook_link }}#toolbar=0" type=""
                            class="w-full h-full">
                    @endif

                    @if (Auth::user()->booksIssuing()->where('book_id', $book->id)->where('is_approved', true)->first() === null)
                        <div class="w-full backdrop-blur-sm bg-white/30 h-full top-0 absolute z-10">

                        </div>
                    @endif
                </div>
            @endif

        </div>

        {{-- Remove book --}}
        <div x-show="toggle"
            class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-auto
         bg-gray-100 rounded-lg shadow-2xl flex flex-col space-y-5 p-5"
            x-cloak>
            <h1 class="text-lg font-bold">Are you sure remove this book? </h1>
            <div class="flex justify-end items-center">

                <form action="{{ route('admin.book-delete', ['id' => $book->id]) }}" method="post"
                    class="flex flex-col gap-2 w-full">
                    @csrf
                    <select class="select select-bordered w-full bg-white capitalize" name="reason">
                        <option disabled selected>Select Reason</option>
                        <option>the materials have not been used for more than ten years</option>
                        <option>the condition of the item is bad, e.g. missing pages, worn-out, and text is unreadable</option>
                        <option>the Science and Technology materials that are copyrighted/published more than three to five years</option>
                        <option> the materials are no longer in demand or do not support the curriculum or current academie programs</option>
                        <option> older edition of the book is no longer used</option>
                        <option>books become obsolete</option>
                      </select>


                    <div class="flex items-center space-x-5 pl-5 justify-end">
                        <a class="button-name" @click="openToggle()">Cancel</a>
                        <button class="delete" href="{{ route('admin.books.archivedbooks') }}">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </div>

                </form>
            </div>

        </div>


        <section class="text-black body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto bg-white rounded-3xl duration-700">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    @if ($book->image !== null)
                        <img alt="bookcover"
                            class="lg:w-1/2 w-full lg:h-auto h-full px-10 object-cover object-center rounded-2xl"
                            src="{{ route('image-view', ['name' => $book->image]) }}">
                    @else
                        <img alt="bookcover" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                            src="{{ asset('img/b1.jpg') }}">
                    @endif

                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h2
                            class="flex text-lg title-font bg-white rounded-lg drop-shadow-lg justify-center my-3 w-32 text-black border-2 border-bluemain capitalize tracking-widest">
                            {{ $bookType }}</h2>
                        <h1 class="text-black text-3xl title-font font-medium mb-2">{{ $book->title }}</h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <span class="text-black">by <b>{{ $book->author }}</b></span>
                            </span>
                            <span class="flex ml-3 pl-3 py-2 border-l-2 border-black space-x-2s">
                                <span class="text-black"><b>{{ $book->published_year }}</b></span>
                            </span>
                        </div>

                        @if ($book->description !== null)
                            <p class="leading-relaxed text-justify mb-5">{{ $book->description }}</p>
                        @else
                            <p class="leading-relaxed text-justify mb-5">No description for this book.</p>
                        @endif

                        @if ($book->description !== null)
                            <p class="leading-relaxed text-justify">{{ $book->bibliography }}</p>
                        @else
                            <p class="leading-relaxed text-justify">No bibbliography for this book.</p>
                        @endif

                        <div class="flex mt-6 items-center mb-3 pb-3">
                            <div class="flex">
                                <span class="mr-1"><b>Publisher:</b></span>
                                <span class="text-black">{{ $book->publisher }}</span>
                            </div>
                        </div>
                        @if (Auth::user()->role === 'admin')
                            <span class="title-font font-medium text-1xl text-gray-900"><b>Accession Number</b> -
                                {{ $book->accession_number }}
                                {!! DNS1D::getBarcodeHTML($book->accession_number, 'CODABAR') !!}</span>
                        @else
                            <span class="title-font font-medium text-1xl text-gray-900"><b>Accession Number</b> -
                                {{ $book->accession_number }}
                            </span>
                        @endif
                        <div class="flex flex-col border-b-2 border-gray-100 pb-3 pt-3">
                            {{-- Table --}}
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-center divide-y divide-gray-200">
                                    <thead class="bg-blue-200">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-1 py-4 md:py-2 md:px-2 lg:px-1 border border-x-gray-500 border-y-gray-500">
                                                ISBN
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-1 py-4 md:py-2 md:px-2 lg:px-1 border border-x-gray-500 border-y-gray-500">
                                                Call No.
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-1 py-4 md:py-2 md:px-2 lg:px-1 border border-x-gray-500 border-y-gray-500">
                                                Pages
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-1 py-4 md:py-2 md:px-2 lg:px-1 border border-x-gray-500 border-y-gray-500">
                                                Edition
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-1 py-4 md:py-2 md:px-2 lg:px-1 border border-x-gray-500 border-y-gray-500">
                                                No. of Copy
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td
                                                class="text-sm text-gray-900 font-medium px-1 py-4 md:py-2 md:px-2 lg:px-1 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                {{ $book->ISBN }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-medium px-1 py-4 md:py-2 md:px-2 lg:px-1 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                {{ $book->call_number }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-medium px-1 py-4 md:py-2 md:px-2 lg:px-1 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                {{ $book->pages }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-medium px-1 py-4 md:py-2 md:px-2 lg:px-1 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                {{ $book->edition_number }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-medium px-1 py-4 md:py-2 md:px-2 lg:px-1 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                {{ $book->copy }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="flex pt-5">
                            @if (Auth::user()->role === 'admin')
                                @csrf
                                <form method="GET" action="{{ route('admin.books.edit', $book->id) }}"
                                    class="flex ml-auto py-2 px-6">
                                    <button
                                        class="flex ml-auto py-2 px-6 focus:outline-none Btn text-black hover:bg-yellow-500">
                                        Edit
                                        <svg class="svg" viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                                <button
                                    class="flex focus:outline-none btn btn-error text-black hover:bg-red-500 bg-red-600"
                                    @click="openToggle()"">
                                    <span><i class="fi fi-rr-trash mr-2 flex ml-auto"></i></span>Remove
                                </button>
                            @else
                            @if ($BookIssuingIsNull)
                            @if ($book->status === 'available')
                                <form action="{{ route('user.borrow-book', ['id' => $book->id]) }}" class="flex ml-auto py-2 px-6" method="post">
                                    @csrf
                                    <button class="flex ml-auto py-2 px-6 focus:outline-none button-name text-black hover:bg-yellow-500">Borrow</button>
                                </form>
                            @endif
                        @else
                            @php
                                $existingBorrowing = Auth::user()
                                    ->booksIssuing()
                                    ->where('book_id', $book->id)
                                    ->where('returned_date', '!=', '0000-00-00')
                                    ->first();
                            @endphp

                            @if ($book->status === 'available' || ($existingBorrowing && $existingBorrowing->returned_date != '0000-00-00'))
                                <form action="{{ route('user.borrow-book', ['id' => $book->id]) }}" class="flex ml-auto py-2 px-6" method="post">
                                    @csrf
                                    <button class="flex ml-auto py-2 px-6 focus:outline-none button-name text-black hover:bg-yellow-500">Borrow</button>
                                </form>
                            @endif
                        @endif

                            @endif
                                @if (Auth::user()->role === 'admin')
                                @else
                                    @if (Auth::user()->favourite_books()->where('book_id', $book->id)->get()->count() === 0)
                                        <form action="{{ route('user.addBookFavourite', ['id' => $book->id]) }}"
                                            method="post">
                                            @csrf
                                            <button
                                                class="rounded-full w-10 h-10 bg-red-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-1 mt-3 hover:bg-red-500">
                                                <img src="{{ asset('img/heart-add-line.png') }}" alt="">
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.removeBookFavourite', ['id' => $book->id]) }}"
                                            method="post">
                                            @csrf
                                            <button
                                                class="rounded-full w-10 h-10 bg-red-100 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-1 mt-3 hover:bg-red-300">
                                                <img src="{{ asset('img/heart-3-fill.png') }}" alt="">
                                            </button>
                                        </form>
                                    @endif
                                @endif
                        </div>
        </section>
    </section>
    @push('js')
        <script>
            document.getElementById('pdfCanvas').addEventListener('contextmenu', function(e) {
                // Prevent the default context menu
                e.preventDefault();
            }, false);
        </script>
    @endpush

    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2000);
    </script>
</x-app-layout>
