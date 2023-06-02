<section class="w-full text-gray-600 body-font bg-bottom bg-no-repeat" style="background-image: url('../img/waves.svg');">

  <div class="w-full container mx-auto flex md:flex-row flex-col items-center space-x-32 md:px-22 lg:px-28 py-16 pb-52">

        <div class="lg:max-w-lg lg:w-96 md:w-1/2 w-5/6 ">
            <img class="object-cover object-center rounded" alt="hero" src="{{ asset('img/liba.png') }}">
        </div>

        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center ">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Cavite State University - Bacoor Campus Library
                {{-- <br class="hidden lg:inline-block">Campus Library --}}
            </h1>
            <p class="mb-8 leading-relaxed">The Bacoor City Campus Library is located at the Second Floor of the Cavite State University – Bacoor City Campus, Phase 2, Soldiers Hills IV, Molino VI, Bacoor City, Cavite.</p>
            <div class="flex justify-center">
                <a href="{{ route('books.browse') }}" class="inline-flex text-white bg-green5 border-0 py-2 px-6 focus:outline-none hover:bg-green3 rounded text-lg">Browse</a>
                <a href="{{ route('login') }}" class="ml-4 inline-flex text-green5 rounded border border-green5 py-2 px-6 focus:outline-none hover:bg-green3 rounded text-lg">Login</a>
            </div>
        </div>
  </div>
</section>

<section class="text-gray-600 body-font bg-green5 h-96">
  <div class="container px-5 mx-auto lg:px-28 py-16 pt-0">
    {{-- <h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">Testimonials</h1> --}}
    <div class="flex flex-wrap ">
      <div class="p-4 md:w-1/2 w-full">
        <div class="h-full bg-gray-100 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <p class="leading-relaxed mb-6">To support the institution’s mission in its commitment that can produce individuals with truth, excellence, and service in any phases and trends of life.</p>
          <a class="inline-flex items-center">
            <img alt="testimonial" src="{{ asset('img/logo.png') }}" class="w-12 h-12 mt-8 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
              {{-- <span class="title-font font-medium text-gray-900">Holden Caulfield</span> --}}
              <span class="text-gray-500 text-sm mt-8">CAVITE STATE UNIVERSITY LIBRARY MISSION</span>
            </span>
          </a>
        </div>
      </div>
      <div class="p-4 md:w-1/2 w-full">
        <div class="h-full bg-gray-100 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <p class="leading-relaxed mb-6">To promote the humble existence and importance of library in an institution and to its community through quality education where can develop and produce morally upright and competitive individuals.</p>
          <a class="inline-flex items-center">
            <img alt="testimonial" src="{{ asset('img/logo.png') }}" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
              {{-- <span class="title-font font-medium text-gray-900">Alper Kamu</span> --}}
              <span class="text-gray-500 text-sm">CAVITE STATE UNIVERSITY LIBRARY VISION</span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
