<x-app-layout>
    <section class="text-gray-600 body-font">
  <div class="container px-5 py-5 mx-auto ml-8">
    <div class="flex flex-col text-left w-full mb-2 mt-2">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard</h1>
    </div>
    <div class="flex flex-wrap -m-4 text-center">
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M8 17l4 4 4-4m-4-5v9"></path>
            <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
          </svg> --}}
          <img class="object-center ml-20 mr-3 mb-3 py-2" src="{{ asset('img/bicon.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">3,547</h2>
          <p class="leading-relaxed">Core Collection</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
          </svg> --}}
         <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/usicon.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">0</h2>
          <p class="leading-relaxed">Users</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M3 18v-6a9 9 0 0118 0v6"></path>
            <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
          </svg> --}}
            <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/visicon.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">156</h2>
          <p class="leading-relaxed">No. of Visits</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
          </svg> --}}
            <img class="object-center ml-20 mr-3 mb-3 py-2" src="{{ asset('img/boricon.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">6</h2>
          <p class="leading-relaxed">Borrowed Books</p>
        </div>
      </div>
    </div>
  </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/290d4f0eb4.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>                               
    </section>
</x-app-layout>
