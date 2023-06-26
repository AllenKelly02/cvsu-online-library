<x-app-layout>
    @auth
        @if (Auth::user()->role === 'admin')
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </x-slot>

            <!--Personal Info -->
            <section class="text-gray-600 body-font">
                <div class="container mx-auto flex flex-col px-5 py-16 justify-center items-center">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('img/userp.png') }}" class="flex justify-center items-center">
                    </div>
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Profile') }}
                        </h2>
                    </x-slot>
                
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-4">
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Profile Information') }}
                                </h2>
                                <div class="max-w-xl">
                                    <x-input-label for="name" class="ml-1"  :value="__('Name')" />
                                    <input type="text" disabled autocomplete="off" name="author" class="text-left border-bluemain rounded-lg w-full text-black" value="{{ $profile->profile->first_name }} {{ $profile->profile->middle_name }} {{ $profile->profile->last_name }}">    
                                </div>
                                <div class="max-w-xl">
                                    <x-input-label for="name" class="ml-1" :value="__('Sex')" />
                                    <input type="text" disabled autocomplete="off" name="author" class="text-left border-bluemain rounded-lg w-full text-black" value="{{ $profile->profile->sex }}">    
                                </div>
                                <div class="max-w-xl">
                                    <x-input-label for="name" class="ml-1" :value="__('Student ID')" />
                                    <input type="text" disabled autocomplete="off" name="author" class="text-left border-bluemain rounded-lg w-full text-black" value="{{ $profile->profile->student_id }}">    
                                </div>
                                <div class="max-w-xl">
                                    <x-input-label for="name" class="ml-1" :value="__('Course')" />
                                    <input type="text" disabled autocomplete="off" name="author" class="text-left border-bluemain rounded-lg w-full text-black" value="{{ $profile->profile->course }}">    
                                </div>
                                <div class="max-w-xl">
                                    <x-input-label for="name" class="ml-1" :value="__('Email')" />
                                    <input type="text" disabled autocomplete="off" name="author" class="text-left border-bluemain rounded-lg w-full text-black" value="{{ $profile->profile->email }}">    
                                </div>
                                <div class="max-w-xl">
                                    <x-input-label for="name" class="ml-1" :value="__('Contact Number')" />
                                    <input type="text" disabled autocomplete="off" name="author" class="text-left border-bluemain rounded-lg w-full text-black" value="{{ $profile->profile->contact_number }}">    
                                </div>
                                <div class="max-w-xl">
                                    <x-input-label for="name" class="ml-1" :value="__('Address')" />
                                    <input type="text" disabled autocomplete="off" name="author" class="text-left border-bluemain rounded-lg w-full text-black" value="{{ $profile->profile->address }}">    
                                </div>
                            </div>
                
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </x-slot>

            <div>
                <div class="flex justify-center items-center pt-28">
                    <img src="{{ asset('img/userp.png') }}" class="flex justify-center items-center">
                </div>
                <div class='flex items-center justify-center'>
                    <div class="m-10 z-1">
                        <a href="{{ route('profile.edit') }}">
                            <button
                                class="flex p-2.5 bg-green-500 rounded-xl hover:rounded-3xl hover:bg-green-600 transition-all duration-300 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg> Edit Profile
                            </button>
                        </a>
                    </div>
                </div>
            </div>
             Hello

            <!--Personal Info -->
            <div class="my-4 grid grid-cols-1 gap-4 md:grid-cols-2 2xl:flex 2xl:space-x-4">
                <div class="w-3/6 pl-5 grow">
                    <div class="bg-white rounded-lg shadow-xl p-8">
                        <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                        <!-- Personal Info content -->
                        <ul class="mt-2 text-gray-700">
                            <li class="flex border-y py-2">
                                <span class="font-bold w-24">Full name:</span>
                                </span>{{ $profile->profile->first_name }} {{ $profile->profile->middle_name }}
                                {{ $profile->profile->last_name }}</h1>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Student No: </span>
                                </span>{{ $profile->profile->student_id }}</h1>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Joined:</span>
                                <span class="text-gray-700">{{ $profile->created_at->diffInDays() }}Days Ago</span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Mobile:</span>
                                {{-- put contact number here --}}
                                <span class="text-gray-700">09569659562</span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Email:</span>
                                {{-- put email here --}}
                                <span class="text-gray-700">{{ $profile->email }}</span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Address:</span>
                                </span>
                                {{ $profile->profile->street }} {{ $profile->profile->village }}
                                {{ $profile->profile->municipality }} {{ $profile->profile->province }}
                                {{ $profile->profile->zip_code }}
                                </h1>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Gender:</span>
                                </span>{{ $profile->profile->gender }}</h1>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="w-3/6 pr-5">
                    <div class="bg-white rounded-lg shadow-xl p-8 flex flex-col space-y-2 w-full">
                        <h1 class="font-bold text-black text-lg">
                            History
                        </h1>
                        <div class="relative overflow-x-auto h-72 w-[37rem]">
                            <table class="w-full text-sm text-left text-gray-500 table-auto">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 sticky top-0">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Date Borrowed
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            date returned
                                        </th>
                                        <th scope="col" class="px-6 py-3" colspan="5">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3" colspan="2">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3" colspan="2">
                                            Author
                                        </th>
                                        <th scope="col" class="px-6 py-3" colspan="4">
                                            piblished_year
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            piblisher
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($bookIssuing as $book)
                                        <tr class="bg-white border-b ">
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $book->borrowed_date }}
                                            </td>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $book->returned_date }}
                                            </td>
                                            <th scope="row" colspan="5"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $book->book->title }}
                                            </th>
                                            <td class="px-6 py-4" colspan="2">
                                                <p class="truncate w-10">{{ $book->book->description }}</p>
                                            </td>
                                            <td class="px-6 py-4" colspan="2">
                                                <p>{{ $book->book->author }}</p>
                                            </td>
                                            <td class="px-6 py-4" colspan="4">
                                                <p>{{ $book->book->published_year }}</p>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p>{{ $book->book->publisher }}</p>
                                            </td>
                                        </tr>
                                    @empty



                                        <tr>
                                            <td colspan="6">
                                                <h1 class="w-full text-center p-2">No History</h1>

                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            </div>
            </div>
        @endif
    @endauth
</x-app-layout>
