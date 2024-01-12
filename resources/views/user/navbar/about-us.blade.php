<x-app-layout>
  <section class="text-gray-600 body-font container bg-white rounded-3xl duration-700 p-5 md:pl-9 mt-7 mb-7 mx-auto">
    <div class="rounded-3xl duration-700 px-4 sm:px-5 md:px-16 lg:px-24 py-8 sm:py-16 mx-auto">
      <div class="flex flex-col text-center w-full mb-10 sm:mb-16">
          <h1 class="mb-4 text-3xl sm:text-4xl md:text-5xl tracking-tight font-extrabold text-center text-gray-900 dark:text-gray-900">About Us</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-lg md:text-xl">The campus library aims to share information and resources that might help learners and researchers with their academic needs.</p>
      </div>
      <div class="flex flex-wrap sm:pl-8 -m-4 ml-0 sm:ml-5">
          <div class="p-4 lg:w-1/2">
              <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                  <div class="h-32 w-32 sm:h-40 sm:w-40 border-2 border-yellow-400 rounded-full overflow-hidden bg-gray-200">
                      <img src="{{ asset('img/lorema.jpg') }}" alt="" class="w-full h-full object-cover"/>
                  </div>
                  <div class="flex-grow sm:pl-8">
                      <h2 class="title-font font-medium text-lg sm:text-xl md:text-2xl text-gray-900">Lorema N. Acapulco, RL</h2>
                      <h3 class="text-gray-800 mb-2 sm:mb-3">Campus Librarian</h3>
                  </div>
              </div>
          </div>
          <div class="p-4 lg:w-1/2">
            <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                <div class="h-32 w-32 sm:h-40 sm:w-40 border-2 border-fuchsia-400 rounded-full overflow-hidden bg-gray-200">
                    <img src="{{ asset('img/russel.jpg') }}" alt="" class="w-full h-full object-cover"/>
                </div>
                <div class="flex-grow sm:pl-8">
                    <h2 class="title-font font-medium text-lg sm:text-xl md:text-2xl text-gray-900">Lorema N. Acapulco, RL</h2>
                    <h3 class="text-gray-800 mb-2 sm:mb-3">Campus Librarian</h3>
                </div>
            </div>
        </div>

      </div>
  </div>

    <h1 class="mb-4 text-3xl tracking-tight font-extrabold text-center text-gray-900 dark:text-gray-900">Location</h1>
  <div class="flex sm:flex-nowrap justify-center object-center">
    <div class="justify-center lg:w-2/3 md:w-1/2 rounded-2xl overflow-hidden sm:mr-10 p-10 flex">
      <iframe   frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d898.1361332043158!2d120.981349!3d14.412771!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d22f4810979f%3A0xaf0dae4457b7d498!2sCavite%20State%20University%20-%20Bacoor%20Campus!5e1!3m2!1sen!2sus!4v1686846602781!5m2!1sen!2sus"
        width="900" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
<!-- Container for demo purpose -->
  <div class=" flex flex-wrap justify-center md:pl-24 px-9 py-24 mx-auto items-center">
    <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-green-800">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-black">Additional Links</h1>
      <p class="leading-relaxed text-base text-gray-900">The Bacoor City Campus Library is located at the Second Floor of the Cavite State University – Bacoor City Campus, Phase 2, Soldiers Hills IV, Molino VI, Bacoor City, Cavite.</p>
    </div>
    <div class="flex flex-col md:w-1/2 md:pl-12">
      <h2 class="title-font font-semibold text-black tracking-wider text-sm mb-3">LINKS</h2>
      <div class="flex flex-col space-y-4">
        <div>
          <a  href="https://www.google.com/maps?ll=14.412771,120.981349&z=19&t=h&hl=en-US&gl=US&mapclient=embed&cid=12613929739887301784" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-black hover:text-bluemain">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/pin.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">CvSU - Bacoor Campus on Google Map</span>
				  </a>
          <a  href="https://www.facebook.com/CvSUBacoorCityCampusLibrary/" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-black hover:text-bluemain">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/fb.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Campus Library FB Page</span>
				  </a>
          <a  href="https://cvsubccl.librarika.com/" class="flex items-center w-full h-12 px-3 mt-2 rounded  text-black hover:text-bluemain">
                    <img class="object-center w-6 ml-30 py-3" src="{{ asset('img/web.png') }}" alt="content">
					<span class="ml-2 text-sm font-medium">Web OPAC</span>
				  </a>
        </div>
      </div>
    </div>
  </div>
</section>
</x-app-layout>
