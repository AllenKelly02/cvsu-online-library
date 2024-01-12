<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl" x-data="imageUploadHanler">
                    <form action="{{ route('update.avatar') }}" method="post" enctype="multipart/form-data"
                        class="flex flex-col gap-2">
                        @csrf


                        <div class="flex items-center justify-center w-full">

                            <label for="dropzone-file" x-show="image === null"
                                class="flex flex-col items-center justify-center w-full h-64 border-2
                                 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50
                                 hover:bg-gray-100
                                 ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="image" type="file" class="hidden"
                                    @change="handler($event)" />
                            </label>


                            <template x-if="image !== null">
                                <div class="w-full h-full relative">
                                    <button class="btn top-2 right-2 absolute" @click="image = null"><i
                                            class="fi fi-rr-circle-xmark"></i></button>

                                    <img :src="image" alt="" srcset=""
                                        class="object object-center w-full h-auto">

                                </div>

                            </template>
                            @error($errors->has('image'))
                                <p class="text-xs text-error">{{ $errors->first('image') }}</p>
                            @enderror
                        </div>

                        <button class="btn w-16 btn-sm text-white">Save</button>
                    </form>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>


    @push('js')
        <script>
            const imageUploadHanler = () => ({
                image: null,
                handler(e) {

                    const {
                        files
                    } = e.target;


                    const reader = new FileReader();

                    reader.onload = function() {
                        this.image = reader.result

                    }.bind(this)


                    reader.readAsDataURL(files[0])
                }
            })
        </script>
    @endpush

</x-app-layout>
