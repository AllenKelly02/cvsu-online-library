<x-app-layout>
  <div class="px-36 pt-10">
    <a href="{{route('admin.books.index')}}" class="text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Back</a>
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
        <p class="leading-relaxed">The hidden cause of America's broken education system - and how to fix it.</p>
        <p class="leading-relaxed">Course: BS Information Technology</p>
        <p class="leading-relaxed">Publication Year: </p>
        <p class="leading-relaxed text-red-500">Important note: Books borrowed should be returned within 3-5 days, otherwise you will pay accordingly.</p> 
        
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
 
</section>
</x-app-layout>