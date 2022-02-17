<div wire:ignore.self @open-add-book-modal.window="isOpen = !isOpen" x-cloak x-data="{isOpen:false}" x-show="isOpen"
    x-transition.opacity class="fixed inset-0 z-20 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" x-init="
    window.Livewire.on('BookAddedSuccesfully', () => isOpen=false)
    ">
    <div class="items-end justify-center block min-h-screen p-0 text-center sm:pt-4 sm:px-4 sm:pb-20 sm:flex">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="inline-block h-screen align-middle sm:hidden" aria-hidden="true">&#8203;</span>
        <div x-cloak x-show="isOpen" x-transition.scale
            class="inline-block w-full max-w-lg my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:align-bottom sm:my-0">
            <div class="p-6 pb-4 bg-white sm:px-4 sm:pt-5 sm:pb-4">
                <h2 class="mb-4 text-xl font-semibold text-center">Add Book</h2>

                <div class="space-y-2 add-form">
                    @error("name")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <input wire:model.defer="name" type="text" placeholder="Book Name"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    @error("cover_link")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="book-cover">
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
                    <input wire:model.defer="read_link" type="text" placeholder="Read link"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    @error("expire_time")
                    <div class="block p-2 my-1 text-white normal-case bg-red-500 rounded-lg">
                        {{$message}}
                    </div>
                    @enderror
                    <input wire:model.defer="expire_time" type="date" placeholder="Expiration date (m/d/y)"
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    <select wire:model.defer="status" required
                        class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                        <option disabled>Select book status</option>
                        <option value="0">Hide</option>
                        <option value="1">Show</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-row-reverse px-6 py-3 bg-gray-50 sm:px-4 sm:block">
                <button wire:click.prevent="add"
                    class="flex items-center justify-center w-auto px-4 py-2 ml-3 text-sm font-medium text-white bg-teal-400 border border-transparent rounded-md shadow-sm sm:w-full sm:text-base hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:ml-0">
                    <svg wire:loading wire:target="add" class="w-5 h-5 text-white animate-spin"
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
                    class="inline-flex justify-center w-auto px-4 py-2 mt-0 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm sm:mt-3 sm:w-full sm:text-base hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-0">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>