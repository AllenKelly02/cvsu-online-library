<x-app-layout>
<section class="">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
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
  </div>
</section>
</x-app-layout>
