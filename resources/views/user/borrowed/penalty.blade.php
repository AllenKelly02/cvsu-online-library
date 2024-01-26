<x-app-layout>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="flex items-center justify-center min-h-screen bg-white">
            <div class="w-3/5 bg-white shadow-2xl">
                <div class="flex justify-center p-4">
                    <div class="text-center flex items-center">
                        <!-- Logo on the left -->
                        <div class="flex justify-between">
                            <img class="w-36 h-auto" src="{{ asset('img/logo.png') }}" alt="">
                        </div>

                        <!-- Text on the right -->
                        <div class="ml-4">
                            <p class="text-black">Republic of the Philippines</p>
                            <b><p class="text-black">CAVITE STATE UNIVERSITY</p></b>
                            <p class="text-black"><b>Bacoor City Campus</b></p>
                            <p class="text-black">SHIV, Molino VI, City of Bacoor</p>
                            <p class="text-black">🕾 (046) 476-5029</p>
                            <p class="text-black"><i class="mdi mdi-email-outline text-black text-lg px-1"></i>cvsubacoor@cvsu.edu.ph</p>

                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center w-full my-6">
                    <h1 class="text-3xl italic font-extrabold tracking-widest text-black mx-auto">Library Penalty Receipt</h1>
                </div>
                <div class="w-full h-0.5 bg-bluemain"></div>
                <div class="flex justify-between p-4">
                    <div>
                        <h6 class="font-bold text-black">Date : <u><span id="currentDate" class="text-sm text-black font-medium"></u></h6>
                    </div>
                    <div class="w-40">
                        <address class="text-sm">
                            <span class="font-bold"> Billed To : </span>
                            Joe Smith
                            795 Folsom Ave
                            San Francisco, CA 94107
                            P: (123) 456-7890
                        </address>
                    </div>
                    <div class="w-40">
                        <address class="text-sm">
                            <span class="font-bold">Ship To :</span>
                            Joe doe
                            800 Folsom Ave
                            San Francisco, CA 94107
                            P: + 111-456-7890
                        </address>
                    </div>
                    <div></div>
                </div>
                <div class="flex justify-center p-4">
                    <div class="border-b border-gray-200 shadow">
                        <table class="">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        #
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Product Name
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Quantity
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Rate
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        1
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            Amazon Brand - Symactive Men's Regular Fit T-Shirt
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">4</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        $20
                                    </td>
                                    <td class="px-6 py-4">
                                        $30
                                    </td>
                                </tr>
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        2
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            Amazon Brand - Symactive Men's Regular Fit T-Shirt
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">2</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        $60
                                    </td>
                                    <td class="px-6 py-4">
                                        $12
                                    </td>
                                </tr>
                                <tr class="border-b-2 whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        3
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            Amazon Brand - Symactive Men's Regular Fit T-Shirt
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">1</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        $10
                                    </td>
                                    <td class="px-6 py-4">
                                        $13
                                    </td>
                                </tr>
                                <tr class="">
                                    <td colspan="3"></td>
                                    <td class="text-sm font-bold">Sub Total</td>
                                    <td class="text-sm font-bold tracking-wider"><b>$950</b></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <th colspan="3"></th>
                                    <td class="text-sm font-bold"><b>Tax Rate</b></td>
                                    <td class="text-sm font-bold"><b>$1.50%</b></td>
                                </tr>
                                <!--end tr-->
                                <tr class="text-white bg-gray-800">
                                    <th colspan="3"></th>
                                    <td class="text-sm font-bold"><b>Total</b></td>
                                    <td class="text-sm font-bold"><b>$999.0</b></td>
                                </tr>
                                <!--end tr-->

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-between p-4">
                    <div>
                        <h3 class="text-xl">Terms And Condition :</h3>
                        <ul class="text-xs list-disc list-inside">
                            <li>All accounts are to be paid within 7 days from receipt of invoice.</li>
                            <li>To be paid by cheque or credit card or direct payment online.</li>
                            <li>If account is not paid within 7 days the credits details supplied.</li>
                        </ul>
                    </div>
                    <div class="p-4">
                        <h3>Signature</h3>
                        <div class="text-4xl italic text-indigo-500">AAA</div>
                    </div>
                </div>
                <div class="w-full h-0.5 bg-indigo-500"></div>

                <div class="p-4">
                    <div class="flex items-center justify-center">
                        Thank you very much for doing business with us.
                    </div>
                    <div class="flex items-end justify-end space-x-3">
                        <button class="px-4 py-2 text-sm text-green-600 bg-green-100">Print</button>
                        <button class="px-4 py-2 text-sm text-blue-600 bg-blue-100">Save</button>
                        <button class="px-4 py-2 text-sm text-red-600 bg-red-100">Cancel</button>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
<script>
    // Get the current date
    var currentDate = new Date();

    // Format the date (e.g., "12/12/2022")
    var formattedDate = (currentDate.getMonth() + 1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear();

    // Update the content of the span element with the formatted date
    document.getElementById('currentDate').textContent = formattedDate;
</script>
</x-app-layout>
