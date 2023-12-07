<x-app-layout>

    <div class="pl-10 flex flex-col space-y-5">
        <div class="w-full p-2">
            <h1 class="text-center text-xl font-bold">Book - Archive</h1>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                             name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            author
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Reason
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deleted Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                           {{$book->title}}
                        </th>
                        <td class="px-6 py-4">
                           {{$book->author}}
                        </td>
                        <td class="px-6 py-4">
                            {{$book->reason_remove}}
                         </td>
                        <td class="px-6 py-4">
                           {{$book->deleted_at->format('M-d-Y')}}
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        <span>No Archive Data</span>
                      </div>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
