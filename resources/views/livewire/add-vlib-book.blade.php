<div wire:ignore.self @open-add-book-modal.window="isOpen = !isOpen" x-cloak x-data="{isOpen:false}" x-show="isOpen"
    x-transition.opacity class="fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" x-init="
    window.Livewire.on('BookAddedSuccesfully', () => isOpen=false)
    ">
    <div class="items-end justify-center min-h-screen sm:pt-4 sm:px-4 sm:pb-20 text-center block sm:flex p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="sm:hidden inline-block align-middle h-screen" aria-hidden="true">&#8203;</span>
        <div x-cloak x-show="isOpen" x-transition.scale
            class="inline-block sm:align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-0 my-8 align-middle max-w-lg w-full">
            <div class="bg-white sm:px-4 sm:pt-5 sm:pb-4 p-6 pb-4">
                <h2 class="text-center text-xl font-semibold mb-4">Add Book</h2>

                <div class="add-form space-y-2">
                    @error("name")
                    <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
                        {{$message}}
                    </div>
                    @enderror
                    <input wire:model.defer="name" type="text" placeholder="Book Name"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    @error("author")
                    <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
                        {{$message}}
                    </div>
                    @enderror
                    <input wire:model.defer="author" type="text" placeholder="Book Author"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    @error("publication")
                    <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
                        {{$message}}
                    </div>
                    @enderror
                    <input wire:model.defer="publication" type="text" placeholder="Book Publication"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    @error("page_number")
                    <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
                        {{$message}}
                    </div>
                    @enderror
                    <input wire:model.defer="page_number" type="number" placeholder="Page number"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    @error("cover_link")
                    <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="book-cover">
                        <input wire:model.debounce.500ms="cover_link" type="text" placeholder="Cover link"
                            class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            id="cover_link">

                        <img class="h-30 rounded-lg mx-2 my-2" src="{{$cover_link}}" alt="{{$name}}">
                    </div>
                    @error("read_link")
                    <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
                        {{$message}}
                    </div>
                    @enderror
                    <input wire:model.defer="read_link" type="text" placeholder="Read link"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                </div>
            </div>
            <div class="bg-gray-50 sm:px-4 py-3 px-6 sm:block flex flex-row-reverse">
                <button wire:click.prevent="add"
                    class="sm:w-full flex items-center justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-400 sm:text-base font-medium text-white hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:ml-0 ml-3 w-auto text-sm">
                    <svg wire:loading wire:target="add" class="animate-spin h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span wire:loading.remove>Add</span>
                </button>
                <button @click="isOpen = false" type="button"
                    class="sm:mt-3 sm:w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white sm:text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-0 sm:ml-0 ml-3 w-auto text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>