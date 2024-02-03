<x-app-layout>
    @if (Session::has('message'))
        <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
            <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                {{ Session::get('message') }}</p>
        </div>
    @endif
    <section>
        <div class="px-20 pt-8 mx-auto py-24">
            <div class="flex flex-wrap w-full mb:pt-5 bg-no-repeat"
                style="background-image: url('../img/blob-scene-haikei (9).svg');">
                <div class="lg:w-1/2 w-fulll lg:mb-5">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Borrowed Books</h1>
                    <div class="h-1 w-20 bg-bluemain rounded"></div>
                </div>
            </div>
            <div class="w-full flex items-center justify-end px-4 py-3">
                <form action="" class="w-full">
                    <div class="w-full flex justify-end space-x-3 ">
                        <input type="text" name="search" class="border-gray-300 rounded w-1/2 text-black"
                            placeholder="Type here..">
                        <button type="buttonh"
                            class="px-4 py-2 rounded bg-yellowmain hover:bg-yellow-500 text-black">Search</button>
                    </div>
                </form>

            </div>
            <!-- Filter Program/Course -->
            <div class="relative flex flex-wrap ml-1 -m-4 py-5 z-50 gap-2">

                <form action="{{ route('admin.getAllBorrowedBooks') }}" method="get"
                    class="w-full h-auto flex items-center p-2 space-x-2">
                    <select class="select select-primary w-full max-w-xs text-black bg-white border-gray-300"
                        name="filter" style="border-color: black;" id="courseSelect">
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

                    <button
                        class="button-name text-black uppercase bg-yellowmain hover:bg-yellowmain focus:ring-4 focus:ring-yellowmain font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                        onclick="filterAndChangeHeader()">Filter by Program</button>
                </form>

            </div>
            <div class="flex flex-col space-y-2 p-4">
                <div class="relative overflow-x-auto w-full h-[35rem] bg-white drop-shadow-lg sm:rounded-lg">
                    <table class="w-full table-auto text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-100 text-center">
                            <tr>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Book title
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="w-[5%] px-6 py-3">
                                    Student ID
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Program
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Borrowed date
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Returned date
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Due Date
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Duration
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Penalty Payment
                                </th>
                                {{-- <th scope="col" class="w-[10%] px-6 py-3">
                                    Book Condition
                                </th> --}}
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($bookIssuings as $bookIssuing)
                                <tr class="bg-white border-b text-center">
                                    <th scope="row" class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->book->title }}
                                    </th>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->user->name }}
                                    </td>
                                    <td class="w-[5%] px-6 py-3">
                                        {{ $bookIssuing->user->profile->student_id }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->user->profile->course }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->borrowed_date }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->returned_date }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->total_days }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->created_at->diffForHumans() }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->penalty_payment }}
                                    </td>
                                    {{-- <td class="w-full px-6 py-3">
                                        <form action="{{route('admin.returned-book', ['id' => $bookIssuing->id])}}" method="post">
                                            @csrf
                                            <select id="bookCondition" name="bookCondition" class="mt-1 block w-full py-2 px-3 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Good">Book in Good Condition</option>
                                                <option value="Fair">Book in Fair Condition (minimal damage)</option>
                                                <option value="Poor">Book in Poor Condition (major damage)</option>
                                            </select>
                                        </form>
                                    </td> --}}
                                    <td class="w-[10%] px-6 py-3" x-data="{ toggle: false }">

                                        <button class="button-name" @click="toggle = true">
                                            Return
                                        </button>

                                        <div x-show="toggle"
                                            class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-auto
                                            bg-gray-100 rounded-lg shadow-2xl flex flex-col space-y-5 p-5"
                                            x-cloak>
                                            <h1 class="text-lg font-bold">What is the condition of the book? </h1>
                                            <div class="flex justify-end items-center">
                                                <form
                                                    action="{{ route('admin.returned_book', ['id' => $bookIssuing->id]) }}"
                                                    method="post" class="flex flex-col gap-2">
                                                    @csrf
                                                    <select id="bookCondition" name="book_condition"
                                                        class="mt-1 block w-full py-2 px-3 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="Good">Book in Good Condition</option>
                                                        <option value="Fair">Book in Fair Condition (minimal damage)
                                                        </option>
                                                        <option value="Poor">Book in Poor Condition (major damage)
                                                        </option>
                                                        <option value="Paid with good condtion">Book in Good Condition
                                                            with paid penalty</option>
                                                        <option value="Paid with fair condition">Book in Fair Condition
                                                            (minimal damage) with paid penalty
                                                        </option>
                                                    </select>
                                                    <div class="flex justify-end items-center gap-1">
                                                        <button class="justify-between buttonh text-white bg-green-600">
                                                            SUBMIT
                                                        </button>
                                                        <div class="flex items-center space-x-5 pl-5">
                                                            <a class="buttonh text-white bg-red-500"
                                                                @click="toggle = false">Cancel</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="mt-36 ml-96 flex justify-center">
                                            <div class="alert alert-warning px-10 py-10 h-10 w-96">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="stroke-current shrink-0 h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                                <span>No Borrowed Books</span>
                                                <a class=" text-xm text-black underline object-center"
                                                    href="{{ route('admin.books.index') }}">See More Books</a>
                                            </div>
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
        // Remove the alert message after seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert-success').remove();
        }, 3000);
    </script>
</x-app-layout>
