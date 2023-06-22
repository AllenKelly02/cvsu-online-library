<x-app-layout>
    <div class="w-full pt-10 px-5">
        <div class="w-full">
            <h1 class="text-3xl text-black font-bold">
                Request Borrowed Books
            </h1>
        </div>
        <div class="relative overflow-x-auto h-[35rem] bg-white drop-shadow-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Book title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            user
                        </th>
                        <th scope="col" class="px-6 py-3">
                            student id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Borrowed date
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($bookRequest as $request)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $request->book->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $request->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $request->user->profile->student_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $request->borrowed_date }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <div>
                                        <form action="{{route('admin.approvedBorrowedBooks', ['id' => $request->id])}}" method="post">
                                            @csrf
                                            <button class="px-4 py-2 hover:bg-green-600 rounded-lg hover:scale-105 duration-700">
                                                <img src="{{asset('img/check-line.png')}}">
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{route('admin.rejectBorrowedBooks', ['id' => $request->id])}}" method="post">
                                            @csrf
                                            <button class="px-4 py-2 hover:bg-red-600 rounded-lg hover:scale-105 duration-700">
                                                <img src="{{asset('img/close-line.png')}}">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="w-full h-96 flex flex-col items-center justify-center mt-20">
                                    <div class="alert alert-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            class="stroke-current shrink-0 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>No Borrowed Books </span>
                                        <a class=" text-xm text-black underline" href="{{ route('user.catalog') }}">See
                                            More
                                            Books</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
