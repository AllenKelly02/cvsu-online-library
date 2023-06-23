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
                               <tr>
                                <td colspan="4">
                                    <div class="w-full h-96 flex flex-col items-center justify-center mt-15 ml-20">
                                        <div class="alert alert-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                class="stroke-current shrink-0 w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <span>No Unverified Account Available </span>
                                            <a class=" text-xm text-black underline object-center"
                                                href="{{ route('admin.verified-accounts') }}">See More Accounts</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
