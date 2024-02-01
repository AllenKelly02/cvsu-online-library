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
        @if (Session::has('message'))
            <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                    {{ Session::get('message') }}</p>
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
        // Remove the alert message after 3 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 3000);
    </script>
</x-app-layout>
