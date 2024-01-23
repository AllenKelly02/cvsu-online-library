<x-app-layout>
    <div class="pt-5 pl-20">
        @auth
            @if (Auth::user()->role === 'admin')
                <a class="cta" href="{{ route('admin.books.show', ['book' => $book]) }}">
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
        <div class="alert alert-success shadow-lg w-80 ml-60 animate-bounce">
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
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap bg-white">
                @if ($book->image !== null)
                        <a href="{{ route('admin.books.show', ['book' => $book]) }}" class="h-full w-auto">
                            <img class=" px-10 h-full py-9 rounded object-cover object-center" src="{{route('image-view', ['name' => $book->image])}}" alt="content">
                        </a>
                        @else
                            <img class="
                            h-full py-9 object-cover object-center"
                                src="{{ asset('img/b1.jpg') }}" alt="content">
                        @endif
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <form method="POST" action="{{ route('admin.books.update', ['id' => $book->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-2 mb-10">
                            <div class="grow">
                                <h1
                                    class="bg-white rounded-lg drop-shadow-lg w-44 flex justify-center text-lg px-3 text-black border-2 border-bluemain capitalize mb-5">
                                    {{ $book->type }}
                                </h1>
                            </div>
                            <button class="savebutton" type="submit">
                                Save
                            </button>
                        </div>
                        <h1 class="text-black text-3xl title-font font-medium mb-2"><input type="text" autocomplete="off" name="title" class="editbook text-justify bg-white" value="{{ $book->title }}"></h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <span class="text-black">by <input type="text" autocomplete="off" name="author" class="editbook1 text-center bg-white" value="{{ $book->author }}"></span>
                            </span>
                            <span class="flex ml-3 pl-3 py-21 border-l-2 border-black space-x-2s">
                                <span class="text-black ml-1"><input type="text" autocomplete="off" name="published_year" class="editbook2 text-center bg-white" value="{{ $book->published_year }}"></span>
                            </span>
                        </div>
                        <p class="text-black mb-3">
                            <b>ISBN:</b> <input type="text" autocomplete="off" name="ISBN" class="editbook3 text-center bg-white" value="{{ $book->ISBN }}">
                        </p>
                        <p class="text-black mb-3">
                            <b>Publisher:</b> <input type="text" autocomplete="off" name="publisher" class="editbook3 text-center bg-white" value="{{ $book->publisher }}">
                        </p>
                        <p class="text-black mb-3">
                            <b>Pages:</b> <input type="text" autocomplete="off" name="pages" class="editbook4 text-center bg-white" value="{{ $book->pages }}">
                        </p>

                        <p class="leading-relaxed text-black mb-3"><b>Description:</b><br><input type="text" autocomplete="off" name="description" class="editbook5 text-justify bg-white" value="{{ $book->description }}"></p>
                        <p class="leading-relaxed text-black mb-3"><b>Biblio Notes:</b><br><input type="text" autocomplete="off" name="bibliography" class="editbook5 text-justify  bg-white" value="{{ $book->bibliography }}">
                        </p>
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">Number of Copies:
                                <input type="text" autocomplete="off" name="copy" class="editbook2 text-center  bg-white" value="{{ $book->copy }}"></span>
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
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 border border-x-gray-500 border-y-gray-500 ">
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
                                                    <input type="text" autocomplete="off" name="accession_number" class="editbook2 text-center  bg-white" value="{{ $book->accession_number }}">
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                    <input type="text" autocomplete="off" name="call_number" class="editbook2 text-center  bg-white" value="{{ $book->call_number }}">
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                    <input type="text" autocomplete="off" name="call_number" class="editbook2 text-center  bg-white" value="{{ $book->edition_number }}">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2000);
    </script>
</x-app-layout>
