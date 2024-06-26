@php
    use App\Enums\EbookSourceType;
    use App\Models\Book;

    $enumsEBookSourceType = EbookSourceType::cases();



    $bookID =  book::latest()->first()?->id + 1 ?? 1;
    $accession_number = str_pad($bookID, 8, '0', STR_PAD_LEFT);;


@endphp

<x-app-layout>
    <section class="py-3 px-32 items-center justify-center bg-no-repeat">
        <div class="container px-4 mx-auto">
            <div class="p-8 bg-white rounded-xl" x-data="bookDynamicForm">
                <div
                    class="flex flex-wrap items-center justify-between -mx-4 mb-8 pb-6 border-b border-black border-opacity-20">
                    <div class="w-full sm:w-auto px-4 mb-6 sm:mb-0">
                        <h4 class="text-2xl font-bold tracking-wide text-black mb-1">Upload Books</h4>
                        {{-- <p class="text-sm text-black">Lorem ipsum dolor sit amet</p> --}}
                    </div>
                </div>
                @if (Session::has('message'))
                    <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                        <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                            {{ Session::get('message') }}</p>
                    </div>
                @endif
                <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Image</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-4">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input type="file" name="image" id="image" placeholder="Image"
                                            @change="uploadHanlder($event)"
                                            class="w-96 file-input file-input-bordered file-input-info max-w-xs bg-white" />
                                    </div>

                                </div>
                                <div class="relative space-y-3">
                                    <img src="" alt="" id="previewImage" class="h-full w-auto mb-5 py-3">
                                    <template x-if="image"><a hef="#" id="removeImageButton" class="absolute top-1 left-1 bg-yellowmain rounded-full text-black px-1 w-8 text-center cursor-pointer z-50"
                                        @click="removeImage()">X</a></template>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Books Title</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="title"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Title">
                                    </div>
                                </div>
                                @error('title')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Authors</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl mb-4">
                                <input name="author"
                                    class="block py-4 px-3 w-full text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                    id="formInput1-3" type="text" placeholder="Author 1">
                                @error('author')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div id="authorFieldsContainer" class="max-w-xl">
                                <!-- JavaScript will add new author input fields here -->
                            </div>
                            <a id="addAuthorButton"class="inline-block py-2 mr-3 text-xs leading-normal bg-green-400 rounded-3xl p-3 text-center text-black font-bold transition duration-200 hover:bg-green-700 hover:text-white"
                                href="#">Add Author</a>
                            <a id="removeAuthorButton"class="inline-block py-2 mr-3 text-xs leading-normal bg-red-500 rounded-3xl p-3 text-center text-black font-bold transition duration-200 hover:bg-red-700 hover:text-white"
                                href="#">Remove Author</a>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b  border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Type</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-3">
                            <div class="max-w-xl">
                                <div
                                    class="relative block px-4 w-full text-sm text-black placeholder-gray-700 rounded-lg">
                                    <select class="w-full py-2 rounded-lg border-2 border-black outline-none capitalize"
                                        @change="getBookType($event)" id="type" name="type">
                                        <option selected value="">Select Type</option>
                                        <option class="bg-white" value="{{ "book" }}">Book</option>
                                        <option class="bg-white" value="{{ "e-Book" }}">E-Book</option>
                                        <option class="bg-white" value="{{ "journal" }}">Journal</option>
                                        <option class="bg-white" value="{{ "publications" }}">Publications</option>
                                        <option class="bg-white" value="{{ "thesis" }}">Thesis</option>
                                    </select>
                                </div>
                                @error('type')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b  border-opacity-20"
                        x-show="bookType !== null" x-transition.duration.700ms>
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">E-book Source</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-3">
                            <div class="max-w-xl">
                                <div
                                    class="relative block px-4 w-full text-sm text-black placeholder-gray-700 rounded-lg">
                                    <select @change="selectSourceType"
                                        class="w-full py-2 rounded-lg border-2 border-black outline-none capitalize"
                                        id="type" name="ebook_source_type">
                                        <option selected value="">Select Type</option>

                                        @foreach ($enumsEBookSourceType as $ebookType)
                                            <option class="bg-white" value="{{ $ebookType->value }}">
                                                {{ $ebookType->value }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                @error('type')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>




                    <template x-if="sourceType === `{{ $enumsEBookSourceType[0]->value }}`">
                        <div
                            class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                            <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                                <span class="text-sm font-medium text-black">E-book Link</span>
                            </div>
                            <div class="w-full sm:w-2/3 px-4">
                                <div class="max-w-xl">
                                    <div class="flex flex-wrap items-center -mx-3">
                                        <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                            <input name="ebook_source"
                                                class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                                type="text" placeholder="e-book link">
                                        </div>
                                    </div>
                                    @error('title')
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </template>


                    <template x-if="sourceType === `{{ $enumsEBookSourceType[1]->value }}`">
                        <div
                            class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                            <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                                <span class="text-sm font-medium text-black">E-book File</span>
                            </div>
                            <div class="w-full sm:w-2/3 px-4">
                                <div class="max-w-xl">
                                    <div class="flex flex-wrap items-center -mx-3">
                                        <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                            <input name="ebook_source"
                                                class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                                type="file" placeholder="e-book file">
                                        </div>
                                    </div>
                                    @error('title')
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </template>


                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b  border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Category</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-3">
                            <div class="max-w-xl">
                                <div
                                    class="relative block px-4 w-full text-sm text-black placeholder-gray-700 rounded-lg flex flex-col gap-2">
                                    <select
                                        class="w-full py-2 rounded-lg border-2 border-black outline-none capitalize"
                                        id="category" name="category">
                                        <option selected disabled>Select Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</optionv>
                                        @endforeach

                                    </select>
                                    <div>
                                        <a class="inline-block py-2 mr-3 text-xs leading-normal bg-green-400 rounded-3xl p-3 text-center text-black font-bold transition duration-200 hover:bg-green-700 hover:text-white"
                                            href="{{ route('admin.category.create') }}">Add Category</a>
                                    </div>

                                </div>
                                @error('type')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Publication Year</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="published_year"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-00 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
                                    </div>
                                </div>
                            </div>
                            @error('published_year')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Publisher</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="publisher"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Text">
                                    </div>
                                </div>
                                @error('publisher')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Accession Number</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="accession_number"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="{{ $accession_number }}"
                                            value="{{ $accession_number }}">
                                    </div>
                                </div>
                                @error('accession_number')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Edition Number</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="edition_number"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
                                    </div>
                                </div>
                                @error('edition_number')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Call Number</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="call_number"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
                                    </div>
                                </div>
                                @error('call_number')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">ISBN</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0" id="ISBN">
                                        <input name="ISBN"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number"
                                            maxlength="13">
                                    </div>
                                </div>
                                @error('ISBN')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Pages</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="pages"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
                                    </div>
                                </div>
                                @error('pages')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Number of Copy</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="copy"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
                                    </div>
                                </div>
                                @error('copy')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-start -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-5 sm:mb-0">
                            <span class="block mt-2 text-sm font-medium text-black">Description</span>
                            {{-- <span class="text-xs text-black">Lorem ipsum dolor sit amet</span> --}}
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <textarea name="description"
                                    class="block h-56 py-4 px-3 w-full text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg resize-none"
                                    id="formInput1-9" type="text" placeholder="Write the description"></textarea>
                            </div>
                            @error('description')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap items-start -mx-4 pb-8 mb-8 border-b border-black border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-5 sm:mb-0">
                            <span class="block mt-2 text-sm font-medium text-black">Bibliography Notes</span>
                            {{-- <span class="text-xs text-black">Lorem ipsum dolor sit amet</span> --}}
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <textarea name="bibliography"
                                    class="block py-4 px-3 w-full text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black rounded-lg resize-none"
                                    id="formInput1-9" type="text" placeholder="Biblio"></textarea>
                            </div>
                            @error('bibliography')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Course</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-4">
                            <div class="max-w-xl">
                                <div
                                    class="relative block px-3 w-full text-sm text-black placeholder-gray-700 rounded-lg">
                                    <select class="w-full py-2 px-2 rounded-lg border-1 border-black outline-none"
                                        id="formInput1-6" name="course">
                                        <option selected value="">Select Course</option>
                                        <option class="bg-white" value="Bachelor of Secondary Education">Bachelor of
                                            Secondary Education</option>
                                        <option class="bg-white" value="BS Business Management">BS Business Management
                                        </option>
                                        <option class="bg-white" value="BS Computer Science">BS Computer Science
                                        </option>
                                        <option class="bg-white" value="BS Criminology">BS Criminology</option>
                                        <option class="bg-white" value="BS Hospitality Management">BS Hospitality
                                            Management</option>
                                        <option class="bg-white" value="BS Information Technology">BS Information
                                            Technology</option>
                                        <option class="bg-white" value="BS Psychology">BS Psychology</option>
                                        <option class="bg-white" value="Non-specific">Non-specific</option>
                                    </select>
                                </div>
                                @error('course')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="w-full sm:w-auto pl-full pt-5 mb-20">
                <div class="pl-98 pr-0 ml-98 mr-0">
                    <a class="inline-block py-2 mr-3 text-xs w-32 leading-normal bg-red-600 rounded-3xl p-3 text-center text-white font-bold transition duration-200 hover:bg-red-500 hover:text-black"
                        href="{{ route('admin.books.index') }}">Cancel</a>
                    <button
                        class="inline-block py-2 px-4 text-xs w-32 leading-normal bg-green-600 text-white hover:bg-green-500 hover:text-black rounded-3xl p-3 text-center text-black font-bold transition duration-200"
                        type="submit">Upload</button>
                </div>
            </div>
            </form>
        </div>
        </div>

        @push('js')
            <script>
                const bookDynamicForm = () => ({
                    bookType: null,
                    sourceType: null,
                    image: null,
                    getBookType(e) {
                        const type = e.target.value;
                        if (type !== 'e-Book' || this.bookType !== null) {
                            this.bookType = null
                            this.sourceType = null
                            return
                        }
                        console.log('book Type function')
                        this.bookType = type;
                    },
                    selectSourceType(e) {
                        const srcType = e.target.value;
                        this.sourceType = srcType;
                    },
                    uploadHanlder(e) {
                        const {
                            files
                        } = e.target;

                        const reader = new FileReader();
                        let image = null;
                        reader.onload = () => {
                            this.image = reader.result;
                            let image = document.getElementById('previewImage').src = reader.result;
                            console.log(image,this.image);
                        }

                        reader.readAsDataURL(files[0])
                    },
                    removeImage() {
                        const imagePriview = document.getElementById('previewImage');
                        const imageInput = document.getElementById('image').value = null;
                        this.image = null;
                        imagePriview.src = ''
                    }
                });



                // function imageUploadHandler() {
                //     return {
                //         bookType : null,
                //         eBookFieldToggle : false,
                //         getBookType(e){
                //             const type = e.target.value;
                //            if(type !== 'e-Book') return

                //           this.bookType = type;
                //         },
                //         uploadHanlder(e) {
                //             const {
                //                 files
                //             } = e.target;

                //             const reader = new FileReader();
                //             let image = null;
                //             reader.onload = function() {
                //                 let image = document.getElementById('previewImage').src = reader.result;
                //                 console.log(image)
                //             }

                //             reader.readAsDataURL(files[0])
                //         },
                //         removeImage() {
                //             const imagePriview = document.getElementById('previewImage');
                //             const imageInput = document.getElementById('image').value = null

                //             imagePriview.src = ''
                //         }
                //     }
                // }
            </script>
        @endpush
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addAuthorButton = document.getElementById('addAuthorButton');
            var authorFieldsContainer = document.getElementById('authorFieldsContainer');
            var authorCount = 2; // Initial count of author fields

            addAuthorButton.addEventListener('click', function(e) {
                e.preventDefault();
                var authorField = document.createElement('div');
                authorField.classList.add('max-w-xl', 'mb-4');
                authorField.innerHTML = `
                <input class="block py-4 px-3 w-full text-sm text-black placeholder-black font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg" id="formInput${authorCount}-3" type="text" placeholder="Author ${authorCount}">
            `;
                authorFieldsContainer.appendChild(authorField);
                authorCount++;
            });

            removeAuthorButton.addEventListener('click', function(e) {
                e.preventDefault();
                var authorFields = authorFieldsContainer.getElementsByClassName('max-w-xl');
                if (authorFields.length > 0) {
                    authorFields[authorFields.length - 1].remove();
                    authorCount--;
                }
            });
        });
    </script>
    <script>
        const categorySelect = document.getElementById('type');
        const isbnField = document.getElementById('ISBN');

        categorySelect.addEventListener('change', () => {
            if (categorySelect.value === 'thesis') {
                isbnField.style.display = 'none';
            } else {
                isbnField.style.display = 'block';
            }
        });
    </script>
    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 3000);
    </script>
</x-app-layout>
