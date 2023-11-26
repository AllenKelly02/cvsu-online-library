<x-app-layout>
    <div class="px-20 pt-8 mx-auto py-24 bg-bgmain min-h-screen w-full" x-data="editor">
        <div class="h-full w-full flex flex-col gap-2">
            <div class="border-2 rounded-lg flex flex-col gap-2 p-4 h-96 max-h-1/2 bg-gray-50">
                <h1 class="font bold text-lg">Email : <span>{{ $message->email }}</span></h1>
                <p class="text-sm whitespace-pre-line bg-gray-100 h-full rounded-lg p-2">
                    {{ $message->content }}
                </p>
            </div>
            <form method="POST" action="{{route('admin.messages.reply')}}" class="flex flex-col gap-2 text-black bg-gray-50 rounded-lg p-2">
                @csrf
                <label for="">Email</label>
                <input type="email" class="input bg-white" name="email" value="{{ $message->email }}">
                <label for="">Content</label>
                <div class="h-64 w-full">
                    <div id="editor"></div>
                </div>

                <input type="hidden" name="message_id" id="" value="{{$message->id}}">
                <input type="hidden" name="content" x-model="data">
                <div class="w-full pt-10 flex justify-end">
                    <button class="btn btn-accent " @click="getContent()">Send</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
