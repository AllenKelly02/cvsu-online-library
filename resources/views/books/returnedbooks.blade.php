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

                        {{-- <button
                            class="flex gap-2 buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out"
                            @click="exportToExcel">
                            <span><i class="fi fi-rr-download"></i></span> Export to Excel
                        </button> --}}
                        <button
                            class="flex gap-2 buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md
                            hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg
                            transition duration-150 ease-in-out"
                            @click="printTableData">
                            <span><i class="fi fi-rr-download"></i></span> Download
                        </button>
                    </div>
                </div>
                <!-- Filter Program/Course -->
                <div class="relative flex flex-wrap ml-1 -m-4 py-5 z-50 gap-2">

                    <form action="{{route('admin.getAllReturnedBooks')}}" method="get" class="w-full h-auto flex items-center p-2 space-x-2">
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

                            {{-- <option>Lost</option>
                            <option>Breaking Bad</option>
                            <option>Walking Dead</option> --}}
                          </select>

                          <button class="button-name text-black uppercase bg-yellowmain hover:bg-yellowmain focus:ring-4 focus:ring-yellowmain font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                          onclick="filterAndChangeHeader()">Filter by Program</button>
                    </form>
                    <!-- Dropdown menu -->
                    {{-- <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4 overflow-y-auto max-h-48 w-32"
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
                <div class="flex flex-col p-4 " id="returnedbooks-print-data" x-data="printReturnedBooks">
                    <div class="h-auto w-full flex justify-center">
                            <div id="print-logo" class="print-logo hidden items-center justify-center mt-4">
                                <div class="flex items-center">
                                    <!-- Logo on the left -->
                                    <img class="w-36 h-auto" src="{{ asset('img/logo.png') }}" alt="">

                                    <!-- Text on the right -->
                                    <div class="ml-4 text-center">
                                        <p class="text-black">Republic of the Philippines</p>
                                        <b>
                                            <p class="text-black">CAVITE STATE UNIVERSITY</p>
                                        </b>
                                        <p class="text-black"><b>Bacoor City Campus</b></p>
                                        <p class="text-black">SHIV, Molino VI, City of Bacoor</p>
                                        <p class="text-black">🕾 (046) 476-5029</p>
                                        <p class="text-black"><i class="mdi mdi-email-outline text-black text-lg px-1"></i>cvsubacoor@cvsu.edu.ph</p>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <script>
                        async function filterAndChangeHeader() {
                          var selectedCourse = document.getElementById('courseSelect').value;

                          // Perform AJAX request or other asynchronous operation here
                          // Replace the following with your actual logic
                          try {
                            // Simulating an asynchronous operation with a timeout
                            await new Promise(resolve => setTimeout(resolve, 2000));

                            // Update the header after the asynchronous operation is completed
                            document.getElementById('header').innerText = 'Monthly Borrowed Books of ' + selectedCourse;
                          } catch (error) {
                            console.error('An error occurred:', error);
                          }
                        }
                      </script>
                    <div class="relative overflow-x-auto w-full h-auto bg-white rounded-2xl">
                        <div class="text-lg font-bold text-black p-2 flex justify-between bg-white">
                            <h1 id="header sticky top-0 z-50">Monthly Borrowed Books</h1>
                            <p class="sticky top-0 z-50">Date Issued : {{now()->format('F d, Y')}}</p>
                        </div>
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
                                        Penalty Payment
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        Penalty Status
                                    </th>
                                    <th scope="col" class="w-[10%] px-6 py-3 text-black">
                                        FeedBack
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($returnedBooks->count())
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
                                            {{ $returnedBook->penalty_payment }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->penalty_status }}
                                        </td>
                                        <td class="w-[10%] px-6 py-3 text-black">
                                            {{ $returnedBook->book_condition }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">
                                            <div class="my-10 mx-auto flex justify-center">
                                                <div class="alert alert-warning px-10 py-10 h-10 w-96">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="stroke-current shrink-0 h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                    <span>No Record Found</span>
                                                    <a class=" text-xm text-black underline object-center"
                                                        href="{{ route('admin.books.index') }}">See More Books</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                @endif
                            </tbody>
                        </table>
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
