<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24 bg-bgmain min-h-screen w-full">
        <div class="h-full w-full flex flex-col gap-2">
            <h1 class="font-bold text-black ml-2">Inbox</h1>
            @forelse ($messages as $message)
                <a href="{{route('admin.messages.show', ['message' => $message->id])}}">
                    <div
                        class=" border  p-4 flex items-center justify-between text-gray-800 hover:bg-gray-300 duration-700">
                        <h1>{{ $message->email }}</h1>
                        <p class="truncate w-1/2">
                            <span>Content: {{ $message->content }}</span>
                        </p>
                        <p>
                            {{ Carbon\Carbon::parse($message->created_at)->format('M/d/Y') }}
                        </p>
                    </div>
                </a>
            @empty
                <div class=" border p-4 flex items-center justify-between bg-white rounded-box text-black hover:bg-gray-200 duration-700">
                    <h1 class="w-full text-center font-bold">No messages</h1>

                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
