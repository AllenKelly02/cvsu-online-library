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
                    <input type="text" name="search" class="border-gray-300 rounded w-1/2 text-black" placeholder="Type here..">
                    <button type="buttonh"
                        class="px-4 py-2 rounded bg-yellowmain hover:bg-yellow-500 text-black">Search</button>
                </div>
            </form>
        </div>
        <div class="w-full h-screen flex flex-wrap gap-2 bg-white rounded-lg justify-center p-4" id="barcode-print-data">
            @forelse ($books as $book)
            <div class="flex flex-col gap-2 px-4 border border-gray-300 rounded p-4">
                {!! DNS1D::getBarcodeHTML($book->accession_number, 'CODABAR') !!}
                <p class="text-black"><b>Accession Number</b> - {{$book->accession_number}}</p>
            </div>
            @empty
            <!-- Add content for when there are no books -->
            @endforelse
        </div>
    </div>




</x-app-layout>
