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
    @if (Session::has('message'))
        <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
            <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                {{ Session::get('message') }}</p>
        </div>
    @endif
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap bg-white">
                {{-- @if ($book->image !== null)
                    <a href="{{ route('admin.books.show', ['book' => $book]) }}" class="h-full w-auto">
                        <img class=" px-10 h-full py-9 rounded object-cover object-center"
                            src="{{ route('image-view', ['name' => $book->image]) }}" alt="content">
                    </a>
                @else
                    <img class="
                            h-full py-9 object-cover object-center"
                        src="{{ asset('img/b1.jpg') }}" alt="content">
                @endif --}}
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <form method="POST" action="{{ route('admin.books.update', ['id' => $book->id]) }}"
                        enctype="multipart/form-data">
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

                        <div class="w-full h-auto" x-data="imageHandler">

                            <template x-if="imageSrc !== null">
                                <div class="flex flex-col gap-2">
                                    <img class=" px-10 h-full py-9 rounded object-cover object-center"
                                :src="imageSrc" alt="content">
                                <button class="btn btn-error" @click.prevent="imageSrc = null"> Cancel</button>
                                </div>

                            </template>
                            <div class="flex items-center justify-center w-full" x-show="imageSrc === null">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2
                                     border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50
                                      ">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 "><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="image" @change="uploaderHandler($event)" type="file" class="hidden" />
                                </label>
                            </div>

                        </div>
                        <h1 class="text-black text-3xl title-font font-medium mb-2"><input type="text"
                                autocomplete="off" name="title" class="editbook text-justify bg-white"
                                value="{{ $book->title }}"></h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <span class="text-black">by <input type="text" autocomplete="off" name="author"
                                        class="editbook1 text-center bg-white" value="{{ $book->author }}"></span>
                            </span>
                            <span class="flex ml-3 pl-3 py-21 border-l-2 border-black space-x-2s">
                                <span class="text-black ml-1"><input type="text" autocomplete="off"
                                        name="published_year" class="editbook2 text-center bg-white"
                                        value="{{ $book->published_year }}"></span>
                            </span>
                        </div>
                        <p class="text-black mb-3">
                            <b>ISBN:</b> <input type="text" autocomplete="off" name="ISBN"
                                class="editbook3 text-center bg-white" value="{{ $book->ISBN }}">
                        </p>
                        <p class="text-black mb-3">
                            <b>Publisher:</b> <input type="text" autocomplete="off" name="publisher"
                                class="editbook3 text-center bg-white" value="{{ $book->publisher }}">
                        </p>
                        <p class="text-black mb-3">
                            <b>Pages:</b> <input type="text" autocomplete="off" name="pages"
                                class="editbook4 text-center bg-white" value="{{ $book->pages }}">
                        </p>

                        <p class="leading-relaxed text-black mb-3"><b>Description:</b><br><input type="text"
                                autocomplete="off" name="description" class="editbook5 text-justify bg-white"
                                value="{{ $book->description }}"></p>
                        <p class="leading-relaxed text-black mb-3"><b>Biblio Notes:</b><br><input type="text"
                                autocomplete="off" name="bibliography" class="editbook5 text-justify  bg-white"
                                value="{{ $book->bibliography }}">
                        </p>
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">Number of Copies:
                                <input type="text" autocomplete="off" name="copy"
                                    class="editbook2 text-center  bg-white" value="{{ $book->copy }}"></span>
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
                                                    <input type="text" autocomplete="off" name="accession_number"
                                                        class="editbook2 text-center  bg-white"
                                                        value="{{ $book->accession_number }}">
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                    <input type="text" autocomplete="off" name="call_number"
                                                        class="editbook2 text-center  bg-white"
                                                        value="{{ $book->call_number }}">
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-x-gray-500 border-y-gray-500">
                                                    <input type="text" autocomplete="off" name="call_number"
                                                        class="editbook2 text-center  bg-white"
                                                        value="{{ $book->edition_number }}">
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
        // Remove the alert message after 3 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 3000);
    </script>

    @push('js')
        <script>
            const imageHandler = () => ({
                imageSrc : null,
                uploaderHandler (e){
                    const {files} = e.target;

                    const reader = new FileReader()

                    reader.onload = function (){
                        this.imageSrc = reader.result
                    }.bind(this)

                    reader.readAsDataURL(files[0])
                }
            })
        </script>
    @endpush
</x-app-layout>
