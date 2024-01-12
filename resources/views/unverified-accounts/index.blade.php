<x-app-layout>
    @if (Session::has('message'))
        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-99999">
            <p class="alert alert-success shadow-lg w-96 text-center animate-bounce">{{ Session::get('message') }}</p>
        </div>
    @endif
        <div class="mx-auto ml-12 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-200 ">
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
                                    Course
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
                            @forelse($accounts as $account)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $account->student_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account->sex }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account->course}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account['email'] }}
                                    </td>

                                   <td class="flex items-center px-6 py-4 space-x-3">
                                       <form method="POST" action="{{route('admin.accept-account', ['id' => $account->id])}}">
                                        @csrf
                                        <button class="font-medium text-white py-2 px-4 rounded-full bg-green-500 hover:bg-green-600">Accept</button>
                                       </form>
                                       <form method="POST" action="{{route('admin.reject-account', ['id' => $account->id])}}">
                                        @csrf
                                        <button class="font-medium text-white py-2 px-4 rounded-full bg-red-500 hover:bg-red-600">Remove</button>
                                       </form>
                                    </td>
                                     @if (Session::has('message'))
                                        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-99999">
                                            <p class="alert alert-success shadow-lg w-96 text-center animate-bounce">{{ Session::get('message') }}</p>
                                        </div>
                                    @endif
                                    @empty

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
