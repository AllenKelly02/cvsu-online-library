<x-app-layout>

    <section>
        <div class="px-20 pt-8 mx-auto py-24">
            <div class="flex flex-wrap w-full mb:pt-5 bg-no-repeat"
                style="background-image: url('../img/blob-scene-haikei (9).svg');">
                <div class="lg:w-1/2 w-fulll lg:mb-5">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Returned Books</h1>
                    <div class="h-1 w-20 bg-bluemain rounded"></div>
                </div>
            </div>

            <div x-data="printReturnedBooks">
                <div class="flex justify-end pr-4 py-2">
                    <div class="flex items-center gap-5">

                        <button
                            class="flex gap-2 buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out"
                            @click="exportToExcel">
                            <span><i class="fi fi-rr-download"></i></span> Export to Excel
                        </button>
                        <button
                            class="flex gap-2 buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out"
                            @click="printTableData">
                            <span><i class="fi fi-rr-download"></i></span> Print
                        </button>
                    </div>



                </div>
                <!-- Filter Program/Course -->
                <div class="relative flex flex-wrap ml-1 -m-4 py-5 z-50 gap-2">

                    <form action="{{route('admin.getAllReturnedBooks')}}" method="get" class="w-full h-auto flex items-center p-2">
                        <select class="select select-primary w-full max-w-xs bg-white" name="filter">
                            <option disabled selected>Select Course</option>
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

                            {{-- <option>Lost</option>
                            <option>Breaking Bad</option>
                            <option>Walking Dead</option> --}}
                          </select>

                          <button class="btn btn-primary">Filter</button>
                    </form>
                    {{-- <button
                        class="button-name text-black bg-yellowmain hover:bg-yellowmain focus:ring-4 focus:ring-yellowmain font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                        onclick="toggleDropdown()">Filter by Program <svg class="w-4 h-4 ml-2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4 overflow-y-auto max-h-48 w-32"
                        id="dropdown">
                        <ul class="py-1" aria-labelledby="dropdown">
                            <a href="{{ route('admin.getAllReturnedBooks') }}"
                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100">
                                All
                            </a>
                            </li>
                            <li>
                                @foreach ($returnedBooks as $index => $returnedBook)
                                    <a href="{{ route('admin.getAllReturnedBooks') . '?course=' . $returnedBook->course }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 z-100">
                                        {{ $returnedBook->user->profile->course }}
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <div class="flex flex-col p-4" id="returnedbooks-print-data">
                    <div class="h-auto w-full flex justify-center bg-white rounded-t-lg">
                        <div class="w-auto h-auto flex items-center p-2">
                            <img src="{{ asset('img/logo.png') }}" alt="" srcset="" class="h-24 w-auto">
                            <div class="flex flex-col gap-2 p-2">
                                <p class="text-black text-xs">Republic of the Philippines</p>
                                <h1 class="text-black text-3xl font-bold">CAVITE STATE UNIVERSITY</h1>
                                <p class="text-black text-xs">Bacoor City Campus SHIV, Molino VI, City of Bacoor</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-lg font-bold text-black p-2 flex justify-between bg-white">
                        <h1>Monthly Borrowed Books</h1>
                        <p>Date Issued : {{now()->format('F d, Y')}}</p>
                    </div>
                    <div class="relative overflow-x-auto w-full max-h-[35rem] bg-white">
                        <table class="w-full table-auto text-sm text-left text-gray-500" id="returnedbooks-print-data">
                            <thead class="text-xs text-gray-700 uppercase bg-blue-100 text-center">
                                <tr>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Accession No.
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Book title
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        User
                                    </th>
                                    <th scope="col" class="w-[5%] px-6 py-3 text-black">
                                        Student ID
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Program
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Borrowed date
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Returned Date
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Duration
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Penalty Payment
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        FeedBack
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($returnedBooks as $index => $returnedBook)
                                    <tr class="bg-white border-b text-center">
                                        <td scope="row" class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->book->accession_number }}
                                        </td>
                                        <td scope="row" class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->book->title }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->user->name }}
                                        </td>
                                        <td class="w-[5%] px-6 py-3 text-black">
                                            {{ $returnedBook->user->profile->student_id }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->user->profile->course }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->borrowed_date }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->returned_date }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->created_at->diffForHumans() }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->penalty_payment }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->book_condition }}
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
                                                    <span>No Returned Books</span>
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
                    <div class="flex justify-end bg-white rounded-b-lg">
                        <div class="flex flex-col gap-2 pt-24 px-2 pb-2">
                            <p class="border-b-2 border-black"></p>
                            <h1 class="font-bold text-black">
                               <span>Prepared By: </span> {{Auth::user()->name}}
                            </h1>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script>
        // const printReturnedBooks = () => ({
        //     exportToExcel() {
        //         const table = document.getElementById('returnedbooks-print-data');
        //         const ws = XLSX.utils.table_to_sheet(table);
        //         const wb = XLSX.utils.book_new();
        //         XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        //         /* generate XLSX file and send to client */
        //         XLSX.writeFile(wb, 'returned_books.xlsx');
        //     },
        //     printTableData() {
        //         const table = document.getElementById('returnedbooks-print-data');
        //         var options = {
        //             filename: 'Borrowed Books.pdf',
        //             jsPDF: {
        //                 unit: 'mm',
        //                 format: 'a4',
        //                 orientation: 'portrait'
        //             }
        //         };

        //         html2pdf(table, options);
        //     }
        // })
        // Alpine.data('printReturnedBooks', () => ({
        //     exportToExcel() {
        //         const table = document.getElementById('returnedbooks-print-data');
        //         const ws = XLSX.utils.table_to_sheet(table);
        //         const wb = XLSX.utils.book_new();
        //         XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        //         /* generate XLSX file and send to client */
        //         XLSX.writeFile(wb, 'returned_books.xlsx');
        //     },
        //     printTable() {
        //         const table = document.getElementById('returnedbooks-print-data');
        //         var options = {
        //             filename: 'Borrowed Books.pdf',
        //             jsPDF: {
        //                 unit: 'mm',
        //                 format: 'a4',
        //                 orientation: 'portrait'
        //             }
        //         };

        //         html2pdf(table, options);
        //     }
        // }));
    </script>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
