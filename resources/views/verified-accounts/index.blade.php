<x-app-layout>
    <section>
        <div class="mx-auto ml-5 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                <div class="lg:w-1/2 w-fulll lg:mb-0 mx-2">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Verified Accounts</h1>
                    <div class="h-1 w-20 bg-bluemain rounded"></div>
                </div>
                <div class="overflow-x-auto shadow-md sm:rounded-2xl w-full h-full lg:h-screen flex flex-col gap-2 overflow-y-auto mx-auto"
                    style="height: 780px">
                            <table class="w-full text-sm text-left text-black h-2">
                                <thead class="text-xs text-black uppercase bg-blue-200 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Student ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Sex
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($accounts as $account)
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $account->name }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $account->profile->student_id }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $account->profile->sex }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $account->email }}
                                            </td>

                                            <td class="flex justify-center px-6 py-4 space-x-3">
                                                <form>
                                                    {{-- @csrf --}}
                                                    <button
                                                        class="font-medium text-white py-2 px-4 rounded-full bg-blue-400 hover:bg-blue-500">Edit</button>
                                                </form>
                                                <form
                                                    action="{{ route('admin.delete-account', ['id' => $account->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="font-medium text-white py-2 px-4 rounded-full bg-red-500 hover:bg-red-600">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            <div class="alert alert-warning text-center flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                                <span class="text-left">No Category Availbable</span>
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
    <script>
        // Remove the alert message after 5 seconds (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2200);
    </script>
</x-app-layout>
