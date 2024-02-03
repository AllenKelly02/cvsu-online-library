<x-app-layout>
    @if (Session::has('message'))
        <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
            <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                {{ Session::get('message') }}</p>
        </div>
    @endif
    <section>
        <div class="mx-auto ml-5 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                <div class="lg:w-1/2 w-fulll lg:mb-0 mx-2">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Verified Accounts</h1>
                    <div class="h-1 w-20 bg-bluemain rounded"></div>
                </div>
                <div class="w-full flex items-center justify-end px-4 py-3">
                    <form action="" class="w-full">
                        <div class="w-full flex justify-end space-x-3 ">
                            <input type="text" name="search" class="border-gray-300 rounded w-1/2 text-black" placeholder="Type here..">
                            <button type="buttonh"
                                class="px-4 py-2 rounded bg-yellowmain hover:bg-yellow-500 text-black">Search</button>
                        </div>
                    </form>

                </div>
                <!-- Filter Program/Course -->
                <div class="relative flex flex-wrap ml-1 -m-4 py-5 z-50 gap-2">
                    <form action="{{route('admin.verified-accounts')}}" method="get" class="w-full h-auto flex items-center p-2 space-x-2">
                        <select class="select select-primary w-full max-w-xs text-black bg-white border-gray-300" name="filter" style="border-color: black;" id="courseSelect">
                            <option selected value="">Select Course</option>
                            <option class="bg-white" value="BSE">📚 Bachelor of Secondary Education
                            </option>
                            <option class="bg-white" value="BSBM">📚 BS Business Management</option>
                            <option class="bg-white" value="BSCS">📚 BS Computer Science</option>
                            <option class="bg-white" value="BSC">📚 BS Criminology</option>
                            <option class="bg-white" value="BSHM">📚 BS Hospitality Management
                            </option>
                            <option class="bg-white" value="BSIT">📚 BS Information Technology
                            </option>
                            <option class="bg-white" value="BSP">📚 BS Psychology</option>
                        </select>

                          <button class="button-name text-black uppercase bg-yellowmain hover:bg-yellowmain focus:ring-4 focus:ring-yellowmain font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                          onclick="filterAndChangeHeader()">Filter by Program</button>
                    </form>
                </div>
                <div class="overflow-x-auto shadow-md sm:rounded-2xl w-full h-full lg:h-screen flex flex-col gap-2 overflow-y-auto mx-auto"
                    style="height: 780px">
                            <table class="w-full text-sm text-left text-black h-2">
                                <thead class="text-xs text-black uppercase bg-blue-200 ">
                                        <tr>
                                            <?php
                                        $count = 1;
                                        ?>

                                        <th scope="col" class="px-6 py-3 text-center">
                                            No.
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Student ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Sex
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Program
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($accounts as $account)
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $count++ }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $account->name }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $account->profile->student_id }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $account->profile->sex }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $account->profile->course }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $account->email }}
                                            </td>

                                            <td class="flex justify-center px-6 py-4 space-x-3" x-data="{ toggle: false }">
                                                <form  action="{{route('profile.show', ['id' => $account->id])}}"
                                                    method="Get">
                                                    @csrf
                                                    <button
                                                        class="font-medium text-white py-2 px-4 rounded-full bg-blue-400 hover:bg-blue-500">Edit</button>
                                                </form>
                                                <button class="font-medium text-white py-2 px-4 rounded-full bg-red-500 hover:bg-red-600" @click="toggle = true">
                                                    Delete
                                                </button>
                                                <div x-show="toggle"
                                                class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-auto
                                                bg-gray-100 rounded-lg shadow-2xl flex flex-col space-y-5 p-5"
                                                x-cloak>
                                                <h1 class="text-lg font-bold">Reason for deleting this account? </h1>
                                                    <form action="{{ route('admin.delete-account', ['id' => $account->id]) }}" method="post"
                                                        class="flex flex-col gap-2">
                                                        @csrf
                                                        <textarea id="reason" name="reason"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                            placeholder="Enter the reason..."></textarea>
                                                        <div class="flex justify-end items-center gap-1">
                                                            <button type="submit" class="buttonh text-white bg-green-600">
                                                                SUBMIT
                                                            </button>
                                                            <div class="flex items-center space-x-5 pl-5">
                                                                <a class="buttonh text-white bg-red-500" @click="toggle = false">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            <div class="alert alert-warning text-center flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                                <span class="text-left">No Accounts Available</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
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
