<x-app-layout>
    <section>
        <div class="mx-auto ml-20 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                @if (session()->has('message'))
                    <div class="alert alert-warning shadow-lg w-80 ml-60 animate-bounce bg-blue-200">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{-- <span>{{ session()->get('warning') }}</span> --}}
                        </div>
                    </div>
                @endif
                <div class="shadow-md sm:rounded-lg">
                    <form class="flex w-full flex-col gap-2 bg-gray-50 p-2"
                        action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <h1 class="text-3xl font-bold">
                            Edit profile
                        </h1>


                        <div class="flex items-center justify-center w-full" x-data="imageUploadHandler">

                            <label for="dropzone-file" x-show="image === null"
                                class="flex flex-col items-center justify-center w-full h-64 border-2
                                 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50
                                 hover:bg-gray-100
                                 ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="image" type="file" class="hidden"
                                    @change="handler($event)" />
                            </label>


                            <template x-if="image !== null">
                                <div class="w-full flex justify-center">
                                    <div class="w-1/2 h-full relative">
                                        <button class="btn top-2 right-2 absolute" @click="image = null"><i
                                                class="fi fi-rr-circle-xmark"></i></button>

                                        <img :src="image" alt="" srcset=""
                                            class="object object-center w-full h-auto">

                                    </div>
                                </div>



                            </template>
                            @error($errors->has('image'))
                                <p class="text-xs text-error">{{ $errors->first('image') }}</p>
                            @enderror
                        </div>


                        <div class="flex flex-col gap-2">
                            <h1 class="text-sm font-bold ">Account Information</h1>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-sm font-thin text-gray-600">username</label>
                                <input type="text" name="name" placeholder="{{ $user->name }}"
                                    class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-sm font-thin text-gray-600">Email</label>
                                <input type="text" name="email" placeholder="{{ $user->email }}"
                                    class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-sm font-thin text-gray-600">Password</label>
                                <input type="password" name="password" placeholder="password"
                                    class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                            </div>
                            @if ($errors->has('password'))
                                <p class="text-xs text-error">{{ $errors->firsT('password') }}</p>
                            @endif
                            {{-- <div class="flex flex-col gap-2">
                                <label for="" class="text-sm font-thin text-gray-600">Confirm Password</label>
                                <input type="password" name="confirmation_password" placeholder="confirm password"
                                    class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                            </div> --}}
                        </div>
                        <div class="flex flex-col gap-2">
                            <h1 class="text-sm font-bold ">Profile Information</h1>

                            <div class="grid grid-cols-3 grid-flow-row w-full gap-5">
                                <div class="flex flex-col gap-2">
                                    <label for="" class="text-sm font-thin text-gray-600">last name</label>
                                    <input type="text" name="last_name" placeholder="{{ $user->profile->last_name }}"
                                        class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="" class="text-sm font-thin text-gray-600">first name</label>
                                    <input type="text" name="first_name"
                                        placeholder="{{ $user->profile->first_name }}"
                                        class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="" class="text-sm font-thin text-gray-600">middle name
                                        (optional)</label>
                                    <input type="text" name="name" placeholder="{{ $user->profile->middle_name }}"
                                        class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-sm font-thin text-gray-600">Course</label>
                                <select class="select select-secondary select-sm bg-gray-100" id="course"
                                    name="course">
                                    <option selected value="">Select Course</option>
                                    <option class="bg-white" value="BSE">📚 Bachelor of Secondary Education
                                    </option>
                                    <option class="bg-white" value="BSBM">📚 BS Business Management</option>
                                    <option class="bg-white" value="BSCS">📚 BS Computer Science</option>
                                    <option class="bg-white" value="BSC">📚 BS Criminology</option>
                                    <option class="bg-white" value="BSHM">📚 BS Hospitality Management</option>
                                    <option class="bg-white" value="BSIT">📚 BS Information Technology</option>
                                    <option class="bg-white" value="BSP">📚 BS Psychology</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-sm font-thin text-gray-600">Address
                                </label>
                                <input type="text" name="address" placeholder="{{ $user->profile->address }}"
                                    class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-sm font-thin text-gray-600">Student Id
                                </label>
                                <input type="text" name="student_id"
                                    placeholder="{{ $user->profile->student_id }}"
                                    class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                            </div>
                            <div class="grid grid-cols-2 grid-flow-row gap-2 w-full">
                                <div class="flex flex-col gap-2">
                                    <label for="" class="text-sm font-thin text-gray-600">Sex
                                    </label>
                                    <select class="select select-secondary select-sm bg-gray-100" id="course"
                                        name="sex">
                                        <option selected value="">Select Sex</option>
                                        <option class="bg-white" value="male">Male
                                        </option>
                                        <option class="bg-white" value="female">Female</option>
                                    </select>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="" class="text-sm font-thin text-gray-600">Contact #
                                    </label>
                                    <input type="text" name="contact_numbe"
                                        placeholder="{{ $user->profile->contact_number }}"
                                        class="input input-sm input-bordered input-secondary w-full bg-gray-100" />
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-sm w-full btn-accent">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2200);
    </script>

    @push('js')
        <script>
            const imageUploadHandler = () => ({
                image: null,
                handler(e) {

                    const {
                        files
                    } = e.target;


                    const reader = new FileReader();

                    reader.onload = function() {
                        this.image = reader.result

                    }.bind(this)


                    reader.readAsDataURL(files[0])
                }
            })
        </script>
    @endpush

</x-app-layout>
