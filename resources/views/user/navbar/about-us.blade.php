<x-app-layout>

<section class="text-gray-600 body-font mt-10 ml-32">
 <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">About Us</h2>
<!-- Container for demo purpose -->
<div class="container my-24 mx-auto md:px-6">
  <!-- Section: Design Block -->
  <section class="mb-32">

    <!-- Content -->
    <div class="mb-12 flex flex-wrap md:mb-0">
      <div class="w-full md:w-2/12 shrink-0 grow-0 basis-auto">
        <img src="{{ asset('img/lorema.jpg') }}"
          class="mb-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="Avatar" />
      </div>

      <div class="w-full md:w-10/12 shrink-0 grow-0 basis-auto md:pl-6">
        <p class="mb-3 font-semibold">Lorema N. Acapulco, RL</p>
        <p>
          Campus Librarian
        </p>
      </div>
    </div>

    <!-- Content -->
    <div class="mb-12 flex flex-wrap md:mb-0">
      <div class="w-full md:w-2/12 shrink-0 grow-0 basis-auto">
        <img src="{{ asset('img/russel.jpg') }}"
          class="mb-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="Avatar" />
      </div>

      <div class="w-full md:w-10/12 shrink-0 grow-0 basis-auto md:pl-6">
        <p class="mb-3 font-semibold">Russel C. Cacho</p>
        <p>
          Library Assistant
        </p>
      </div>
    </div>

</div>
<!-- Container for demo purpose -->
  <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
    <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-green-800">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Additional Links</h1>
      <p class="leading-relaxed text-base">The Bacoor City Campus Library is located at the Second Floor of the Cavite State University – Bacoor City Campus, Phase 2, Soldiers Hills IV, Molino VI, Bacoor City, Cavite.</p>
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
          <a  href="https://www.google.com/maps?ll=14.412771,120.981349&z=19&t=h&hl=en-US&gl=US&mapclient=embed&cid=12613929739887301784" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-gray-600 hover:text-green-900">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/pin.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">CvSU - Bacoor Campus on Google Map</span>
				  </a>
          <a  href="https://www.facebook.com/CvSUBacoorCityCampusLibrary/" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-gray-600 hover:text-green-900">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/fb.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Campus Library FB Page</span>
				  </a>
          <a  href="https://cvsubccl.librarika.com/" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-gray-600 hover:text-green-900">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/web.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Web OPAC</span>
				  </a>
        </div>
      </div>
    </div>
  </div>
</section>
</x-app-layout>
