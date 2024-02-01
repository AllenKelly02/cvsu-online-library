<x-app-layout>
    <section>
        <div class="pt-5 pl-10">
            @auth
                @if (Auth::user()->role === 'admin')
                    <a class="cta" href="{{ route('admin.verified-accounts') }}">
                        <span class="black">Back</span>
                    </a>
                @else
                    <a class="cta" href="{{ route('user.catalog') }}">
                        <span class="black">Back</span>
                    </a>
                @endif
            @endauth
        </div>
        <div class="mx-auto ml-20 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                @if (Session::has('message'))
                    <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                        <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                            {{ Session::get('message') }}</p>
                    </div>
                @endif
                <div class="shadow-md sm:rounded-lg">
                    <form class="flex w-full flex-col gap-2 bg-gray-50 p-2" action="{{route('admin.update-account', ['id' => $user->id])}}" method="POST">
                        @csrf
                        <h1 class="text-3xl font-bold">
                            Edit profile
                        </h1>
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
                            @if($errors->has('password'))
                                <p class="text-xs text-error">{{$errors->firsT('password')}}</p>
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
                                    name="course" >
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
                                <input type="text" name="student_id" placeholder="{{ $user->profile->student_id }}"
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
                                    <input type="text" name="contact_numbe" placeholder="{{ $user->profile->contact_number }}"
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
        // Remove the alert message after 3 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 3000);
    </script>
</x-app-layout>
