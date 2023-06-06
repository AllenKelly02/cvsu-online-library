<x-app-layout>
    <section class="text-gray-600 body-font">
  <div class="container px-5 py-5 mx-auto ml-8">
    <div class="flex flex-col text-left w-full mb-2 mt-2">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard</h1>
    </div>
    <div class="flex flex-wrap -m-4 text-center">
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class=" bg-white px-4 py-6 rounded-lg">
          <img class="object-center ml-20 mr-3 mb-3 py-2" src="{{ asset('img/book.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">3,547</h2>
          <p class="leading-relaxed">Core Collection</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class=" bg-white px-4 py-6 rounded-lg">
         <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/users.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">0</h2>
          <p class="leading-relaxed">Users</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class=" bg-white px-4 py-6 rounded-lg">
            <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/visit.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">156</h2>
          <p class="leading-relaxed">No. of Visits</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class=" bg-white px-4 py-6 rounded-lg">
            <img class="object-center ml-20 mr-3 mb-3 py-2" src="{{ asset('img/borrow.png') }}" alt="content">
          <h2 class="title-font font-medium text-3xl text-gray-900">6</h2>
          <p class="leading-relaxed">Borrowed Books</p>
        </div>
      </div>
    </div>
  </div>
  {{-- <body class="flex flex-col items-center justify-center w-screen h-screen px-10 py-20 text-gray-700 bg-gray-100"> --}}
  {{-- Bar Chart --}}
                                     

  {{-- end --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/290d4f0eb4.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>  

  
</section>
</x-app-layout>
