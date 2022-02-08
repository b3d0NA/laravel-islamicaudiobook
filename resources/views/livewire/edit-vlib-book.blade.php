<div wire:ignore.self x-cloak x-data="{isOpen:false}" x-show="isOpen" x-transition.opacity
    class="fixed inset-0 z-20 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-init="
    window.Livewire.on('prepareBookEdit', () => isOpen=true)
    window.Livewire.on('BookUpdatedSuccesfully', () => isOpen=false)
    ">
    <div class="items-end justify-center block min-h-screen p-0 text-center sm:pt-4 sm:px-4 sm:pb-20 sm:flex">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="inline-block h-screen align-middle sm:hidden" aria-hidden="true">&#8203;</span>
        <div x-cloak x-show="isOpen" x-transition.scale @keyup.escape.window="isOpen = false"
            class="inline-block w-full max-w-xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:align-bottom sm:my-0">
            @if($isLoading)
            <div class="w-full py-3 bg-gray-200 animate-bounce h-28"></div>
            @else
            <div class="p-6 pb-4 bg-white sm:px-4 sm:pt-5 sm:pb-4">

                <h2 class="flex flex-col mb-4 text-xl font-semibold text-center">Edit Book<sub
                        class="text-sm font-light text-gray-400">Press esc to close</sub></h2>
                <div class="space-y-2 add-form">
                    @error("name")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="name" class="text-sm font-light text-gray-600">Book Name: </label>
                    <input wire:model.defer="name" type="text" placeholder="Book Name"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        id="name">
                    @error("author")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="author" class="text-sm font-light text-gray-600">Book Author: </label>
                    <input wire:model.defer="author" type="text" placeholder="Book Author"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        id="author">
                    @error("publication")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="publication" class="text-sm font-light text-gray-600">Book publication: </label>
                    <input wire:model.defer="publication" type="text" placeholder="Book Publication"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        id="publication">
                    @error("page_number")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="page_number" class="text-sm font-light text-gray-600">Book Page Number: </label>
                    <input wire:model.defer="page_number" type="number" placeholder="Page number"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        id="page_number">
                    @error("cover_link")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="book-cover">
                        <label for="cover_link" class="text-sm font-light text-gray-600">Book Cover: </label>
                        <input wire:model.debounce.500ms="cover_link" type="text" placeholder="Cover link"
                            class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            id="cover_link">

                        <img class="mx-2 my-2 rounded-lg h-30" src="{{$cover_link}}" alt="{{$name}}">
                    </div>
                    @error("read_link")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="read_link" class="text-sm font-light text-gray-600">Book Read Link: </label>
                    <input wire:model.defer="read_link" type="text" placeholder="Read link"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        id="read_link">
                    <input wire:model.defer="short_link" type="text" placeholder="Short read link"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        id="read_link">
                </div>

            </div>
            <div class="flex flex-row-reverse px-6 py-3 bg-gray-50 sm:px-4 sm:block">
                <button wire:click.prevent="save"
                    class="flex items-center justify-center w-auto px-4 py-2 ml-3 text-sm font-medium text-white border border-transparent rounded-md shadow-sm sm:w-full bg-sky-500 sm:text-base hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 sm:ml-0">
                    <svg wire:loading wire:target="save" class="w-5 h-5 text-white animate-spin"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span wire:loading.remove wire:target="save">Save</span>
                </button>
                <button @click="isOpen = false" type="button"
                    class="inline-flex justify-center w-auto px-4 py-2 mt-0 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm sm:mt-3 sm:w-full sm:text-base hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-0">
                    Close
                </button>
            </div>
            @endif
        </div>
    </div>
</div>