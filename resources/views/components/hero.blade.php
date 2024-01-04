<section class="w-full pt-16 text-gray-600 body-font bg-bottom bg-no-repeat bg-bgmain"
    style="background-image: url('../img/wave (7).svg');">

    <div class="w-full container mx-auto flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-8 lg:px-28 py-16 pb-44">

        <div class="lg:max-w-lg w-full md:w-3/6 pt-5 pb-10">
            <img class="object-cover object-center rounded shadow-2xl sm:flex-shrink" alt="hero"
                src="{{ asset('img/cover.jpg') }}">
        </div>

        <div class="lg:flex-grow w-full lg:pr-0 md:pr-4 flex flex-col items-center md:items-start text-center md:text-left">
            <h1 class="text-3xl md:text-4xl lg:text-5xl mb-4 font-medium text-gray-900 md:w-3/4 lg:w-full">
                Cavite State University - Bacoor Campus Library
            </h1>
            <p class="text-lg md:w-3/4 lg:w-full leading-relaxed mb-8">The Bacoor City Campus Library is located at the Second
                Floor of the Cavite State University – Bacoor City Campus, Phase 2, Soldiers Hills IV, Molino VI, Bacoor
                City, Cavite.</p>
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                <a href="{{ route('books.browse') }}" role="button" class="button-name md:w-36">I'm a guest</a>
                @if (!Auth::user())
                    <a href="{{ route('login') }}" class="button2 border border-yellowmain md:w-36">Login</a>
                @endif
            </div>
        </div>
    </div>

</section>

<!-- First Section -->
<section class="text-gray-600 body-font h-auto sm:flex-shrink-0 bg-bluemain">
    <div class="container px-5 mx-auto lg:px-28 py-16 md:py-0">
        <div class="flex flex-wrap">
            <div class="p-4 sm:w-full md:w-1/2">
                <div class="h-full bg-white shadow-2xl p-8 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-900 mb-4" viewBox="0 0 975.036 975.036">
                        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                    </svg>
                    <p class="leading-relaxed mb-6 text-justify">To support the institution’s mission in its commitment that can produce individuals with truth, excellence, and service in any phases and trends of life.</p>
                    <a class="inline-flex items-center"><br><br><br><br><br>
                        <img alt="testimonial" src="{{ asset('img/logo.png') }}" class="w-12 h-12 mt-8 rounded-full flex-shrink-0 object-cover object-center">
                        <span class="flex-grow flex flex-col pl-4">
                            <span class="text-gray-900 text-sm mt-8">CAVITE STATE UNIVERSITY LIBRARY MISSION</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="p-4 sm:w-full md:w-1/2">
                <div class="h-full bg-white shadow-2xl p-8 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-900 mb-4" viewBox="0 0 975.036 975.036">
                        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                    </svg>
                    <p class="leading-relaxed mb-6 text-justify">To promote the humble existence and importance of library in an
                        institution and to its community through quality education where can develop and produce morally
                        upright and competitive individuals.</p>
                    <a class="inline-flex items-center">
                        <img alt="testimonial" src="{{ asset('img/logo.png') }}" class="w-12 h-12 mt-8 rounded-full flex-shrink-0 object-cover object-center">
                        <span class="flex-grow flex flex-col pl-4">
                            <span class="text-gray-900 text-sm mt-8">CAVITE STATE UNIVERSITY LIBRARY VISION</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Second Section -->
<section class="text-gray-600 body-font h-auto sm:flex-shrink-0 bg-bluemain">
    <div class="container px-5 mx-auto lg:px-28 py-16 md:py-0">
        <div class="flex flex-wrap">
            <div class="p-4 sm:w-full md:w-1/2">
                <h1 class="flex justify-center text-white text-lg"><b>Virtual Tour at Cavite State University - Bacoor Campus</b></h1>
                <div class="flex justify-center h-full w-full p-2 rounded">
                    <iframe class="w-full aspect-[10/5] mb-10" src="https://www.youtube.com/embed/OoPI-7mHO9s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="p-4 sm:w-full md:w-1/2">
                <h1 class="flex justify-center text-white text-lg"><b>The History of Cavite State University - Bacoor Campus</b></h1>
                <div class="flex justify-center h-full w-full p-2 rounded">
                    <iframe class="w-full aspect-[10/5] mb-10"  src="https://www.youtube.com/embed/OoPI-7mHO9s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
