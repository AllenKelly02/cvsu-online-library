<x-app-layout>
    <div class="pt-5 pl-20">
        @auth
            @if (Auth::user()->role === 'admin')
                <a class="cta" href="{{ route('admin.books.create') }}">
                    <span class="black">Back</span>
                </a>
            @else
                <a class="cta" href="{{ route('user.catalog') }}">
                    <span class="black">Back</span>
                </a>
            @endif
        @endauth
    </div>
    <div class="px-20 flex flex-col gap-2">
        @if (session()->has('message'))
            <div class="flex justify-center alert alert-success shadow-lg w-80 ml-60 animate-bounce">
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
        <div class="flex space-x-5 p-5 justify-center">
            <a href="{{ route('admin.category.index') }}" class="buttonh w-full md:w-auto px-6 py-2.5 bg-bluemain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-bluemain hover:shadow-lg focus:bg-bluemain focus:shadow-lg focus:outline-none focus:ring-0 active:bg-bluemain active:shadow-lg transition duration-150 ease-in-out">View Categories</a>
            <a href="{{ route('admin.category.create') }}" class="buttonh w-full md:w-auto px-6 py-2.5 bg-green-400 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-500 hover:shadow-lg focus:bg-green-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-500 active:shadow-lg transition duration-150 ease-in-out">Create Category</a>
        </div>
        <div class="w-full h-screen flex flex-col gap-2 items-center py-10 ">
            <form class="w-96 rounded-lg shadow-2xl flex flex-col gap-2 p-5" method="POST"
                action="{{ route('admin.category.store') }}">
                @csrf
                <h1 class="text-center w-full font-bold text-lg text-black">Add Category</h1>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-black px-1">Name of Category</label>
                    <input type="text" name="name" class="input bg-white border border-bluemain" placeholder="Input a new category...">
                    @if ($errors->has('name'))
                        <p class="text-error text-xs">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <button class="buttonh w-full md:w-auto px-6 py-2.5 mt-5 bg-green-400 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-500 hover:shadow-lg focus:bg-green-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-500 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
            </form>
        </div>
    </div>

    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2000);
    </script>
</x-app-layout>
