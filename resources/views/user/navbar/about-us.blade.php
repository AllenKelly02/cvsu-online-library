<x-app-layout>
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">About Us</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">The campus library aims to share information and resources that might help learners and researchers to their academic needs.</p>
    </div>
    <div class="flex flex-wrap -m-4 ml-5">
      <div class="p-4 lg:w-1/2">
        <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
          <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset('img/lorema.jpg') }}">
          <div class="flex-grow sm:pl-8">
            <h2 class="title-font font-medium text-lg text-gray-900">Lorema N. Acapulco, RL</h2>
            <h3 class="text-gray-800 mb-3">Campus Librarian</h3>          
          </div>
        </div>
      </div>
      <div class="p-4 lg:w-1/2">
        <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
          <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset('img/russel.jpg') }}">
          <div class="flex-grow sm:pl-8">
            <h2 class="title-font font-medium text-lg text-gray-900">Russel C. Cacho</h2>
            <h3 class="text-gray-800 mb-3">Library Assistant</h3> 
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Container for demo purpose -->
  <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
    <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-green-800">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Additional Links</h1>
      <p class="leading-relaxed text-base text-gray-900">The Bacoor City Campus Library is located at the Second Floor of the Cavite State University – Bacoor City Campus, Phase 2, Soldiers Hills IV, Molino VI, Bacoor City, Cavite.</p>
      {{-- <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a> --}}
    </div>
    <div class="flex flex-col md:w-1/2 md:pl-12">
      <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">LINKS</h2>
      <div class="flex flex-col space-y-4">
        <div>
          <a  href="https://www.google.com/maps?ll=14.412771,120.981349&z=19&t=h&hl=en-US&gl=US&mapclient=embed&cid=12613929739887301784" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-gray-900 hover:text-green-900">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/pin.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">CvSU - Bacoor Campus on Google Map</span>
				  </a>
          <a  href="https://www.facebook.com/CvSUBacoorCityCampusLibrary/" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-gray-900 hover:text-green-900">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/fb.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Campus Library FB Page</span>
				  </a>
          <a  href="https://cvsubccl.librarika.com/" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-gray-900 hover:text-green-900">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/web.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Web OPAC</span>
				  </a>
        </div>
      </div>
    </div>
  </div>
</section>
</x-app-layout>
