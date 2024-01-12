<x-app-layout>

    <div class="px-20" x-data="bookScanner">
        <div class="w-full h-auto flex flex-col gap-2">
            <h1 class="text-3xl font-bold text-center py-4 text-black">Scan Book</h1>
            <div class="w-full gap-2 flex p-4 h-full bg-white rounded-box">
                <div class="w-1/4 border-r-2 border-blue-500 flex flex-col gap-2 p-3">
                    <label for="" class="text-3xl text-black text-bold mb-2">Enter Or Scan</label>
                    <input type="text" onmouseover="this.focus()" x-model.debounce.500ms="state.bookId"
                        class="input input-accent input-ml bg-white border border-blue-300 text-black" placeholder="Enter Accession # or Scan Barcode">
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
                                <img :src="state.bookData.image !== null ? '/storage/book/image/' + state.bookData.image : 'public/img/books/6593b598c08cd.jpg'  "  alt="" srcset="" class="object object-center h-96 w-96">
                                <div class="w-full flex flex-col gap-2">
                                    <h1 class="text-4xl font-bold text-black text-center">
                                        <span x-text="state.bookData.title"></span>
                                    </h1>
                                    <div class="w-full p-2 flex justify-between border-b-2 border-black">
                                        <span class="capitalize inline-flex items-center mb-2 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full">
                                            </span>
                                            <span x-text="state.bookData.status" class="capitalize"></span>
                                        </span>
                                        <h1 class="flex gap-2 items-center">
                                            <h1 class="text-black">ISBN : <span x-text="state.bookData.ISBN"></span></h1>
                                        </h1>
                                    </div>
                                    <div class="w-full border-b-2 border-black justify-between text-justify">
                                        <h1 class="text-black"><b>Description :</b> <span class="p-2" x-text="state.bookData.description"></span>
                                    </div>
                                    <div class="w-full grid grid-cols-3 gap-4 border-b-2 border-black">
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Author :</b> <span x-text="state.bookData.author"></span></span>
                                        </h1>
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Course :</b> <span x-text="state.bookData.course"></span></span>
                                        </h1>
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Publisher :</b> <span x-text="state.bookData.publisher"></span></span>
                                        </h1>
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Publish Yr :</b> <span x-text="state.bookData.published_year"></span></span>
                                        </h1>
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Type :</b> <span x-text="state.bookData.type"></span></span>
                                        </h1>
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Pages :</b> <span x-text="state.bookData.pages"></span></span>
                                        </h1>
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Category :</b> <span x-text="state.bookData.category"></span></span>
                                        </h1>
                                        <h1>
                                            <span class="text-ms text-black capitalize"><b>Accession # :</b> <span x-text="state.bookData.accession_number"></span></span>
                                        </h1>

                                    </div>
                                    <div class="w-full p-4 flex flex-col gap-2 text-ms text-black capitalize">
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
