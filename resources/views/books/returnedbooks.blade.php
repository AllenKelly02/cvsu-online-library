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
            {{-- Include this link in your view --}}
            <div x-data="printReturnedBooks">
                <div class="flex justify-end pr-4 py-2">
                    <button
                        class="flex gap-2 buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out"
                        @click="exportToExcel">
                        <span><i class="fi fi-rr-download"></i></span> Export to Excel
                    </button>
                </div>
                <div class="flex flex-col space-y-2 p-4">
                    <div class="relative overflow-x-auto w-full h-[35rem] bg-white drop-shadow-lg sm:rounded-lg">
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
                </div>
            </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script>
         Alpine.data('printReturnedBooks', () => ({
        exportToExcel() {
            const table = document.getElementById('returnedbooks-print-data');
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

            /* generate XLSX file and send to client */
            XLSX.writeFile(wb, 'returned_books.xlsx');
        }
    }));
    </script>
</x-app-layout>
