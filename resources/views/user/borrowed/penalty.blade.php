<x-app-layout>
    <!DOCTYPE html>
    <html lang="en-PH">
    <body>
        <div class="pt-5 pl-20">
            @auth
                @if (Auth::user()->role === 'admin')

                @else
                    <a class="cta" href="{{ route('user.borrow-history') }}">
                        <span class="black">Back</span>
                    </a>
                @endif
            @endauth
        </div>
    <div x-data="printReceipt">
        <div class="flex flex-col items-center justify-center">
            <div class="min-h-screen flex flex-col justify-center items-center" id="receipt-print-data">
                {{-- <div class="w-full bg-white rounded-2xl max-h-[80rem]">
                    <div class="p-4">
                        <div class="flex items-center justify-center">
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

                        <div class="flex flex-col items-center justify-center my-6">
                            <h1 class="text-3xl italic font-extrabold tracking-widest text-black">Library Penalty Receipt</h1>
                        </div>

                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt">
                                                <strong>&#xa0;</strong>
                                            </p>

                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">

                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:13.45pt">
                                        <td colspan="3"
                                            style="width:178.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black my-2">
                                                <strong>Book Title: </strong> <u>{{ $book->book->title }}</u>
                                            </p>
                                        </td>
                                        <td colspan="4"
                                            style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                <strong>Accession Number: </strong><u>{{$book->book->accession_number}}</u>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:14.15pt">

                                        <td
                                            style="width:106.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                <strong>Borrowed Date: </strong><u>{{ $bookIssuing->borrowed_date }}</u>
                                            </p>
                                        </td>
                                        <td colspan="4"
                                            style="width:106.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                <strong>Date Due: </strong><u>{{$bookIssuing->penalty_date}}</u>
                                            </p>
                                        </td>
                                        <td colspan="2"
                                            style="width:110.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                <strong>Date Returned: </strong><u>{{$bookIssuing->returned_date}}</u>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:13.45pt">
                                        <td colspan="5"
                                            style="width:200.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                            <div
                                                style="width:100%; height:13.45pt; display:inline-block; overflow:visible">
                                                <p style="margin-bottom:0pt; line-height:normal; font-size:8pt">
                                                    <strong>&#xa0;</strong>
                                                </p>
                                                <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                    <span
                                                        style="height:0pt; display:block; position:absolute; z-index:4"><img
                                                            src="1706292433_library-receipt/1706292433_library-receipt-4.png"
                                                            width="10" height="10" alt=""
                                                            style="margin-top:1.75pt; margin-left:33.45pt; margin-right:10.50pt; position:absolute" /></span><strong>Book
                                                        Was:</strong><strong>&#xa0;&#xa0;&#xa0;&#xa0;&#xa0; </strong>Late
                                                    By: <u>{{ $bookIssuing->penalty_date }}</u> Penalty per day: <strong><span
                                                            style="font-family:'Palatino Linotype'; ">₧</span></strong><strong>
                                                    </strong><u>5.00</u>
                                                </p>
                                            </div>
                                        </td>
                                        <td colspan="2"
                                        style="width:120pt; padding-right:1pt; vertical-align:bottom">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                <strong>Penalty: </strong><strong><span
                                                        style="font-family:'Palatino Linotype'; ">₧</span></strong><strong>
                                                </strong><u>{{$bookIssuing->penalty_payment}}</u>
                                            </p>
                                        </td>
                                    </tr>

                        </div>
                    </div>
                </div> --}}
                <!-- component -->

                <div class="flex w-auto h-auto mx-auto justify-center items-center bg-white border border-gray-300 rounded-lg shadow-2xl max-h-[80rem] max-w-lg">
                    <div class="w-full rounded px-6 pt-3">
                        <div class="flex flex-col justify-center items-center gap-0">
                            <img src="{{ asset('img/logo.png') }}" alt="logo" class="mx-auto w-16 py-4" />
                            <p class="text-black mb-1">Republic of the Philippines</p>
                            <b>
                                <p class="text-black mb-1">CAVITE STATE UNIVERSITY</p>
                            </b>
                            <p class="text-black mb-1"><b>Bacoor City Campus</b></p>
                            <p class="text-black mb-1">SHIV, Molino VI, City of Bacoor</p>
                            <p class="text-black mb-1">🕾 (046) 476-5029</p>
                            <p class="text-black mb-1"><i class="mdi mdi-email-outline text-black text-xs px-1"></i>cvsubacoor@cvsu.edu.ph</p>
                        </div>
                    <div class="flex flex-col items-center justify-center my-4">
                        <h1 class="text-lg italic font-extrabold tracking-widest text-black">Library Penalty Receipt</h1>
                    </div>
                    <div class="flex flex-col gap-3 border-b border-black py-2 text-xs text-black">
                        <p class="flex justify-between">
                        <span class="text-black">Date: <u></span>
                        <span id="currentDate" class="text-black"></u></span>
                        </p>
                        <p class="flex justify-between">
                        <span class="text-black">Student name:</span>
                        <span>{{ $book->user->name }}</span>
                        </p>
                        <p class="flex justify-between">
                        <span class="text-black">Student Id:</span>
                        <span>{{ $book->user->profile->student_id }}</span>
                        </p>
                    </div>
                    <div class="flex flex-col gap-3 pb-6 pt-2 text-xs">
                        <table class="w-full text-left text-black">
                        <thead>
                            <tr class="flex space-x-2">
                            <th class="min-w-[110px] py-2">Book Title</th>
                            <th class="min-w-[110px] py-2">Accession Number</th>
                            <th class="min-w-[110px] py-2">Borrowed Date</th>
                            <th class="min-w-[110px] py-2">Returned Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="flex space-x-2">
                            <td class="min-w-[110px]">{{ $book->book->title }}</td>
                            <td class="min-w-[110px]">{{$book->book->accession_number}}</td>
                            <td class="min-w-[110px]">{{ $book->borrowed_date }}</td>
                            <td class="min-w-[110px]">{{$book->returned_date}}</td>
                            </tr>
                        </tbody>
                        </table>
                        <div class="border-b border-black"></div>
                       <span class="text-black"> <b>Penalty per day:</b> <u>₱5.00</u></span>
                        <table class="w-full text-left text-black">
                            <thead>
                                <tr class="flex space-x-2">
                                <th class="min-w-[110px] py-2">Days Due</th>
                                <th class="min-w-[110px] py-2">Penalty Reason</th>
                                <th class="min-w-[88px] py-2">Penalty</th>
                                <th class="min-w-[110px] py-2">Total amount to pay</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="flex space-x-2">
                                <td class="min-w-[110px]">{{ $book->total_days }} days </td>
                                <td class="min-w-[110px]">Late Returned.</td>
                                <td class="min-w-[88px]">₱{{ $book->penalty_payment }}.00</td>
                                <td class="min-w-[110px] bg-red-100 text-center">₱{{ $book->penalty_payment }}.00</td>
                                </tr>
                            </tbody>
                            </table>
                        <div class=" border-b border border-dashed"></div>
                        <div class="py-4 justify-center flex flex-col gap-2">
                        <p class="flex gap-2 text-black">Paid by (Student Signature)</p>
                        <div class="w-44 mt-3 border-b border-black"></div>
                        </div>
                    </div>
                    </div>
                </div>
                <button class="buttonh w-full md:w-auto px-6 gap-2 mt-2 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out"
                    @click="printTableData">
                    <span><i class="fi fi-rr-download"></i></span> Download
                </button>
            </div>
        </div>
    </div>
    </body>
    <script>
        // Get the current date
        var currentDate = new Date();

        // Format the date (e.g., "12/12/2022")
        var formattedDate = (currentDate.getMonth() + 1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear();

        // Update the content of the span element with the formatted date
        document.getElementById('currentDate').textContent = formattedDate;
    </script>
    </html>

</x-app-layout>
