<x-app-layout>
    <section>
        <div class="mx-auto ml-5 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                <div class="lg:w-1/2 w-fulll lg:mb-0 mx-2">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Archived Books</h1>
                    <div class="h-1 w-20 bg-bluemain rounded"></div>
                </div>
                <div class="overflow-x-auto shadow-md sm:rounded-2xl w-full h-full lg:h-screen flex flex-col gap-2 overflow-y-auto mx-auto"
                    style="height: 780px">
                            <table class="w-full text-sm text-left text-black h-2">
                                <thead class="text-xs text-black uppercase bg-blue-200 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Author
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Accession Number
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Reason
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Deleted Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($books as $book)
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $book->title }}
                                            </td>
                                            <td class="px-6 py-4 text-center capitalize">
                                                {{ $book->author }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $book->accession_number }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-center">
                                                {{ $book->reason_remove }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $book->deleted_at->format('M-d-Y') }}
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            <div class="alert alert-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                                <span>No Archived Data</span>
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

