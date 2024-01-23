<x-app-layout>
    @auth
        @if (Auth::user()->role === 'admin')
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </x-slot>

            <!-- Personal Info -->
            <div class="min-h-screen w-full flex justify-center items-center">
                <div class="w-full md:w-1/2 lg:w-1/2 xl:w-1/3 h-full flex flex-col gap-5 bg-gray-50 rounded-lg p-4 md:p-8">

                    <div class="flex flex-col md:flex-row gap-2">
                        @if ($profile->profile->avatar !== null)
                            <img src="{{ route('avatar-profile', ['name' => $profile->profile->avatar]) }}"
                                class="flex-shrink-0 object-cover w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 rounded-full border-4 border-white">
                        @else
                            <img src="{{ asset('img/userp.png') }}"
                                class="flex-shrink-0 object-cover w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 rounded-full border-4 border-white">
                        @endif

                        <div class='flex items-center justify-center md:absolute md:right-0 md:top-0 p-2'>
                            <a href="{{ route('profile.edit') }}">
                                <button
                                    class="flex p-2.5 bg-green-500 rounded-xl hover:rounded-3xl hover:bg-green-600 transition-all duration-300 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg> Edit Profile
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-5 w-full">
                        <div class="w-full">
                            <div class="p-4 md:p-8">
                                <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                                <!-- Personal Info content -->
                                <ul class="mt-2 text-gray-700">
                                    <li class="flex border-y py-2">
                                        <span class="font-bold w-24">Full name:</span>
                                        <span>{{ $profile->profile->first_name }} {{ $profile->profile->middle_name }}
                                            {{ $profile->profile->last_name }}</span>
                                    </li>
                                    <li class="flex border-b py-2">
                                        <span class="font-bold w-24">Joined:</span>
                                        <span class="text-gray-700">{{ $profile->created_at->diffInDays() }} Days Ago</span>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </x-slot> --}}


            <div class="min-h-screen w-full flex flex-col justify-center items-center bg-gray-50 rounded-lg mt-5 p-5">
                <!-- Left Section (Avatar and Edit Profile) -->
                <div class="w-full md:w-1/2 lg:w-1/3 border-b-2 border-gray-200 flex flex-col items-center">
                    @if ($profile->profile->avatar !== null)
                        <img src="{{ route('avatar-profile', ['name' => $profile->profile->avatar]) }}" class="w-full h-auto">
                    @else
                        <img src="{{ asset('img/userp.png') }}" class="w-full h-auto">
                    @endif
                    <div class="flex items-center justify-center mt-4">
                        <a href="{{ route('profile.edit') }}">
                            <button class="p-2.5 bg-green-500 rounded-xl hover:rounded-3xl hover:bg-green-600 transition-all duration-300 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg> Edit Profile
                            </button>
                        </a>
                    </div>
                </div>


                      <!-- Right Section (Personal Info and History) -->
                    <div class="w-full md:w-1/2 lg:w-2/3 mt-5 p-5">
                        <!-- Personal Info -->
                        <div class="w-full md:w-2/3 p-8">
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
                                    {{ $profile->profile->address }}
                                    </h1>
                                </li>
                                <li class="flex border-b py-2">
                                    <span class="font-bold w-24">Gender:</span>
                                    </span>{{ $profile->profile->sex }}</h1>
                                </li>
                            </ul>
                        </div>
                    </div>
                        <!-- History -->
                        <div class="p-8 flex flex-col space-y-2" style="width: 10px">
                            <h1 class="font-bold text-black text-lg">
                                History
                            </h1>
                            <div class="relative overflow-x-auto w-full">
                                <table class="w-full text-sm text-left text-gray-500 table-auto">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 sticky top-0">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Date Borrowed
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date returned
                                            </th>
                                            <th scope="col" class="px-6 py-3 sm:w-1/4 md:w-1/5 lg:w-1/5 xl:w-1/5">
                                                Title
                                            </th>
                                            <th scope="col" class="px-6 py-3 md:w-1/5 lg:w-1/5 xl:w-1/5">
                                                Author
                                            </th>
                                            <th scope="col" class="px-6 py-3 md:w-1/5 lg:w-1/5 xl:w-1/5">
                                                Published Year
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Publisher
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bookIssuing as $book)
                                            <tr class="bg-white border-b">
                                                <td scope="row" class="px-6 py-4">
                                                    {{ $book->borrowed_date }}
                                                </td>
                                                <td scope="row" class="px-6 py-4">
                                                    {{ $book->returned_date }}
                                                </td>
                                                <td scope="row" class="px-6 py-4">
                                                    {{ $book->book->title }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $book->book->author }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $book->book->published_year }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $book->book->publisher }}
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
            <!--Personal Info -->
        @endif
    @endauth
</x-app-layout>
