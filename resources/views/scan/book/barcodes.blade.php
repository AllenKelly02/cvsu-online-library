<x-app-layout>

    <div class="px-20 mt-5" x-data="printBarcode">
        <div class="flex justify-end p-2">
            <button class="flex gap-2 buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out" @click="printElement()">
                <span><i class="fi fi-rr-download"></i></span> Download
            </button>
        </div>

        <div class="w-full flex items-center justify-end px-4 py-3 border-b border-black mb-5">
            <form action="" class="w-full">
                <div class="w-full flex justify-end space-x-3 ">
                    <a class=" text-xm text-black underline object-center flex flex-col items-center justify-center hover:text-bluemain hover:text-bold" href="{{route('admin.books.barcodes')}}">Refresh page</a>
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2 text-black" placeholder="Type here..">
                    <button type="buttonh"
                        class="px-4 py-2 rounded bg-yellowmain hover:bg-yellow-500 text-black">Search</button>
                </div>
            </form>

        </div>
        <div class="w-full flex flex-wrap gap-2 bg-white rounded-lg justify-center p-4" id="barcode-print-data">
            @forelse ($books as $book)
            <div class="flex flex-col gap-2 px-4 border border-gray-300 rounded p-4">
                {!! DNS1D::getBarcodeHTML($book->accession_number, 'CODABAR') !!}
                <p class="text-black"><b>Accession Number</b> - {{$book->accession_number}}</p>
            </div>
            @empty
                    <div class="flex justify-center">
                        <div class="alert alert-warning px-10 py-10 h-10 w-96">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="stroke-current shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>No Barcode Available</span>
                            <a class=" text-xm text-black underline object-center"
                                href="{{route('admin.books.barcodes')}}">Refresh page</a>
                        </div>
                    </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
