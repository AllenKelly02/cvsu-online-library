<x-app-layout>
    </html>
    <!DOCTYPE html>
    <html lang="en-PH">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <title>
        </title>
        <style>
            body {
                line-height: 108%;
                font-family: Arial;
                font-size: 11pt
            }

            p {
                margin: 0pt 0pt 8pt
            }

            table {
                margin-top: 0pt;
                margin-bottom: 8ptp
            }

            .ListParagraph {
                margin-left: 36pt;
                margin-bottom: 8pt;
                line-height: 108%;
                font-size: 11pt
            }
        </style>
    </head>

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
        <div class="flex flex-col items-center justify-center pt-10">
            <button class="buttonh w-full md:w-auto px-6 gap-2 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out"
                    @click="printTableData">
              <span><i class="fi fi-rr-download"></i></span> Download
            </button>

            <div class="mt-6 min-h-screen" id="receipt-print-data">
            <div class="w-full bg-white rounded-2xl max-h-[80rem]">
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

                    <div class="flex justify p-4">
                        <div>
                            <h6 class="font-bold text-black">Date : <u><span id="currentDate"
                                        class="text-sm text-black font-medium"></span></u></h6>
                        </div>
                        <div>

                            <table
                                style="margin-right:9pt; margin-left:9pt; margin-bottom:0pt; border-collapse:collapse; float:center" class="mt-5">
                                <tr style="height:17.5pt">
                                    <td colspan="0"
                                        style="width:208.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt">
                                            <strong>&#xa0;</strong>
                                        </p>

                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                            <strong>Student Name: </strong><u>{{ $book?->user?->name }}</u>
                                        </p>
                                    </td>
                                    <td
                                        style="width:103.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                            <strong>Student ID: </strong> <u>{{ $book?->user?->profile?->student_id }}</u>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height:13.45pt">
                                    <td colspan="3"
                                        style="width:178.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black my-2">
                                            <strong>Book Title: </strong> <u>{{ $book?->book?->title }}</u>
                                        </p>
                                    </td>
                                    <td colspan="4"
                                        style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                            <strong>Accession Number: </strong><u>{{$book?->book?->accession_number}}</u>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height:14.15pt">

                                    <td
                                        style="width:106.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                            <strong>Borrowed Date: </strong><u>{{ $book->borrowed_date }}</u>
                                        </p>
                                    </td>
                                    <td colspan="4"
                                        style="width:106.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                            <strong>Date Due: </strong><u>{{$book->penalty_date}}</u>
                                        </p>
                                    </td>
                                    <td colspan="2"
                                        style="width:110.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                            <strong>Date Returned: </strong><u>{{$book->returned_date}}</u>
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
                                                By: <u>{{ $book->penalty_date }}</u> Penalty per day: <strong><span
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
                                            </strong><u>{{$book->penalty_payment}}</u>
                                        </p>
                                    </td>
                                </tr>

                                <tr style="height:14.15pt">
                                    <td colspan="4"
                                        style="width:187.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt">
                                            <strong>&#xa0;</strong>
                                        </p>
                                        <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                            <strong>Total Amount to pay:</strong><strong>&#xa0; </strong><strong><span
                                                    style="font-family:'Palatino Linotype'; ">₧</span></strong>
                                                    <u>{{$book->penalty_payment}}</u>
                                        </p>
                                    </td>
                                    <tr style="height:17.5pt">
                                        <td colspan="0"
                                            style="width:208.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom"  class="mt-11">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt">
                                                <strong>&#xa0;</strong>
                                            </p>
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                <strong>Paid by (student signature): </strong><br><br>___________________________________
                                            </p>
                                        </td>
                                        <td
                                            style="width:103.3pt; padding-right:5.4pt; vertical-align:bottom">
                                            <p style="margin-bottom:0pt; line-height:normal; font-size:8pt" class="text-black">
                                                <strong>Signature Date: </strong><br><br>______________________
                                            </p>
                                        </td>
                                    </tr>
                                </tr>
                            </table>

                        </div>
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
