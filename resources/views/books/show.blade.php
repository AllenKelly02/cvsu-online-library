<x-app-layout>
  <div class="px-36 pt-10">
    {{-- <a href="{{route('user.catalog')}}" class="text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Back</a> --}}
    
    <a href="{{route('user.catalog')}}"> 
    <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-greem-700 dark:focus:ring-green-800">
      <svg aria-hidden="true" class="w-5 h-5 transform rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
      <span class="sr-only">Icon description</span>
    </button>
    </a>
  </div>
   <section class="text-gray-600 body-font overflow-hidden">

  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class=" w-80 h-2/4 object-cover object-center rounded"  src="{{ asset('img/b1.jpg') }}" alt="content">
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <h2 class="text-xl title-font text-gray-500 tracking-widest pb-5">Book</h2>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">The Knowledge GAP</h1>
         <p class="leading-relaxed">by Natalie Walker</p>

         {{-- Reviews --}}
        <div class="flex mb-4">
           <span class="flex items-center">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <span class="text-gray-600 ml-3">4 Reviews</span>
          </span>
        </div>
        <div> 
          <p class="leading-relaxed">Publiction Year: 2022</p>
          <p class="leading-relaxed">Publisher:  Book of Books Inc.</p>
          <p class="leading-relaxed">ISBN: 0909090909090</p>
        </div> 
        <div class="pt-5">
          <p class="leading-relaxed">The hidden cause of America's broken education system - and how to fix it.</p>
          <p class="leading-relaxed text-red-500">Important note: Books borrowed should be returned within 3-5 days, otherwise you will pay accordingly.</p>
        </div>
        <div class="flex mt-6 justify-end pb-5 border-b-2 border-green-900 mb-5">

        <div class="flex">
           <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                Available
                </span>
          @auth
          @if (Auth::user()->role === 'admin')
          <button class="flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Save</button>
          @else
          <button class="flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Borrow</button>
          <button class="rounded-full w-10 h-10 bg-green-200 p-0 border-0 inline-flex items-center justify-center text-green-500 ml-4">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
            </svg>
          </button>
          @endif
          @endauth
        </div>
      </div>
    </div>
  </div>
  
  <div class="flex justify-center object-center relative overflow-x-auto pt-5">
      <table class="w-4/5 text-sm text-left bg-green-200 text-gray-500 dark:text-gray-400">
          <thead class="text-lg text-left text-gray-900 uppercase dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Book Details
                  </th>
              </tr>
          </thead>
          <tbody>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Type 
                  </th>
                  <td class="px-6 py-4">
                      Silver
                  </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Authors 
                  </th>
                  <td class="px-6 py-4">
                      White
                  </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      ISBN
                  </th>
                  <td class="px-6 py-4">
                      Black
                  </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Category
                  </th>
                  <td class="px-6 py-4">
                      Black
                  </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Tags
                  </th>
                  <td class="px-6 py-4">
                      Black
                  </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Accession No 
                  </th>
                  <td class="px-6 py-4">
                      Black
                  </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Call No
                  </th>
                  <td class="px-6 py-4">
                      Black
                  </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Copy No 
                  </th>
                  <td class="px-6 py-4">
                      Black
                  </td>
              </tr>
          </tbody>
      </table>
  </div>
  <div class="flex justify-center object-center pt-9">
        <div class="h-full bg-white bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
          <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">RULES FOR BORROWING</h2>
          <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Important Note </h1>
          <ul class="pl-6 mb-3">
            <li><strong>Due Dates:</strong> Keep track of return dates to avoid fines.</li>
            <li><strong>Fine Calculation:</strong> Familiarize yourself with the fine structure.</li>
            <li><strong>Fee Transparency:</strong> Review policies for fine amounts and payment options.</li>
            <li><strong>Communication and Renewal:</strong> Contact authorities if you need an extension.</li>
            <li><strong>Financial Consequences:</strong> Unpaid fines may have repercussions.</li>
          </ul>
          <p class="leading-relaxed">Respect due dates, stay informed, and communicate effectively to enjoy book borrowing without penalties.</p>

          <a href "#" class="text-indigo-500 inline-flex items-center">Learn More about Fines
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
  </div>
</section>
</x-app-layout>
