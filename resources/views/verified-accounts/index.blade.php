<x-app-layout>
    <section>
        <div class="container w-auto ml-20 mt-8">
            <div class="flex flex-col space-y-2">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                                        {{ $account->profile->gender }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account->email }}
                                    </td>
                                    <td class="flex items-center px-6 py-4 space-x-3">
                                        <form action="{{route('admin.delete-account', ['id' => $account->id])}}" method="post">

                                            @csrf
                                            <button
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                no item
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
