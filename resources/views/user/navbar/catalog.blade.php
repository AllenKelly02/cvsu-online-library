<x-app-layout>
    <div class=" px-5 pt-8 mx-auto py-24" src="{{ asset('img/wave.png') }}" >
        <div class="flex flex-wrap w-full mb:pt-5">
            <div class="lg:w-1/2 w-fulll lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Catalog</h1>
                <div class="h-1 w-20 bg-green-900 rounded"></div>
            </div>
        </div>
        <form class = "pt-9">
            <div class="flex md:pb-5">
                {{-- <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label> --}}
                {{-- <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                    </li>
                    </ul>
                </div> --}} 
                <div> 
                <select data-te-select-init class = "w-72 bg-gray-50 border-l-gray-300 rounded-lg border-l-2 border border-gray-300">
                    <option value="1">Category</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                    <option value="6">Six</option>
                    <option value="7">Seven</option>
                    <option value="8">Eight</option>
                </select>
                </div> 
                <div>
                <select data-te-select-init class = "w-72 bg-gray-50 border-l-gray-300 rounded-lg border-l-2 border border-gray-300">
                    <option value="1">Course</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                    <option value="6">Six</option>
                    <option value="7">Seven</option>
                    <option value="8">Eight</option>
                </select>
                </div>

                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates...">
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-green-700 rounded-r-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="flex flex-wrap -m-4">
        <div class="w-full md:w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
               <img class="object-cover h-48 md:h-64 lg:h-96 rounded w-full object-center mb-6" src="{{ asset('img/b1.jpg') }}" alt="content">
                <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">Natalie Wexler</h3>
                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                Available
                </span>
                 <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div>
                <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">The Knowledge GAP</h2>
                <p class="leading-relaxed truncate text-base">The hidden cause of America's broken education system - and how to fix it.</p>
                    <a href="{{ route('show') }}" type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                     View
                    </a>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
                <img class="h-48 md:h-64 lg:h-96 rounded w-full object-cover object-center mb-6" src="{{ asset('img/b2.jpg') }}" alt="content">
                <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">Gilbert Brands</h3>
                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                    <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                    Unavailable
                </span>
                <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">Introduction to Computer Science</h2>
                <p class="leading-relaxed truncate text-base">A Textbook for Beginners in Informatics</p>
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                    View
                </button>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
               <img class="h-48 md:h-64 lg:h-96 rounded w-full object-cover object-center mb-6" src="{{ asset('img/b3.jpg') }}" alt="content">
                <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">John R. Walker</h3>
                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                    <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                    Available
                </span>
                <h2 class="truncate text-lg text-gray-900 font-medium title-font mb-4">Introduction to Hospitality Management</h2>
                <p class="leading-relaxed truncate text-base">Explores all aspects of the field including: travel and tourism; lodging; foodservice; meetings, conventions and expositions; and leisure and recreation.</p>
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                     View
                </button>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-100 p-6 rounded-lg">
                <img class="h-48 md:h-64 lg:h-96 rounded w-full object-cover object-center mb-6" src="{{ asset('img/b4.jpg') }}" alt="content">
                <h3 class="truncate tracking-widest text-indigo-500 text-xs font-medium title-font">Stuart Henry, Desiré J. M. Anastasia, Sanna King, and Nicole L. Bracy</h3>
                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                    <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                    Available
                </span>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Crime, Law, and Justice</h2>
                <p class="leading-relaxed truncate text-base">Crime, Law, and Justice provides students with a comprehensive introduction to the field of criminal justice and the criminal justice system.</p>
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                    View
                </button>
            </div>
        </div>
        </div> 
    </div>
    <nav class="md:flex justify-center pb-24">
    <ul class="inline-flex items-center -space-x-px">
        <li>
        <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <span class="sr-only">Previous</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        </li>
        <li>
        <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
        </li>
        <li>
        <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
        </li>
        <li>
        <a href="#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-green-600 border border-green-300 bg-green-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
        </li>
        <li>
        <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
        </li>
        <li>
        <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
        </li>
        <li>
        <a href="#" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <span class="sr-only">Next</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        </li>
    </ul>
    </nav>

</section>

</x-app-layout>
