<x-app-layout>

    <div class="px-20 flex flex-col gap-2">
        @if (Session::has('message'))
            <div class="alert alert-success shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ Session::get('message') }}</span>
                </div>
            </div>
        @endif
        <div class="flex space-x-5 p-5">
            <a href="{{ route('admin.category.index') }}" class="btn btn-xs btn-accent">View Categories</a>
            <a href="{{ route('admin.category.create') }}" class="btn btn-xs btn-accent">Create Category</a>
        </div>
        <div class="w-full h-screen flex flex-col gap-2 items-center justify-center">
            <form class="w-96 rounded-lg shadow-lg flex flex-col gap-2 p-5" method="POST"
                action="{{ route('admin.category.store') }}">
                @csrf
                <h1 class="text-center w-full font-bold text-lg text-black">Add Category</h1>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-gray-600">Name</label>
                    <input type="text" name="name" class="input input-accent bg-gray-200" placeholder="name">
                    @if ($errors->has('name'))
                        <p class="text-error text-xs">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <button class="btn btn-accent">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
