<x-app-layout>

    <div class="px-20" x-data="bookScanner">
        <div class="w-full h-screen flex flex-col gap-2">
            <h1 class="text-3xl font-bold text-center py-4">Scan Book</h1>
            <div class="w-full gap-2 flex p-4 h-full">
                <div class="w-1/4 border-r-2 border-blue-500 flex flex-col gap-2 p-4">
                    <label for="" class="text-xs text-gray-500">Enter Or Scan</label>
                    <input type="text" onmouseover="this.focus()" x-model.debounce.500ms="state.bookId"
                        class="input input-accent input-xs bg-white" placeholder="enter or scan book">
                </div>
                <div class="w-full min-h-screen p-4 flex flex-col gap-2">
                    <template x-if="state.bookData === null">
                        <div class="h-full w-full flex justify-center items-center">
                            <div class="bg-white rounded-lg p-4">
                                <h1>Scan Book</h1>
                            </div>
                        </div>
                    </template>
                    <template x-if="state.bookData !== null">
                        <div class="h-full w-full flex flex-col gap-2 ">
                            <div class="w-full flex gap-2 p-2">
                                <img :src="state.bookData.image" alt="" srcset=""
                                    class="object object-center h-96 w-96">
                                <div class="w-full flex flex-col gap-2">
                                    <h1 class="text-4xl font-bold text-gray-900 text-center">
                                        <span x-text="state.bookData.title"></span>
                                    </h1>
                                    <div class="w-full p-2 flex justify-between border-b-2">
                                        <h1 class="flex gap-2 items-center">
                                            <div class="badge badge-xs badge-accent"></div>
                                            <span x-text="state.bookData.status"></span>
                                        </h1>
                                        <h1 class="flex gap-2 items-center">
                                            <h1>ISBN : <span x-text="state.bookData.ISBN"></span></h1>
                                        </h1>
                                    </div>
                                    <div class="w-full border-b-2">
                                        <p x-text="state.bookData.description"></p>
                                    </div>
                                    <div class="w-full grid grid-cols-3 gap-4 border-b-2">
                                        <h1>
                                            <span class="text-xs">Author : <p x-text="state.bookData.author"></p></span>
                                        </h1>
                                        <h1>
                                            <span class="text-xs">Course : <p x-text="state.bookData.course"></p></span>
                                        </h1>
                                        <h1>
                                            <span class="text-xs">Publisher : <p x-text="state.bookData.publisher"></p>
                                            </span>
                                        </h1>
                                        <h1>
                                            <span class="text-xs">Publish Yr : <p
                                                    x-text="state.bookData.published_year"></p></span>
                                        </h1>
                                        <h1>
                                            <span class="text-xs">Type : <p x-text="state.bookData.type"></p></span>
                                        </h1>
                                        <h1>
                                            <span class="text-xs">Pages : <p x-text="state.bookData.pages"></p></span>
                                        </h1>
                                        <h1>
                                            <span class="text-xs">Category : <p x-text="state.bookData.category"></p>
                                            </span>
                                        </h1>
                                        <h1>
                                            <span class="text-xs">Accession # : <p
                                                    x-text="state.bookData.accession_number"></p></span>
                                        </h1>

                                    </div>
                                    <div class="w-full p-4 flex flex-col gap-2">
                                        <h1>User's Borrowed Books</h1>
                                        <template x-for="bookIssuing in state.bookData.book_issuing" :key="bookIssuing.id">
                                            <div :tabindex="`${bookIssuing.id}`" class="collapse collapse-plus border border-base-300 bg-white rounded-box">
                                                <div class="collapse-title text-xl font-medium">
                                                    <h1><span x-text="bookIssuing.user.name"></span></h1>
                                                </div>
                                                <div class="collapse-content">
                                                    <div class="grid grid-cols-4 gap-2">
                                                        <h1 class="text-xs flex flex-col">Borrowed Date: <span x-text="bookIssuing.borrowed_date"></span></h1>
                                                        <h1 class="text-xs flex flex-col">Returned Date: <span x-text="bookIssuing.returned_date"></span></h1>
                                                        <h1 class="text-xs flex flex-col">Penalty Payment: <span x-text="bookIssuing.penalty_payment"></span></h1>
                                                        <h1 class="text-xs flex flex-col">Status: <span x-text="bookIssuing.status"></span></h1>
                                                    </div>
                                                </div>
                                              </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
