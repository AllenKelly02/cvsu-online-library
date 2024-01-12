<x-app-layout>
    <section>
        <div class="mx-auto ml-20 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-100 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Student ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sex
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($accounts as $account)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $account->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $account->profile->student_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account->profile->sex }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account->email }}
                                    </td>
                                    <td class="flex items-center px-6 py-4 space-x-3">
                                        <form>
                                            {{-- @csrf --}}
                                            <button class="font-medium text-white py-2 px-4 rounded-full bg-blue-400 hover:bg-blue-500">Edit</button>
                                        </form>
                                        <form action="{{route('admin.delete-account', ['id' => $account->id])}}" method="post">
                                            @csrf
                                             <button class="font-medium text-white py-2 px-4 rounded-full bg-red-500 hover:bg-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @if (Session::has('message'))
                                    <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-99999">
                                        <p class="alert alert-success shadow-lg w-96 text-center animate-bounce">{{ Session::get('message') }}</p>
                                    </div>
                                @endif
                            @empty
                            <div class="m-auto mt-36">
                                <div class="alert alert-warning px-10 py-10 h-10 w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <span>No Verified Accounts Available</span>
                                </div>
                            </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2200);
    </script>
</x-app-layout>
