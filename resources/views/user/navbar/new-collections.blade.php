<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 pt-12 pb-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">New Collections</h1>
                    <div class="h-1 w-20 bg-green-900 rounded"></div>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">

                @forelse ($books as $book)
                    @if ($book->created_at->diffInDays() < 2)
                        <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg">
                                <div class="w-max">
                                    <p class="bg-green-300 text-black text-xs rounded-lg p-2 mb-2 w-auto">
                                        New {{ $book->created_at->diffInDays() }} days Ago
                                    </p>

                                </div>
                                @if ($book->image !== null)
                                    <img class="object-cover h-48 md:h-64 lg:h-96 rounded w-full object-center py-2"
                                        src="{{ url($book->image) }}" alt="content">
                                @else
                                    <img class="object-cover h-48 md:h-64 lg:h-96 rounded w-full object-center py-2"
                                        src="{{ asset('img/b1.jpg') }}" alt="content">
                                @endif

                                <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">
                                    {{ $book->author }}</h3>
                                <span
                                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                    {{ $book->status }}
                                </span>
                                <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">
                                    {{ $book->title }}</h2>
                                <p class="leading-relaxed truncate text-base">{{ $book->description }}</p>
                                <button type="submit"
                                    class="w-50 px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                    View
                                </button>
                            </div>
                        </div>
                    @endif
                @empty
                @endforelse

            </div>
        </div>
    </section>
</x-app-layout>
