<div wire:ignore.self x-cloak x-data="{isOpen:false}" x-show="isOpen" x-transition.opacity
    class="fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-init="
    window.Livewire.on('prepareUserView', () => isOpen=true)
    ">
    <div class="items-end justify-center min-h-screen sm:pt-4 sm:px-4 sm:pb-20 text-center block sm:flex p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="sm:hidden inline-block h-screen" aria-hidden="true">&#8203;</span>
        <div x-cloak x-show="isOpen" x-transition.scale @keyup.escape.window="isOpen = false"
            class="inline-block sm:align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-0 my-8 align-middle w-[800px] md:w-full">
            @if($isLoading)
            <div class="w-full animate-bounce py-3 bg-gray-200 h-28"></div>
            @else
            <div class="bg-white sm:px-4 sm:pt-5 sm:pb-4 p-6 pb-4">

                <h2 class="text-center text-xl font-semibold mb-4 flex flex-col">View User<sub
                        class="text-gray-400 text-sm font-light">Press esc to close</sub></h2>
                <div class="add-form space-y-4 mt-4">
                    <div class="row flex space-x-4 items-center">
                        <label for="name" class="text-gray-600 font-light text-sm">Name: </label>
                        <input wire:model.defer="name" type="text" disabled placeholder="Name"
                            class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            id="name">
                        <label for="email" class="text-gray-600 font-light text-sm">Email: </label>
                        <input wire:model.defer="email" type="email" disabled placeholder="Email"
                            class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            id="email">
                    </div>
                    <div class="row flex space-x-4 items-center">
                        <label for="mobile" class="text-gray-600 font-light text-sm">Mobile: </label>
                        <input wire:model.defer="mobile" type="text" disabled placeholder="Mobile"
                            class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            id="mobile">
                        <label for="fb_link" class="text-gray-600 font-light text-sm">FB: </label>
                        <input wire:model.defer="fb_link" type="text" disabled placeholder="Facebook Link"
                            class="w-full px-3 py-3 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            id="fb_link">
                    </div>
                    <div class="row flex space-x-4 items-center my-5">
                        <div class="flex w-6/12 flex-col justify-center space-y-2">
                            <label for="why_cant_buy_book" class="text-gray-600 text-lg">আপনি কেনো বই কিনতে পারেন না?
                            </label>
                            <textarea wire:model.defer="why_cant_buy_book" disabled
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl h-80"
                                placeholder="উত্তর দিন" type="text" id="why_cant_buy_book"
                                name="why_cant_buy_book"></textarea>
                        </div>
                        <div class="flex flex-col justify-center w-6/12 space-y-2">
                            <div class="flex flex-col justify-center space-y-2">
                                <label for="monthlyMobileCosts" class="text-gray-600 text-lg">আপনার মাসিক মোবাইল খরচ
                                    কতো?
                                </label>
                                <input disabled wire:model="monthly_mobile_costs"
                                    class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                    placeholder="উত্তর দিন" type="text" id="monthlyMobileCosts"
                                    name="monthly_mobile_costs">
                            </div>
                            <div class="flex flex-col justify-center space-y-2">
                                <label for="monthlyHandCosts" class="text-gray-600 text-lg">আপনার মাসিক হাত খরচ কতো?
                                </label>
                                <input disabled wire:model="monthly_hand_costs"
                                    class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                    placeholder="উত্তর দিন" type="text" id="monthlyHandCosts" name="monthly_hand_costs">
                            </div>
                            <div class="flex flex-col justify-center space-y-2">
                                <label for="occupation" class="text-gray-600 text-lg">আপনার পেশা? </label>
                                <input disabled wire:model="occupation"
                                    class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                    placeholder="উত্তর দিন" type="text" id="occupation" name="occupation">
                            </div>
                        </div>
                    </div>
                    <div class="row flex space-x-4 items-center">
                        <div class="w-4/12">
                            <label for="gender" class="text-gray-600 font-light text-sm">Gender: </label>
                            <select wire:model.defer="gender" disabled class=" p-2 px-4 block text-gray-700 bg-gray-100 focus:outline-none focus:ring-2
                        focus:ring-blue-500 focus:ring-offset-2 rounded-xl" id="gender">
                                <option @if($gender==0) selected @endif value="0">Male</option>
                                <option @if($gender==1) selected @endif value="1">Female</option>
                            </select>
                        </div>

                        <div class="flex flex-col w-4/12 justify-center space-y-2">
                            <label for="internet_speed" class="text-gray-600 text-lg">আপনার ইন্টারনেট স্পিড কেমন?
                            </label>
                            <input disabled wire:model="internet_speed"
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                placeholder="উত্তর দিন" type="text" id="internet_speed">
                        </div>
                        <div class="flex flex-col w-4/12 justify-center space-y-2">
                            <label for="monthlyHandCosts" class="text-gray-600 text-lg">আপনি কি ওয়াদা দিচ্ছেন যে আপনি
                                বইগুলো কারো
                                সাথে শেয়ার করবেন না? </label>
                            <input disabled wire:model="is_promised"
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                placeholder="উত্তর দিন" type="text" id="is_promised">
                        </div>
                    </div>
                </div>

            </div>
            <div class="bg-gray-50 sm:px-4 py-3 px-6 sm:block flex flex-row-reverse">
                <button @click="isOpen = false" type="button"
                    class="sm:mt-3 sm:w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white sm:text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-0 sm:ml-0 ml-3 w-auto text-sm">
                    Close
                </button>
            </div>
            @endif
        </div>
    </div>
</div>