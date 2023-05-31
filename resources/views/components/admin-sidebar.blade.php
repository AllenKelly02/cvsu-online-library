<div class="w-1/5 h-full flex items-start justify-center border-r border-gray-300">
    <div class="flex flex-col space-y-1 p-8 justify-left">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 p-2 rounded group hover:bg-green-100">
            <i class='bx bx-category text-xl text-gray-500 group-hover:text-green-700'></i>
            <p class="group-hover:text-green-700">Dashboard</p>
        </a>

        <a href="{{ route('admin.books') }}" class="flex items-center space-x-2 p-2 rounded group hover:bg-green-100">
            <i class='bx bx-book text-xl text-gray-500 group-hover:text-green-700'></i>
            <p class="group-hover:text-green-700">Books</p>
        </a>

        <a href="{{ route('admin.verified-accounts') }}" class="flex items-center space-x-2 p-2 rounded group hover:bg-green-100">
            <i class='bx bx-user-check text-xl text-gray-500 group-hover:text-green-700'></i>
            <p class="group-hover:text-green-700">Verified Accounts</p>
        </a>

        <a href="{{ route('admin.unverified-accounts') }}" class="flex items-center space-x-2 p-2 rounded group hover:bg-green-100">
            <i class='bx bx-user-x text-xl text-gray-500 group-hover:text-green-700'></i>
            <p class="group-hover:text-green-700">Unverified Accounts</p>
        </a>
    </div>
</div>
