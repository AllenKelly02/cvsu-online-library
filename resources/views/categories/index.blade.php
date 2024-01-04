<x-app-layout>

    <div class="px-20 flex flex-col gap-2">

        @if (Session::has('message'))
        <div class="alert alert-success shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>{{Session::get('message')}}</span>
            </div>
          </div>
        @endif

        <div class="flex space-x-5 p-5">
            <a href="{{route('admin.category.index')}}" class="btn btn-xs btn-accent">View Categories</a>
            <a href="{{route('admin.category.create')}}" class="btn btn-xs btn-accent">Create Category</a>

          </div>

        <div class="w-full h-screen flex flex-col gap-2">
            <div class="overflow-x-hidden ">
                <table class="table table-compact w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form action="{{route('admin.category.destroy', ['category' => $category->id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-xs btn-error">
                                            <i class="fi fi-rr-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @empty

                            <tr colspan="3">
                                <h1 class="text-xs font-bold w-full text-center"> No Category</h1>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
