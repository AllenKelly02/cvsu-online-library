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
    <section class="text-gray-600 body-font overflow-hidden relative" x-data="removeModal">
        <div
            class="container px-5 py-24 mx-auto bg-white m-5 rounded-lg hover:shadow-lg duration-700 flex items-center justify-center">
            <div class="w-auto h-auto flex flex-col gap-2">
                <div class="w-full h-full mx-auto flex flex-wrap space-x-10">
                    @if ($book->image !== null)
                        <a href="{{ $book->image }}" class="venobox h-full w-auto">
                            <img class="h-auto py-9 w-96 object object-center" src="{{ url($book->image) }}"
                                alt="image">
                        </a>
                    @else
                        <a href="{{ asset('img/b1.jpg') }}" class="venobox h-full w-auto">
                            <img class="h-full py-9" src="{{ asset('img/b1.jpg') }}" alt="image">
                        </a>
                    @endif
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

                        <div class="flex gap-2">
                            <div class="grow">
                                <h1
                                    class="bg-white rounded-lg drop-shadow-lg w-44 flex justify-center text-lg px-3 text-black border-2 border-bluemain capitalize mb-5">
                                    {{ $bookType }}
                                    {{-- {{ $book->type }} --}}
                                </h1>


                            </div>
                            @if (Auth::user()->role === 'admin')
                            @else
                                @if (Auth::user()->favourite_books()->where('book_id', $book->id)->get()->count() === 0)
                                    <form action="{{ route('user.addBookFavourite', ['id' => $book->id]) }}"
                                        method="post">
                                        @csrf
                                        <button>
                                            <img src="{{ asset('img/heart-add-line.png') }}" class="py-3 px-3"
                                                alt="">
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('user.removeBookFavourite', ['id' => $book->id]) }}"
                                        method="post">
                                        @csrf
                                        <button>
                                            <img src="{{ asset('img/heart-3-fill.png') }}" class="py-3 px-3"
                                                alt="">
                                        </button>
                                    </form>
                                @endif
                            @endif
                            @if (Auth::user()->role === 'admin')
                                {{-- <form action="{{ route('user.borrow-book', ['id' => $book->id]) }}" method="post"> --}}

                                @csrf
                                <div class="flex flex-col">
                                    <div class="relative">
                                        <div class="flex items-center space-x-5">
                                            <form method="GET" action="{{ route('admin.books.edit', $book->id) }}">
                                                <button class="Btn">
                                                    Edit
                                                    <svg class="svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>


                                            <button class="btn btn-error" @click="openToggle()"> <span><i
                                                        class="fi fi-rr-trash mr-2"></i></span>Remove</button>
                                            {{-- <form action="{{ route('admin.book-delete', ['id' => $book->id]) }}"
                                            method="post">

                                            @csrf
                                            <button class="delete" href="{{ route('admin.books.archivedbooks') }}">
                                                <svg viewBox="0 0 448 512" class="svgIcon">
                                                    <path
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form> --}}
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if ($BookIssuingIsNull)
                                    @if ($book->status === 'available')
                                        <form action="{{ route('user.borrow-book', ['id' => $book->id]) }}"
                                            method="post">
                                            @csrf
                                            <button class="button-name text-black hover:bg-yellow-500">Borrow</button>
                                        </form>
                                    @endif
                                @else
                                    @if (
                                        $book->status === 'available' &&
                                            Auth::user()->booksIssuing()->where('book_id', $book->id)->where('returned_date', '!=', '0000-00-00')->get()->count() === 1)
                                        <form action="{{ route('user.borrow-book', ['id' => $book->id]) }}"
                                            method="post">
                                            @csrf
                                            <button class="button-name text-black hover:bg-yellow-500">Borrow</button>
                                        </form>
                                    @endif
                                @endif
                            @endif
                        </div>

                        <h1 class="text-black text-4xl title-font font-bold mb-2 tracking-widest">{{ $book->title }}
                        </h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <span class="text-black">by <b>{{ $book->author }}</b></span>
                            </span>
                            <span class="flex ml-3 pl-3 py-21 border-l-2 border-black space-x-2s">
                                <span class="text-black ml-1"> {{ $book->published_year }}</span>
                            </span>
                        </div>
                        <p class="text-black mb-3 flex flex-col gap-2">
                            <b>ISBN:</b> {{ $book->ISBN }}

                        </p>
                        <p class="flex flex-col gap-2">
                            {!! DNS1D::getBarcodeHTML($book->accession_number, 'CODABAR') !!}
                            <span>
                                Accession Number - {{ $book->accession_number }}
                            </span>
                        </p>
                        <p class="text-black mb-3">
                            <b>Publisher:</b> {{ $book->publisher }}
                        </p>
                        <p class="text-black mb-3">
                            <b>Pages:</b> {{ $book->pages }}
                        </p>


                        <p class="leading-relaxed text-black mb-3"><b>Description:</b><br>{{ $book->description }}</p>
                        <p class="leading-relaxed text-black mb-3"><b>Biblio Notes:</b><br>{{ $book->bibliography }}
                        </p>
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">Number of Copies:
                                {{ $book->copy }} </span>
                        </div>
                        <div class="flex flex-col">
                            {{-- Table --}}
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-center">
                                            <thead class="bg-blue-200">
                                                <tr>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 border border-x-gray-500 border-y-gray-500">
                                                        Accession No.
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 border border-x-gray-500 border-y-gray-500">
                                                        Call No.
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 border border-x-gray-500 border-y-gray-500">
                                                        Edition
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tr class="bg-white">
                                                <td
                                                    class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                    {{ $book->accession_number }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                    {{ $book->call_number }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                    {{ $book->edition_number }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($bookType == 'e-Book')
                    <div class="w-full h-96 relative" x-data="disableRightClicked" x-init="disableRClicked($event)">


                        @if ($book->ebook_source === `{{ App\Enums\EbookSourceType::OUTSIDE->value }}`)
                            <embed src="{{ $book->ebook_link }}" type="" class="w-full h-full">
                        @else
                            <embed id="pdfCanvas" src="{{ $book->ebook_link }}#toolbar=0" type="" class="w-full h-full">
                        @endif

                        @if( Auth::user()->booksIssuing()->where('book_id', $book->id)->where('is_approved', true)->first() === null)
                        <div class="w-full backdrop-blur-sm bg-white/30 h-full top-0 absolute z-10">

                        </div>
                        @endif
                    </div>
                @endif

            </div>

        </div>

        <div x-show="toggle"
            class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-auto
         bg-gray-100 rounded-lg shadow-lg flex flex-col space-y-5 p-5"
            x-cloak>
            <h1 class="text-lg font-bold">are you sure remove this book ? </h1>
            <div class="flex justify-end items-center">
                {{-- <div class="pt-3">
                    <button class="btn btn-warning" @click="openToggle()">Cancel</button>
                </div> --}}
                <form action="{{ route('admin.book-delete', ['id' => $book->id]) }}" method="post" class="flex flex-col gap-2">

                    @csrf

                    <textarea name="reason" id="" cols="30" rows="10" placeholder="Reason" class="w-full">

                    </textarea>


                    <div class="flex items-center space-x-5">
                        <a class="btn btn-warning" @click="openToggle()">Cancel</a>
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
    </section>

    @push('js')


    <script>
             document.getElementById('pdfCanvas').addEventListener('contextmenu', function (e) {
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
