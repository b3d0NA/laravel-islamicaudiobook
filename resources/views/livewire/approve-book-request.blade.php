<div wire:ignore.self x-cloak x-data="{isOpen:false}" x-show="isOpen" x-transition.opacity
    class="fixed z-30 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-init="
    window.Livewire.on('prepareBookRequestApproval', () => isOpen=true)
    window.Livewire.on('BookRequestApprovedSuccesfully', () => isOpen=false)
    ">
    <div class="items-end justify-center min-h-screen sm:pt-4 sm:px-4 sm:pb-20 text-center block sm:flex p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="sm:hidden inline-block align-middle h-screen" aria-hidden="true">&#8203;</span>
        <div x-cloak x-show="isOpen" x-transition.scale @keyup.escape.window="isOpen = false"
            class="inline-block sm:align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-0 my-8 align-middle max-w-xl w-full">
            @if($isLoading)
            <div class="w-full animate-bounce py-3 bg-gray-200 h-28"></div>
            @else
            <div class="bg-white sm:px-4 sm:pt-5 sm:pb-4 p-6 pb-4">

                <div class="flex sm:block items-start">
                    <div
                        class="sm:mx-auto flex-shrink-0 flex items-center justify-center sm:h-12 sm:w-12 rounded-full bg-teal-100 mx-0 h-10 w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-teal-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="sm:mt-3 sm:text-center sm:ml-0 mt-0 ml-4 text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Approve Request
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 normal-case">
                                Are you sure you want to approve this request?
                            </p>
                        </div>
                        @foreach ($errors->all() as $error)
                        <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{$error}}</span>
                        </div>
                        @endforeach
                        <div class="my-3 p-3 rounded-lg bg-gradient-to-b from-teal-50 to-sky-50 mx-auto">

                            <div class="flex flex-col justify-center space-y-2">
                                <label for="gender" class="text-gray-600 text-md">Expired Time:
                                </label>
                                <select wire:model.defer="expiration"
                                    class="p-2 px-4 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                    name="gender" id="gender">
                                    <option>Select a date</option>
                                    <option value="3">৩ দিন</option>
                                    <option value="5">৫ দিন</option>
                                    <option value="7">৭ দিন</option>
                                    <option value="10">১০ দিন</option>
                                    <option value="12">১২ দিন</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="bg-gray-50 sm:px-4 py-3 px-6 sm:block flex flex-row-reverse">
                    <button wire:click.prevent="approve"
                        class="sm:w-full flex items-center justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-500 sm:text-base font-medium text-white hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:ml-0 ml-3 w-auto text-sm">
                        <svg wire:loading wire:target="approve" class="animate-spin h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading.remove wire:target="approve">Approve</span>
                    </button>
                    <button @click="isOpen = false" type="button"
                        class="sm:mt-3 sm:w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white sm:text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-0 sm:ml-0 ml-3 w-auto text-sm">
                        Close
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>