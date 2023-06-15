<x-app-layout>
<section class="">
  {{-- <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-black">Ask a Librarian</h2>
      <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-black sm:text-xl"> The campus library aims to share information and resources that might help learners and researchers to their academic needs.</p>
      <form action="#" class="space-y-8">
          <div>
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
              <input type="name" id="name" class="shadow-sm bg-gray-50 border  text-black text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 placeholder-green shadow-black" placeholder="Firstname Lastname" required>
          </div>
          <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
              <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 placeholder-black shadow-black" placeholder="cvsubacoor@gmail.com" required>
          </div>
          <div class="sm:col-span-2">
              <label for="message" class="block mb-2 text-sm font-medium text-black">Message</label>
              <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg shadow-sm border-gray-300 focus:ring-primary-500 focus:border-primary-500 placeholder-black shadow-black" placeholder="Leave a comment..."></textarea>
          </div>
          <div class="form-group form-check text-center mb-6">
            <input type="checkbox"
              class="form-check-input appearance-none h-4 w-4 border border-green-300 rounded-sm bg-white checked:bg-green-600 checked:border-green-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain cursor-pointer"
              id="exampleCheck87" checked />
            <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me a copy of this message</label>
          </div>
          <button type="submit"
            class="w-full py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
            Submit
          </button>
      </form>
  </div> --}}
  <div class="pt-9">
  <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-black">Ask a Librarian</h2>
  <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-black sm:text-xl"> The campus library aims to share information and resources that might help learners and researchers to their academic needs.</p>
  <div class="container px-5 pb-24 mx-auto flex sm:flex-nowrap flex-wrap">
    <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
      <iframe  class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d898.1361332043158!2d120.981349!3d14.412771!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d22f4810979f%3A0xaf0dae4457b7d498!2sCavite%20State%20University%20-%20Bacoor%20Campus!5e1!3m2!1sen!2sus!4v1686846602781!5m2!1sen!2sus" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
        <div class="lg:w-1/2 px-6">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
          <p class="mt-1">The Bacoor City Campus Library is located at the Second Floor of the Cavite State University – Bacoor City Campus, Phase 2, Soldiers Hills IV, Molino VI, Bacoor City, Cavite.</p>
        </div>
        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
          <a class="text-indigo-500 leading-relaxed">cvsubacoorlibrary@cvsu.edu.ph</a>
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
          <p class="leading-relaxed">123-456-7890</p>
        </div>
      </div>
    </div>
    <div class="lg:w-1/3 md:w-1/2 bg-gray- flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
      <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Ask Question?</h2>
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
        <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:green-indigo-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
        <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-gramm="false" wt-ignore-input="true"></textarea>
      </div>
      <div class="form-group form-check text-center mb-6">
            <input type="checkbox"
              class="form-check-input appearance-none h-4 w-4 border border-green-300 rounded-sm bg-white checked:bg-green-600 checked:border-green-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain cursor-pointer"
              id="exampleCheck87" checked />
            <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me a copy of this message</label>
          </div>
      <button class="text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Button</button>
      <p class="text-xs text-gray-500 mt-3">By submitting this form you agree to our terms and conditions and our privacy policy which explains how we may collect, use and disclose your personal information including to third parties.</p>
    </div>
  </div>
  </div>
</section>
</section>
</x-app-layout>
