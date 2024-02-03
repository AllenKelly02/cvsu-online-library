<x-app-layout>
    @if (Session::has('message'))
        <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
            <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                {{ Session::get('message') }}</p>
        </div>
    @endif
    <div class="px-20 pt-8 mx-auto py-24">
        <div class="lg:w-1/2 w-fulll lg:mb-5">
            <h1 class="text-3xl text-black font-bold">
                Request Borrowed Books
            </h1>
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

            <form action="{{route('admin.listRequestBorrowedBooks')}}" method="get" class="w-full h-auto flex items-center p-2 space-x-2">
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
        <div class="relative overflow-x-auto h-[35rem] bg-white drop-shadow-lg sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Accession No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Book title
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            user
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            student id
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Program
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Borrowed date
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($bookRequest as $request)
                        <tr class="bg-white border-b text-center">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $request->book->accession_number }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $request->book->title }}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $request->user->name }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $request->user->profile->student_id }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $request->user->profile->course }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $request->borrowed_date }}
                            </td>
                            <td class="px-6 py-4 flex justify-center">
                                <div class="flex gap-2">
                                    <div>
                                        <form action="{{route('admin.approvedBorrowedBooks', ['id' => $request->id])}}" method="post">
                                            @csrf
                                            <button class="font-medium text-white rounded-full w-12 px-4 py-2 bg-green-500 hover:bg-green-600 hover:scale-105 duration-700">
                                                <img src="{{asset('img/check-line.png')}}">
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{route('admin.rejectBorrowedBooks', ['id' => $request->id])}}" method="post">
                                            @csrf
                                            <button class="font-medium text-white rounded-full bg-red-500 w-12 px-4 py-2 hover:bg-red-600 hover:scale-105 duration-700">
                                                <img src="{{asset('img/close-line.png')}}">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" >
                                <div class="mt-36 ml-60 flex justify-center">
                                    <div class="alert alert-info px-10 py-10 h-10 w-96">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            class="stroke-current shrink-0 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>No Incoming Request</span>
                                        <a class=" text-xm text-black underline object-center"
                                            href="{{ route('user.catalog') }}">See More Books</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Remove the alert message (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert-success').remove();
        }, 3000);
    </script>
</x-app-layout>
