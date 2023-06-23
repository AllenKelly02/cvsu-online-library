<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24">
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-5">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Borrowed Books</h1>
                <div class="h-1 w-20 bg-green-900 rounded"></div>
            </div>
        </div>
        <div class="flex flex-col space-y-2 p-4">
            <div class="h-[35rem] bg-white overflow-x-auto shadow-md sm:rounded-lg">
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
                            <th scope="col" class="px-6 py-3">
                                Returned date
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($bookIssuings as $bookIssuing)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $bookIssuing->book->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $bookIssuing->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $bookIssuing->user->profile->student_id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $bookIssuing->borrowed_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $bookIssuing->returned_date }}
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
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <span>No Borrowed Books </span>
                                            <a class=" text-xm text-black underline object-center"
                                                href="{{ route('user.catalog') }}">See More Books</a>
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
</x-app-layout>
