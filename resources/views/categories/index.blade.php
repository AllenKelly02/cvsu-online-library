<x-app-layout>
    <div class="px-5 lg:px-20 flex flex-col gap-2">
        <div class="flex flex-col lg:flex-row lg:space-y-0 lg:space-x-5 pt-5 px-8">
            <a href="{{ route('admin.category.index') }}" class="buttonh w-full md:w-auto px-6 py-2.5 bg-bluemain text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-bluemain hover:shadow-lg focus:bg-bluemain focus:shadow-lg focus:outline-none focus:ring-0 active:bg-bluemain active:shadow-lg transition duration-150 ease-in-out">View Categories</a>
            <a href="{{ route('admin.category.create') }}" class="buttonh w-full md:w-auto px-6 py-2.5 bg-green-400 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-500 hover:shadow-lg focus:bg-green-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-500 active:shadow-lg transition duration-150 ease-in-out">Create Category</a>
        </div>
        @if (session()->has('delete'))
            <div class="fixed my-5 left-1/2 transform -translate-x-1/2">
                <div class="flex items-center justify-center alert alert-success shadow-lg w-80 animate-bounce">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session()->get('delete') }}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="w-full h-full lg:h-screen flex flex-col gap-2 overflow-x-auto lg:p-8 overflow-y-auto mx-auto" style="height: 790px">
            <div class="overflow-x-hidden">
                <div class="flex justify-center ">
                    <table class="w-full text-sm text-left text-black h-2">
                        <thead class="text-xs text-black uppercase bg-blue-100 ">
                            <tr>
                                <th scope="col" class="px-6 py-3 sticky top-0 bg-blue-100">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3 sticky top-0 bg-blue-100">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 sticky top-0 bg-blue-100">
                                    <span class="flex justify-center">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            ?>
                            @forelse ($categories as $category)
                                <tr class="bg-white border-b">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $count++ }}
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        {{ $category->name }}
                                    </td>

                                    <td class="flex justify-center px-6 py-4 space-x-3">

                                        <form action="{{ route('admin.category-delete', ['category' => $category->id]) }}" method="POST">
                                            @csrf
                                             <button type="submit" class="font-medium text-white py-2 px-4 rounded-full bg-red-500 hover:bg-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <div class="m-auto mt-36">
                                <div class="alert alert-warning px-10 py-10 h-10 w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <span>No Categories Available</span>
                                </div>
                            </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 1200);
    </script>
</x-app-layout>




