<div @open-request-book-modal.window="isOpen = true;book = JSON.parse($event.detail)" x-cloak
    x-data="{isOpen: false, book: null}" x-show="isOpen" x-transition.opacity class="fixed inset-0 z-20 overflow-y-auto"
    aria-labelledby="modal-title" role="dialog" aria-modal="true" x-init="
    window.Livewire.on('CloseRequestModal', () => isOpen=false)
    ">
    <div class="items-end justify-center block min-h-screen p-0 text-center sm:pt-4 sm:px-4 sm:pb-20 sm:flex">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="inline-block h-screen align-middle sm:hidden" aria-hidden="true">&#8203;</span>
        <div x-cloak x-show="isOpen" x-transition.scale
            class="inline-block w-6/12 my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:align-bottom sm:my-0">
            <div class="p-6 pb-4 bg-white sm:px-4 sm:pt-5 sm:pb-4">
                <h2 class="mb-4 text-xl font-semibold text-center">Request Book</h2>

                <div class="space-y-2 add-form">
                    <div class="book-thumb w-full border border-violet-300 p-3 rounded-lg flex space-x-3 items-center">
                        <div class="book-cover">
                            <img class="object-contain transition ease-in-out hover:outline hover:outline-violet-300 hover:outline-offset-2 h-48 rounded-xl rounded-br-2xl"
                                :src="book && book.cover_link" />
                        </div>
                        <div class="book-details">
                            <div>
                                <h2 x-text="book && book.name" class="px-2 font-bold text-gray-700 text-lg"></h2>
                            </div>
                            <div>
                                <h5 x-text="book && 'by ' +book.author"
                                    class="mb-3 text-md italic text-gray-400 normal-case font-extralight"></h5>
                            </div>
                            <p class="text-center text-red-500 text-sm my-2">আপনি একটি বই ১ মাসের মধ্যে শুধুমাত্র একবারই
                                পড়ার জন্য
                                রিকোয়েস্ট করতে পারবেন ।</p>
                        </div>
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
                    <div class="flex space-x-4">
                        <div class="my-3 p-3 rounded-lg bg-gradient-to-b from-teal-50 to-sky-50 w-6/12">
                            <div class="flex flex-col justify-center space-y-2">
                                <label for="promiseShare" class="text-gray-600 text-lg">আপনি কি ওয়াদা করছেন যে আপনি এই
                                    বই, বই এর লিংক কারো কাছে শেয়ার(Share) করবেন না?</label>
                                <div class="flex items-center space-x-3">
                                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="1"
                                        type="radio" id="promsieShare1" name="promise_share"
                                        wire:model.defer="promise_share">
                                    <label class="text-lg text-gray-700" for="promsieShare1">হ্যা, ওয়াদা করছি।</label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="0"
                                        type="radio" id="promsieShare2" name="promise_share"
                                        wire:model.defer="promise_share">
                                    <label class="text-lg text-gray-700" for="promsieShare2">না, ওয়াদা করছি না।</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-3 p-3 rounded-lg bg-gradient-to-b from-teal-50 to-sky-50 w-6/12">
                            <div class="flex flex-col justify-center space-y-2">
                                <label for="promisedScreenshot" class="text-gray-600 text-lg">আপনি কি ওয়াদা করছেন যে
                                    আপনি
                                    বইটির স্ক্রিনশট(Screenshot) নিজের সংগ্রহে রাখবেন না এবং কারো কাছে শেয়ারও করবেন
                                    না?</label>
                                <div class="flex items-center space-x-3">
                                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="1"
                                        type="radio" id="promiseScreenshot1" name="promise_screenshot"
                                        wire:model.defer="promise_screenshot">
                                    <label class="text-lg text-gray-700" for="promiseScreenshot1">হ্যা, ওয়াদা
                                        করছি।</label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="0"
                                        type="radio" id="promiseScreenshot2" name="promise_screenshot"
                                        wire:model.defer="promise_screenshot">
                                    <label class="text-lg text-gray-700" for="promiseScreenshot2">না, ওয়াদা করছি
                                        না।</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex space-x-4 items-center">
                        <div class="my-3 p-3 rounded-lg bg-gradient-to-b from-teal-50 to-sky-50 w-8/12">
                            <div class="flex flex-col justify-center space-y-2">
                                <label for="promisedDownload" class="text-gray-600 text-lg">আপনি কি ওয়াদা দিচ্ছেন বইটি
                                    কোনো
                                    উপায়ে ডাউনলোড(Download) বা অন্য কোনো উপায়ে নিজের মোবাইল, কম্পিউটার অথবা কোনো কোথাও
                                    সংরক্ষণ(save) করে রাখবে না?</label>
                                <div class="flex items-center space-x-3">
                                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="1"
                                        type="radio" id="promiseDownload1" name="promise_download"
                                        wire:model.defer="promise_download">
                                    <label class="text-lg text-gray-700" for="promiseDownload1">হ্যা, ওয়াদা
                                        করছি।</label>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="0"
                                        type="radio" id="promiseDownload2" name="promise_download"
                                        wire:model.defer="promise_download">
                                    <label class="text-lg text-gray-700" for="promiseDownload2">না, ওয়াদা করছি
                                        না।</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-3 p-3 rounded-lg bg-gradient-to-b from-teal-50 to-sky-50 w-4/12">
                            <div class="flex flex-col justify-center space-y-2">
                                <label for="gender" class="text-gray-600 text-md">বইটি পড়ার জন্যে আমি সময় চাচ্ছি:
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
                    <div class="my-3 p-3 rounded-lg bg-gradient-to-b from-teal-50 to-sky-50">
                        <div class="flex items-center space-x-2">
                            <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="1" type="radio"
                                id="isSweared" name="is_sweared" wire:model.defer="is_sweared">
                            <label for="isSweared" class="text-gray-600 text-lg">আমি এই ব্যাপারে সাক্ষ্য দিচ্ছি
                                যে উপরের লেখাগুলো আমি পড়ে তারপরেই উত্তর দিয়েছি। আমি মুমিন হিসেবে আল্লাহকে সাক্ষী রেখে
                                ওয়াদা গুলো করেছি। শুধু মাত্র আমার ওয়াদা ভঙ্গ করার কারণে ভার্চুয়াল লাইব্রেরী (মাকতাবাতুল
                                ইফতিরাদিয়াহ) এর পরিচালক তাদের সকল কার্যক্রম বন্ধ করে দিতে পারবেন। আমি এই ব্যাপারে সহমত
                                জানাচ্ছি।</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row-reverse px-6 py-3 bg-gray-50 sm:px-4 sm:block">
                <button @click="$wire.request(book && book.id)"
                    class="flex items-center justify-center w-auto px-4 py-2 ml-3 text-sm font-medium text-white bg-violet-400 border border-transparent rounded-md shadow-sm sm:w-full sm:text-base hover:bg-violet-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500 sm:ml-0">
                    <svg wire:loading wire:target="request" class="w-5 h-5 text-white animate-spin"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span wire:loading.remove>Request</span>
                </button>
                <button @click="isOpen = false" type="button"
                    class="inline-flex justify-center w-auto px-4 py-2 mt-0 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm sm:mt-3 sm:w-full sm:text-base hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-0">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>