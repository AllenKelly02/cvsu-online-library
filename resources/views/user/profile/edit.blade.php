<x-app-layout>
    <section>
        <div class="pt-5 pl-20">
            @auth
                @if (Auth::user()->role === 'admin')
                    <a class="cta" href="{{ route('profile.show', ['id' => Auth::user()->id]) }}">
                        <span class="black">Back</span>
                    </a>
                @else
                    <a class="cta" href="{{ route('profile.show', ['id' => Auth::user()->id]) }}">
                        <span class="black">Back</span>
                    </a>
                @endif
            @endauth
        </div>
        <div class="mx-auto mt-2">
            @if (session('message'))
                <div class="flex justify-center fixed top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 rounded-md z-50">
                    <p class="flex justify-center alert alert-success shadow-lg w-96 text-center animate-bounce">{{ session('message') }}</p>
                </div>
            @elseif (session('success'))
                <div class="flex justify-center fixed top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 rounded-md z-50">
                    <p class="flex justify-center alert alert-success shadow-lg w-96 text-center animate-bounce">{{ session('message') }}</p>
                </div>
            @elseif (session('status') === 'password-updated')
                <div class="flex justify-center fixed top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 rounded-md z-50">
                    <p class="flex justify-center alert alert-success shadow-lg w-96 text-center animate-bounce">Password has been updated.</p>
                </div>
            @endif
            <div class="flex flex-col space-y-2 p-4 justify-center items-center">
                <div class="shadow-2xl sm:rounded-lg md:w-3/4">
                    <form class="flex w-full flex-col gap-2 p-2"
                        action="/profile/{{ $user->id }}/update" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <h1 class="text-3xl font-bold text-black">
                            Edit profile
                        </h1>

                        <div class="flex items-center justify-center w-full" x-data="imageUploadHandler">

                            <label for="dropzone-file" x-show="image === null"
                                class="relative flex flex-col items-center justify-center w-full h-64 border-2
                                    border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50
                                    hover:bg-gray-100">

                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and
                                        drop</p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="image" type="file" class="hidden" @change="handler($event)" />
                            </label>

                            <template x-if="image !== null">
                                <div class="w-full flex justify-center mt-4 relative bg-white rounded-md shadow-lg">
                                    <div class="w-1/2 relative">
                                        <button class="btn top-2 right-2 absolute" @click="image = null"><i
                                                class="fi fi-rr-circle-xmark"></i></button>

                                        <img :src="image" alt="" class="shadow-lg ml-36 w-96 h-auto">
                                    </div>
                                </div>
                            </template>

                            @error($errors->has('image'))
                                <p class="text-xs text-error">{{ $errors->first('image') }}</p>
                            @enderror
                        </div>

                        {{-- <div class="w-full h-96">
                            {{ $user->id }}
                        </div> --}}

                        <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-lg bg-white">
                            <div class="space-y-2 col-span-full lg:col-span-1">
                                <p class="font-medium">Personal Information</p>
                            </div>
                            <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                                <div class="col-span-full sm:col-span-3">
                                    <label for="first_name" class="text-sm">First name</label>
                                    <input id="first_name" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') ?? $user->profile->first_name }}" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
                                </div>
                                <div class="col-span-full sm:col-span-3">
                                    <label for="last_name" class="text-sm">Last name</label>
                                    <input id="last_name" name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') ?? $user->profile->last_name }}" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
                                </div>
                                <div class="col-span-full sm:col-span-3">
                                    <label for="email" class="text-sm">Email</label>
                                    <input id="email" type="email" name="email" value="{{ $user->email }}" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
                                </div>
                                <div class="col-span-full sm:col-span-3">
                                    <label for="course" class="text-sm">Program</label>
                                    <select class="select select-secondary select-sm w-full h-11 rounded-md border-gray-700 text-gray-900 bg-white focus:outline-none" id="course" name="course">
                                        {{-- <option selected value="">Select Course</option> --}}
                                        <option class="bg-white" value="BSE">📚 Bachelor of Secondary Education
                                        </option>
                                        <option class="bg-white" value="BSBM" {{  $user->course == 'BSBM' ? 'selected' : '' }}>📚 BS Business Management</option>
                                        <option class="bg-white" value="BSCS" {{  $user->course == 'BSCS' ? 'selected' : '' }}>📚 BS Computer Science</option>
                                        <option class="bg-white" value="BSC" {{  $user->course == 'BSC' ? 'selected' : '' }}>📚 BS Criminology</option>
                                        <option class="bg-white" value="BSHM" {{  $user->course == 'BSHM' ? 'selected' : '' }}>📚 BS Hospitality Management</option>
                                        <option class="bg-white" value="BSIT" {{  $user->course == 'BSIT' ? 'selected' : '' }}>📚 BS Information Technology</option>
                                        <option class="bg-white" value="BSP" {{  $user->course == 'BSP' ? 'selected' : '' }}>📚 BS Psychology</option>
                                    </select>
                                </div>
                                <div class="col-span-full">
                                    <label for="address" class="text-sm">Address</label>
                                    <input id="address" name="address" type="text" value="{{ $user->profile->address }}" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="student_id" class="text-sm">Student ID</label>
                                    <input id="student_id" name="student_id" type="text" value="{{ $user->profile->student_id }}" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="sex" class="text-sm">Sex</label>
                                    <select class="select select-secondary select-sm w-full h-11 rounded-md border-gray-700 text-gray-900 bg-white focus:outline-none" id="sex" name="sex">
                                        {{-- <option selected value="">Select Sex</option> --}}
                                        <option class="bg-white" value="Male"  {{  $user->course == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option class="bg-white" value="Female"  {{  $user->course == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="contact_number" class="text-sm">Contact Number</label>
                                    <input id="contact_number" type="text" value="{{ $user->profile->contact_number }}" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
                                </div>
                            </div>
                        </fieldset>
                        <button class="btn btn-sm w-full btn-accent">Save</button>
                    </form>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
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
        <script>
            // Remove the alert message after seconds (adjust the timeout value as needed)
            setTimeout(function() {
                document.querySelector('.alert-success').remove();
            }, 2200);
        </script>
    @endpush

</x-app-layout>
