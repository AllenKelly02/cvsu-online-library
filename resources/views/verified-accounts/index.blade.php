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
                                            <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                        </form>
                                        <div class='flex items-center justify-center'>
                                            <div class="m-5">
                                                <button class="flex p-2.5 bg-blue-500 rounded-xl hover:rounded-3xl hover:bg-blue-600 transition-all duration-300 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                </button>
                                            </div>
                                        </div>
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
