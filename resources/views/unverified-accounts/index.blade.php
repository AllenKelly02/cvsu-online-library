<x-app-layout>
    <section>
        <div class="container mx-auto ml-12 mt-8">
            <div class="flex flex-col space-y-2 p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            @forelse($accounts as $account)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $account['studentId'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account['sex'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account['email'] }}
                                    </td>

                                   <td class="flex items-center px-6 py-4 space-x-3">
                                       <form method="POST" action="account/accept/{{$account->id}}">
                                        @csrf
                                        <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accept</a>
                                       </form>
                                       <form method="GET" action="account/reject/{{$account->id}}">
                                        @csrf
                                        <a class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                                       </form>
                                    </td>
                                </tr>
                                @empty
                                No item
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
