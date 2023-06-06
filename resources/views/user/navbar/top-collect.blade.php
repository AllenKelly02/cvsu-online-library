<x-app-layout>
    <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Top Collections</h1>
            <div class="h-1 w-20 bg-green-900 rounded"></div>
        </div>
        </div>
        <div class="flex flex-wrap -m-4">
        <div class="xl:w-1/4 md:w-1/2 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
            <img class="object-cover h-96 rounded w-96 object-center mb-6" src="{{ asset('img/b1.jpg') }}" alt="content">
            <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">Natalie Wexler</h3>
            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                Available
            </span>
            <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">The Knowledge GAP</h2>
            <p class="leading-relaxed truncate text-base">The hidden cause of America's broken education system- and how to fix it.</p>
            <button type="submit" class="w-50 px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
            View
            </button>
            </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-96 rounded w-96 object-cover object-center mb-6" src="{{ asset('img/b2.jpg') }}"  alt="content">
            <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">Gilbert Brands</h3>
            <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                Unavailable
            </span>
            <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">Introduction to Computer Science</h2>
            <p class="leading-relaxed truncate text-base">A Textbook for Beginners in Informatics </p>
            <button type="submit"
            class="w-50 px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
            View
            </button>
            </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-96 rounded w-96 object-cover object-center mb-6" src="{{ asset('img/b3.jpg') }}" alt="content">
            <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">John R. Walker</h3>
            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                Available
            </span>
            <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">Introduction to Hospitality Management</h2>
            <p class="leading-relaxed truncate text-base">Explores all aspects of the field including: travel and tourism; lodging; foodservice; meetings, conventions and expositions; and leisure and recreation.</p>
            <button type="submit"
            class="w-50 px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
            View
            </button>
            </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-96 rounded w-96 object-cover object-center mb-6" src="{{ asset('img/b4.jpg') }}" alt="content">
            <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">Stuart Henry, Desiré J. M. Anastasia, Sanna King, and Nicole L. Bracy</h3>
             <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                Available
            </span>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Crime, Law, and Justice</h2>
            <p class="leading-relaxed truncate text-base">Crime, Law, and Justice provides students with a comprehensive introduction to the field of criminal justice and the criminal justice system.</p>
            <button type="submit"
            class="w-50 px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
            View
            </button>
            </div>
        </div>
        </div>
    </div>
</section>
</x-app-layout>