<x-app-layout>
    <section>
        <div class="mx-auto ml-12 mt-8">
            <div class="flex flex-col space-y-2 p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
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
                            @forelse($accounts as $account)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $account->student_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account['sex'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $account['email'] }}
                                    </td>

                                   <td class="flex items-center px-6 py-4 space-x-3">
                                       <form method="POST" action="{{route('admin.accept-account', ['id' => $account->id])}}">
                                        @csrf
                                        <button class="font-medium text-blue-600 hover:underline">Accept</button>
                                       </form>
                                       <form method="POST" action="{{route('admin.reject-account', ['id' => $account->id])}}">
                                        @csrf
                                        <button class="font-medium text-red-600 hover:underline">Remove</button>
                                       </form>
                                    </td>
                                    @empty
                                <div class="alert alert-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                    <span>No Item</span>
                                  </div>


                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
