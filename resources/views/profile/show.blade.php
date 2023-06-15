<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="flex justify-center items-center pt-28">
            <img src="{{asset('img/userp.png')}}" class="flex justify-center items-center">
        </div>
        {{-- <div class = "flex justify-center items-center pt-5">
            <a href="{{route('profile.edit')}}"> <button class="btn btn-ghost">Edit Profile</button></a>
        </div>href="{{route('profile.edit')}}" --}}
        <div class='flex items-center justify-center'>
            <div class="m-5">
                <a href="{{route('profile.edit')}}">
                <button class="flex p-2.5 bg-green-500 rounded-xl hover:rounded-3xl hover:bg-green-600 transition-all duration-300 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg> Edit Profile
                </button>
                </a>
            </div>
        </div>
        {{-- {{-- <div class="h-[50rem ] w-2/3 center bg-white drop-shadow-sm flex space-x-2 rounded-lg">
            <div class="w-1/3 h-[30rem]">
                <img src="{{asset('img/userp.png')}}">
            </div>
            <div class="w-full flex flex-col space-y-5 h-[30rem] capitalize text-black">
                <div class="flex flex-row-reverse">
                   <a href="{{route('profile.edit')}}"> <button class="btn btn-ghost">Edit</button></a>
                </div>
                {{-- <div class="flex space-x-5 p-5">
                    <h1 class="font-semibold"><span class="text-gray-600 font-normal">Student Number :
                        </span>{{ $profile->profile->student_id }}</h1>
                </div>
                <div class="flex space-x-5 p-5">
                    <h1 class="font-semibold"><span class="text-gray-600 font-normal">Last name :
                        </span>{{ $profile->profile->last_name   }}</h1>
                    <h1 class="font-semibold"> <span class="text-gray-600 font-normal">First name :
                        </span>{{ $profile->profile->first_name }}</h1>
                    <h1 class="font-semibold"><span class="text-gray-600 font-normal">Middle name :
                        </span>{{ $profile->profile->middle_name }}</h1>
                </div>
                <div class="flex space-x-5 p-5">
                    <h1 class="font-semibold"><span class="text-gray-600 font-normal">Gender :
                        </span>{{ $profile->profile->gender }}</h1>
                </div>
                <div class="flex space-x-5 p-5">
                    <h1 class="font-semibold"><span class="text-gray-600 font-normal">Address:
                        </span>
                        {{ $profile->profile->street }} {{ $profile->profile->village }} {{ $profile->profile->municipality }} {{ $profile->profile->province }} {{ $profile->profile->zip_code }}
                    </h1>
                </div>
            </div>
        </div> --}}
    </div>

    <!--Personal Info -->
    <div class="my-4 grid grid-cols-1 gap-4 md:grid-cols-2 2xl:flex 2xl:space-x-4">
        <div class="w-3/6 pl-5">
            <div class="bg-white rounded-lg shadow-xl p-8">
            <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
            <!-- Personal Info content -->
             <ul class="mt-2 text-gray-700">
                        <li class="flex border-y py-2">
                            <span class="font-bold w-24">Full name:</span>
                            </span>{{ $profile->profile->first_name }}</h1> </span>{{ $profile->profile->middle_name }}</h1> </span>{{ $profile->profile->last_name}}</h1>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Student No: </span>
                            </span>{{ $profile->profile->student_id }}</h1>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Joined:</span>
                            <span class="text-gray-700">10 Jan 2022 (25 days ago)</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Mobile:</span>
                            <span class="text-gray-700">09569659562</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Email:</span>
                            <span class="text-gray-700">amandaross@example.com</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Address:</span>
                            </span>
                        {{ $profile->profile->street }} {{ $profile->profile->village }} {{ $profile->profile->municipality }} {{ $profile->profile->province }} {{ $profile->profile->zip_code }}
                    </h1>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Gender:</span>
                            </span>{{ $profile->profile->gender }}</h1>
                        </li>
                    </ul>
            </div>
        </div>

        {{-- Activity Log --}}
        <div class="w-3/6 pr-5">
            <div class="bg-white rounded-lg shadow-xl p-8">
            <h4 class="text-xl text-gray-900 font-bold">Activity log</h4>
            <!-- Activity log content -->
            <div class="relative px-4">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-green-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Profile informations changed.</p>
                                <p class="text-xs text-gray-500">3 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-green-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Borrowed <a href="#" class="text-blue-600 font-bold">Understanding the Self</a>.</p>
                                <p class="text-xs text-gray-500">15 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-green-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Invoice <a href="#" class="text-blue-600 font-bold">#4563</a> was created.</p>
                                <p class="text-xs text-gray-500">57 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-green-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#" class="text-blue-600 font-bold">Cecilia Hendric</a>.</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-green-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">New order received <a href="#" class="text-blue-600 font-bold">#OR9653</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-green-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#" class="text-blue-600 font-bold">Jane Stillman</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
