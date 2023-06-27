<x-app-layout>
    <section>
        <div class="px-20 pt-8 mx-auto py-24">
            <div class="flex flex-wrap w-full mb:pt-5 bg-no-repeat"
                style="background-image: url('../img/blob-scene-haikei (9).svg');">
                <div class="lg:w-1/2 w-fulll lg:mb-5">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Borrowed Books</h1>
                    <div class="h-1 w-20 bg-bluemain rounded"></div>
                </div>
            </div>
            <div class="flex flex-col space-y-2 p-4">
                <div class="relative overflow-x-auto w-full h-[35rem] bg-white drop-shadow-lg sm:rounded-lg">
                    <table class="w-full table-auto text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-100 text-center">
                            <tr>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Book title
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="w-[5%] px-6 py-3">
                                    Student ID
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Course
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Borrowed date
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Returned date
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Due Date
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Days Borrowed
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Penalty Payment
                                </th>
                                <th scope="col" class="w-[10%] px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>

                            @forelse ($bookIssuings as $bookIssuing)
                                <tr class="bg-white border-b text-center">
                                    <th scope="row" class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->book->title }}
                                    </th>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->user->name }}
                                    </td>
                                    <td class="w-[5%] px-6 py-3">
                                        {{ $bookIssuing->user->profile->student_id }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->user->profile->course }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->borrowed_date }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->returned_date }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->total_days }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->created_at->diffInDays() }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        {{ $bookIssuing->penalty_payment }}
                                    </td>
                                    <td class="w-[10%] px-6 py-3">
                                        <form action="{{route('admin.returned-book', ['id' => $bookIssuing->id])}}" method="post">
                                            @csrf
                                            <button class="button-name">
                                                Return
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="mt-36 ml-96 flex justify-center">
                                            <div class="alert alert-warning px-10 py-10 h-10 w-96">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="stroke-current shrink-0 h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                                <span>No Borrowed Books</span>
                                                <a class=" text-xm text-black underline object-center"
                                                    href="{{ route('admin.books.index') }}">See More Books</a>
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
