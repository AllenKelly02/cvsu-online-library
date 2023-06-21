<x-app-layout>
    <section class="py-3 px-32 items-center justify-center">
        <div class="container px-4 mx-auto">
            <div class="p-8 bg-white rounded-xl" x-data="imageUploadHandler">
                <div
                    class="flex flex-wrap items-center justify-between -mx-4 mb-8 pb-6 border-b border-black border-opacity-20">
                    <div class="w-full sm:w-auto px-4 mb-6 sm:mb-0">
                        <h4 class="text-2xl font-bold tracking-wide text-black mb-1">Upload Books</h4>
                        {{-- <p class="text-sm text-black">Lorem ipsum dolor sit amet</p> --}}
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session()->get('message') }}</span>
                        </div>
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
                                <div class="flex flex-wrap items-center -mx-3">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="image"
                                            class="block py-4 px-3 w-96 text-sm text-black file-input-success file-input-bordered  placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
                                            id="image" type="file" placeholder="Image" @change="uploadHanlder($event)">
                                    </div>
                                </div>
                                <div class="relative">
                                    <img src="" alt="" id="previewImage" class="h-36 w-auto">
                                    <a hef="#" class="absolute top-0 left-0 bg-green-600 rounded-full text-white px-1 py" @click="removeImage()">x</a>
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
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
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
                                    class="block py-4 px-3 w-full text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
                                    id="formInput1-3" type="text" placeholder="Author 1">
                                @error('author')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div id="authorFieldsContainer" class="max-w-xl">
                                <!-- JavaScript will add new author input fields here -->
                            </div>
                            <a id="addAuthorButton"class="inline-block py-2 mr-3 text-xs leading-normal bg-green-600 rounded-3xl p-3 text-center text-white font-bold transition duration-200 hover:bg-green-800"
                                href="#">Add Author</a>
                            <a id="removeAuthorButton"class="inline-block py-2 mr-3 text-xs leading-normal bg-green-600 rounded-3xl p-3 text-center text-white font-bold transition duration-200 hover:bg-green-800"
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
                                    <select
                                        class="w-full py-2 rounded-lg border-2 border-black outline-none focus:border-green-500"
                                        id="formInput1-4" name="category">
                                        <option selected value="">Select Type</option>
                                        <option class="bg-white" value="e-Book">E-Book</option>
                                        <option class="bg-white" value="book">Book</option>
                                        <option class="bg-white" value="journal">Journal</option>
                                        <option class="bg-white" value="thesis">Thesis</option>
                                    </select>
                                </div>
                                @error('category')
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
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-00 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
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
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
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
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
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
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
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
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
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
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input name="ISBN"
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
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
                                            class="block py-4 px-3 w-96 text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg"
                                            id="formInput1-1" type="text" placeholder="Number">
                                    </div>
                                </div>
                                @error('pages')
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
                                    class="block h-56 py-4 px-3 w-full text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg resize-none"
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
                                    class="block py-4 px-3 w-full text-sm text-black placeholder-gray-700 font-medium outline-none bg-transparent border border-black hover:border-black focus:border-green-500 rounded-lg resize-none"
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
                                    <select
                                        class="w-full py-2 rounded-lg border-2 border-black outline-none focus:border-green-500"
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
            <div class="w-full sm:w-auto pl-full pr-0">
                <div class="pl-98 pr-0 ml-98 mr-0">
                    <a class="inline-block py-2 mr-3 text-xs leading-normal bg-green-600 rounded-3xl p-3 text-center text-white font-bold transition duration-200 hover:bg-green-800"
                        href="{{ route('admin.books.index') }}">Cancel</a>
                    <button
                        class="inline-block py-2 px-4 text-xs leading-normal border-green-600 hover:border-green-800 hover:bg-green-800 hover:text-white hover:border-[2px] border-[1px] rounded-3xl p-3 text-center text-green-800 font-bold transition duration-200"
                        type="submit">Upload</button>
                </div>
            </div>

            </form>
        </div>
        </div>

        @push('js')
            <script>
                function imageUploadHandler(){
                    return {
                        uploadHanlder(e){
                            const {files} = e.target;

                            const reader = new FileReader();
                            let image = null;
                            reader.onload = function() {
                                let image = document.getElementById('previewImage').src = reader.result;
                                console.log(image)
                            }

                            reader.readAsDataURL(files[0])
                        },
                        removeImage() {
                            const imagePriview = document.getElementById('previewImage');
                            const imageInput = document.getElementById('image').value = null

                            imagePriview.src = ''
                        }
                    }
                }
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
</x-app-layout>
