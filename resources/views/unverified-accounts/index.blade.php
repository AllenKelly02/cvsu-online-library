<x-app-layout>
    @if (Session::has('message'))
        <div class="fixed top-36 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
            <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                {{ Session::get('message') }}</p>
        </div>
    @endif

    <section>
        <div class="mx-auto ml-5 mt-2">
            <div class="flex flex-col space-y-2 p-4">
                <div class="lg:w-1/2 w-fulll lg:mb-0 mx-2">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Unverified Accounts</h1>
                    <div class="h-1 w-20 bg-bluemain rounded"></div>
                </div>
                <div class="overflow-x-auto shadow-md sm:rounded-2xl w-full h-full lg:h-screen flex flex-col gap-2 overflow-y-auto mx-auto"
                    style="height: 780px">
                    <table class="w-full text-sm text-left text-black h-2">
                        <thead class="text-xs text-black uppercase bg-blue-200 ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    STUDENT ID PICTURE / LATEST COR
                                </th>
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
                                    Course
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
                            @forelse($accounts as $account)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 capitalize text-center flex items-center justify-center">
                                        <a href="{{ route('student_cor', ['name' => $account->student_cor]) }}" class="venobox">
                                            <img src="{{ route('student_cor', ['name' => $account->student_cor]) }}" alt="" class="flex flex-col item-center justify-center h-16 w-auto">
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 capitalize text-center">
                                        {{ $account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name }}
                                    </td>
                                    <td class="px-6 py-4 text-center capitalize">
                                        {{ $account->student_id }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $account->sex }}
                                    </td>
                                    <td class="px-6 py-4 capitalize text-center">
                                        {{ $account->course }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $account['email'] }}
                                    </td>
                                    <td class="px-6 py-4 text-center space-y-2">
                                        <form method="POST" action="{{ route('admin.accept-account', ['id' => $account->id]) }}">
                                            @csrf
                                            <button class="font-medium text-white py-2 px-4 rounded-full bg-green-500 hover:bg-green-600">&nbsp;Accept&nbsp;</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.reject-account', ['id' => $account->id]) }}">
                                            @csrf
                                            <button class="font-medium text-white py-2 px-4 rounded-full bg-red-500 hover:bg-red-600">&nbsp;&nbsp;Reject&nbsp;&nbsp;</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap">
                                        <div class="alert alert-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="stroke-current shrink-0 h-6 w-6" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <span>No new registered students</span>
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
        // Remove the alert message (adjust the timeout value as needed)
        setTimeout(function() {
            document.querySelector('.alert-success').remove();
        }, 3000);
    </script>
</x-app-layout>
