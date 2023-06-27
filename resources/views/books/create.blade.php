<x-app-layout>
    <section class="py-3 px-32 items-center justify-center bg-no-repeat">
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
                    <div class="alert alert-success shadow-lg animate-bounce">
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
                                <div class="flex flex-wrap items-center -mx-4">
                                    <div class="w-full sm:w-1/2 px-3 mb-3 sm:mb-0">
                                        <input type="file" name="image" id="image" placeholder="Image" @change="uploadHanlder($event)" class="w-96 file-input file-input-bordered file-input-info max-w-xs bg-white" />
                                    </div>

                                </div>
                                <div class="relative space-y-3">
                                    <img src="" alt="" id="previewImage" class="h-full w-auto mb-5 py-3">
                                    <a hef="#" class="absolute top-1 left-1 bg-yellowmain rounded-full text-black px-1 w-8 text-center cursor-pointer" @click="removeImage()">X</a>
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
                            <a id="addAuthorButton"class="inline-block py-2 mr-3 text-xs leading-normal bg-yellowmain rounded-3xl p-3 text-center text-black font-bold transition duration-200 hover:bg-yellow-500"
                                href="#">Add Author</a>
                            <a id="removeAuthorButton"class="inline-block py-2 mr-3 text-xs leading-normal bg-yellowmain rounded-3xl p-3 text-center text-black font-bold transition duration-200 hover:bg-yellow-500"
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
                                        class="w-full py-2 rounded-lg border-2 border-black outline-none capitalize"
                                        id="type" name="type">
                                        <option selected value="">Select Type</option>
                                        <option class="bg-white" value="audio">Audio/Visuals</option>
                                        <option class="bg-white" value="book">Book</option>
                                        <option class="bg-white" value="e-Book">E-Book</option>
                                        <option class="bg-white" value="e-Journal">E-Journal</option>
                                        <option class="bg-white" value="journal">Journal</option>
                                        <option class="bg-white" value="clippings">New Clippings</option>
                                        <option class="bg-white" value="other">Other</option>
                                        <option class="bg-white" value="publications">Publications</option>
                                        <option class="bg-white" value="references">References</option>
                                        <option class="bg-white" value="software">Software</option>
                                        <option class="bg-white" value="thesis">Thesis</option>
                                    </select>
                                </div>
                                @error('type')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 pb-8 mb-8 border-b  border-opacity-20">
                        <div class="w-full sm:w-1/3 px-4 mb-4 sm:mb-0">
                            <span class="text-sm font-medium text-black">Category</span>
                        </div>
                        <div class="w-full sm:w-2/3 px-3">
                            <div class="max-w-xl">
                                <div
                                    class="relative block px-4 w-full text-sm text-black placeholder-gray-700 rounded-lg">
                                    <select
                                        class="w-full py-2 rounded-lg border-2 border-black outline-none capitalize"
                                        id="category" name="category">
                                        <option selected value="">Select Category</option>
                                        <option class="bg-white" value="10th">10th</option>
                                        <option class="bg-white" value="1st ed.">1st ed.</option>
                                        <option class="bg-white" value="2nd">2nd</option>
                                        <option class="bg-white" value="2nd ed.">2nd ed.</option>
                                        <option class="bg-white" value="3rd">3rd</option>
                                        <option class="bg-white" value="4th ed.">4th ed.</option>
                                        <option class="bg-white" value="5th">5th</option>
                                        <option class="bg-white" value="5th ed.">5th ed.</option>
                                        <option class="bg-white" value="6th">6th</option>
                                        <option class="bg-white" value="8th ed.">8th ed.</option>
                                        <option class="bg-white" value="9th">9th</option>
                                        <option class="bg-white" value="Agriculture sciences, life sciences and biosciences">Agriculture sciences, life sciences and biosciences</option>
                                        <option class="bg-white" value="Arts">Arts</option>
                                        <option class="bg-white" value="Basic and applied sciences">Basic and applied sciences</option>
                                        <option class="bg-white" value="BSCS-Thesis">BSCS-Thesis</option>
                                        <option class="bg-white" value="Business Management">Business Management</option>
                                        <option class="bg-white" value="Criminology">Criminology</option>
                                        <option class="bg-white" value="Education">Education</option>
                                        <option class="bg-white" value="Ethics">Ethics</option>
                                        <option class="bg-white" value="Fiction/Non-Fiction">Fiction/Non-Fiction</option>
                                        <option class="bg-white" value="Filipiniana">Filipiniana</option>
                                        <option class="bg-white" value="Gender-Focused">Gender-Focused</option>
                                        <option class="bg-white" value="General Education">General Education</option>
                                        <option class="bg-white" value="General reference books">General reference books</option>
                                        <option class="bg-white" value="Geography">Geography</option>
                                        <option class="bg-white" value="History">History</option>
                                        <option class="bg-white" value="History: America">History: America</option>
                                        <option class="bg-white" value="Hotel and Restaurant Management">Hotel and Restaurant Management</option>
                                        <option class="bg-white" value="Humanities">Humanities</option>
                                        <option class="bg-white" value="ICT in Education">ICT in Education</option>
                                        <option class="bg-white" value="Information Technology">Information Technology</option>
                                        <option class="bg-white" value="Language">Language</option>
                                        <option class="bg-white" value="Law, criminology and forensics">Law, criminology and forensics</option>
                                        <option class="bg-white" value="Logic">Logic</option>
                                        <option class="bg-white" value="Management">Management</option>
                                        <option class="bg-white" value="Philosophy">Philosophy</option>
                                        <option class="bg-white" value="Psychology">Psychology</option>
                                        <option class="bg-white" value="Religion">Religion</option>
                                        <option class="bg-white" value="Research Book">Research Book</option>
                                        <option class="bg-white" value="Reserve">Reserve</option>
                                        <option class="bg-white" value="Science">Science</option>
                                        <option class="bg-white" value="Science and Technology">Science and Technology</option>
                                        <option class="bg-white" value="Science-Mathematics">Science-Mathematics</option>
                                        <option class="bg-white" value="Social Science">Social Science</option>
                                        <option class="bg-white" value="Social Science and Humanities">Social Science and Humanities</option>
                                        <option class="bg-white" value="Social Science-Business">Social Science-Business</option>
                                        <option class="bg-white" value="Social Sciences">Social Sciences</option>
                                        <option class="bg-white" value="Sociology">Sociology</option>
                                        <option class="bg-white" value="Technology">Technology</option>
                                        <option class="bg-white" value="Thesis-BSBM">Thesis-BSBM</option>
                                        <option class="bg-white" value="Thesis-BSIT">Thesis-BSIT</option>
                                        <option class="bg-white" value="Tourism and hotel management">Tourism and hotel management</option>
                                        <option class="bg-white" value="Travel Guide Book">Travel Guide Book</option>
                                        <option class="bg-white" value="Values">Values</option>
                                        <option class="bg-white" value="vol. 2">vol. 2</option>
                                        <option class="bg-white" value="Women's Studies LGBT Gender Studies Feminism">Women's Studies LGBT Gender Studies Feminism</option>
                                    </select>
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
                                            id="formInput1-1" type="text" placeholder="Number" minlength="13" maxlength="13">
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
                                    <select
                                        class="w-full py-2 rounded-lg border-2 border-black outline-none"
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
                    <a class="inline-block py-2 mr-3 text-xs w-32 leading-normal bg-yellowmain rounded-3xl p-3 text-center text-black font-bold transition duration-200 hover:bg-yellow-500"
                        href="{{ route('admin.books.index') }}">Cancel</a>
                    <button
                        class="inline-block py-2 px-4 text-xs w-32 leading-normal border-yellowmain hover:border-yellowmain hover:bg-yellowmain hover:text-black hover:border-[2px] border-[1px] rounded-3xl p-3 text-center text-black font-bold transition duration-200"
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
        }, 2200);
    </script>
</x-app-layout>
