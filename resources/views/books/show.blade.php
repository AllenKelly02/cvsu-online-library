<x-app-layout>
    <div class="pt-5 pl-20">
        @auth
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.books.index') }}"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-greem-700 dark:focus:ring-green-800">
                    <svg aria-hidden="true" class="w-5 h-5 transform rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            @else
                <a href="{{ route('user.catalog') }}"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-greem-700 dark:focus:ring-green-800">
                    <svg aria-hidden="true" class="w-5 h-5 transform rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            @endif
        @endauth
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif
    <section class="text-gray-600 body-font overflow-hidden">



        <div class="w-full bg-white p-4 flex justify-center">
            <div class="w-5/6 flex gap-4">
                <img alt="ecommerce" class="w-80 h-2/4 object-cover object-center rounded"
                    src="{{ asset('img/b1.jpg') }}" alt="content">

                <div class="w-full">
                    <p>
                        {{ $book->category }}
                    </p>
                    <h1>{{ $book->title }}</h1>
                    <p>{{ $book->author }}</p>
                    <p>
                        {{ $book->published_year }}
                    </p>
                    <p>
                        {{ $book->publisher }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
