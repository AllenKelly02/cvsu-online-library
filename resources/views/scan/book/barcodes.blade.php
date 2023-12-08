<x-app-layout>

    <div class="px-20 mt-5" x-data="printBarcode">

        <div class="flex justify-end p-2">
            <button class="flex gap-2 btn btn-ghost" @click="printElement()"><span><i class="fi fi-rr-download"></i></span> Download</button>
        </div>
        <div class="w-full h-screen flex flex-wrap gap-2 bg-white rounded-lg justify-center p-4" id="barcode-print-data">

            @forelse ($books as $book)
            <div class="flex flex-col gap-2">
               {!! DNS1D::getBarcodeHTML($book->ISBN, 'CODABAR')  !!}
               <p>ISBN - {{$book->ISBN}}</p>
            </div>
            @empty

            @endforelse

        </div>
    </div>



</x-app-layout>