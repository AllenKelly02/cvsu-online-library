<x-app-layout>
    <div class="pt-5 pl-20">
        @auth
            @if (Auth::user()->role === 'admin')
                <a class="cta" href="{{ route('admin.books.index') }}">
                    <span class="black">Back</span>
                </a>
            @else
                <a class="cta" href="{{ route('user.catalog') }}">
                    <span class="black">Back</span>
                </a>
            @endif
        @endauth
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success shadow-lg w-80 ml-60 animate-bounce">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="ml-5 w-full h-[25rem] rounded-lg bg-white flex justify-center items-center">
                <form action="{{ route('admin.book.import.upload') }}" method="POST" class="w-1/4 p-8 rounded-md shadow-md">
                    @csrf
                    <div class="flex justify-between items-center mb-4">
                        <label for="excelFile" class="text-lg font-medium">Upload Excel</label>
                        <a href="{{ asset('excel/BookTemplate.xlsx') }}" download class="buttonh w-full md:w-auto px-6 py-2.5 bg-yellowmain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellowmain active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fi fi-rr-download items-center"></i> Template
                        </a>
                    </div>

                    <input type="file" id="excelFile" class="input w-full bg-gray-50 p-2" name="books" placeholder="Upload Excel File">
                    
                    @if($errors->has('books'))
                        <p class="text-xs text-error">{{ $errors->first('books') }}</p>
                    @endif

                    <button class="buttonh w-full md:w-auto px-6 py-2 mt-5 bg-green-500 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-500 active:shadow-lg transition duration-150 ease-in-out">Import</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2000);
    </script>
</x-app-layout>
