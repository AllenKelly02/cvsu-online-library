<x-guest-layout>
    <div>
        <section class="text-gray-600 body-font bg-white">
            <div class="container px-5 py-24 mx-auto">
                {{-- <div class="flex flex-wrap w-full mb-20">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy</h1>
            <div class="h-1 w-20 bg-indigo-500 rounded"></div>
        </div>
        <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
        </div> --}}
                <div class="flex flex-wrap -m-4">
                    @forelse ($books as $book)
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg">

                                @if ($book->image !== null)
                                    <img class="h-70 rounded w-full object-cover object-center mb-6"
                                        src="{{ url($book->image) }}" alt="content">
                                @else
                                    <img class="h-70 rounded w-full object-cover object-center mb-6"
                                        src="{{ asset('img/b1.jpg') }}" alt="content">
                                @endif

                                <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{$book->author}}
                                </h3>
                                <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">{{$book->title}}</h2>
                                <p class="truncate leading-relaxed text-base">{{$book->description}}</p>
                            </div>
                        </div>

                    @empty

                    no item
                    @endforelse


                </div>
            </div>
        </section>
</x-guest-layout>
