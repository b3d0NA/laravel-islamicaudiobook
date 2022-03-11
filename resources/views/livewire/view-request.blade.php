<div wire:ignore.self x-cloak x-data="{isOpen:false}" x-show="isOpen" x-transition.opacity
    class="fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-init="
    window.Livewire.on('prepareRequestView', () => isOpen=true)
    window.Livewire.on('CloseBookRequestView', () => isOpen=false)
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

                <h2 class="text-center text-xl font-semibold mb-4 flex flex-col">View Request<sub
                        class="text-gray-400 text-sm font-light">Press esc to close</sub></h2>
                <div class="add-form space-y-4 mt-4">
                    <div class="book-thumb w-full border border-violet-300 p-3 rounded-lg flex space-x-3 items-center">
                        <div class="book-cover">
                            <img class="object-contain transition ease-in-out hover:outline hover:outline-violet-300 hover:outline-offset-2 h-48 rounded-xl rounded-br-2xl"
                                src="{{$bookCover}}" />
                        </div>
                        <div class="book-details">
                            <div>
                                <h2 class="px-2 font-bold text-gray-700 text-lg">{{$bookName}}</h2>
                            </div>
                            <div>
                                <h5 class="mb-3 text-md italic text-gray-400 normal-case font-extralight">
                                    by {{$request?->book->author}}
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="row flex space-x-4 items-center py-5">
                        <div class="flex w-6/12 flex-col justify-center space-y-2 border-r border-stone-300">
                            <label for="promiseShare" class="text-gray-600 text-lg">আপনি কি ওয়াদা করছেন যে আপনি এই
                                বই, বই এর লিংক কারো কাছে শেয়ার(Share) করবেন না?
                            </label>
                            <input disabled
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                type="text" id="promiseShare"
                                value="{{$promise_share == 0 ? 'না, ওয়াদা করছি না।' : 'হ্যা, ওয়াদা করছি।'}}">
                        </div>
                        <div class="flex w-6/12 flex-col justify-center space-y-2">
                            <label for="promiseScreenshot" class="text-gray-600 text-lg">আপনি কি ওয়াদা করছেন যে আপনি
                                বইটির
                                স্ক্রিনশট(Screenshot) নিজের সংগ্রহে রাখবেন না এবং কারো কাছে শেয়ারও করবেন না?
                            </label>
                            <input disabled
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                type="text" id="promiseScreenshot"
                                value="{{$promise_screenshot == 0 ? 'না, ওয়াদা করছি না।' : 'হ্যা, ওয়াদা করছি।'}}">
                        </div>
                    </div>
                    <div class="row flex space-x-4 items-center py-5">
                        <div class="flex w-8/12 flex-col justify-center space-y-2 border-r border-stone-300">
                            <label for="promiseDownload" class="text-gray-600 text-lg">আপনি কি ওয়াদা দিচ্ছেন বইটি কোনো
                                উপায়ে ডাউনলোড(Download) বা অন্য কোনো উপায়ে নিজের মোবাইল, কম্পিউটার অথবা কোনো কোথাও
                                সংরক্ষণ(Save) করে রাখবে না?
                            </label>
                            <input disabled
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                type="text" id="promiseDownload"
                                value="{{$promise_download == 0 ? 'না, ওয়াদা করছি না।' : 'হ্যা, ওয়াদা করছি।'}}">
                        </div>
                        <div class="flex w-4/12 flex-col justify-center space-y-2">
                            <label for="promiseScreenshot" class="text-gray-600 text-lg">বইটি পড়ার জন্যে আমি সময় চাচ্ছি:
                            </label>
                            <input disabled
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                type="text" id="promiseScreenshot" value="{{$request?->expirationToHuman()}}">
                        </div>
                    </div>
                    <div class="row flex space-x-4 items-center py-5">
                        <div class="flex w-full flex-col justify-center space-y-2">
                            <label for="promiseDownload" class="text-gray-600 text-lg">আমি এই ব্যাপারে সাক্ষ্য দিচ্ছি যে
                                উপরের লেখাগুলো আমি পড়ে তারপরেই উত্তর দিয়েছি। আমি মুমিন হিসেবে আল্লাহকে সাক্ষী রেখে ওয়াদা
                                গুলো করেছি। শুধু মাত্র আমার ওয়াদা ভঙ্গ করার কারণে ভার্চুয়াল লাইব্রেরী (মাকতাবাতুল
                                ইফতিরাদিয়াহ) এর পরিচালক তাদের সকল কার্যক্রম বন্ধ করে দিতে পারবেন। আমি এই ব্যাপারে সহমত
                                জানাচ্ছি।
                            </label>
                            <input disabled
                                class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                                type="text" id="promiseDownload" value="{{$is_sweared == 0 ? 'না' : 'হ্যা'}}">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 sm:px-4 py-3 px-6 sm:block flex flex-row-reverse">
                    <button wire:click.prevent="approve" id="approveRequest"
                        class="sm:w-full flex items-center justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-500 sm:text-base font-medium text-white hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:ml-0 ml-3 w-auto text-sm disabled:bg-teal-200"
                        disabled>
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
                    <button wire:click.prevent="decline"
                        class="sm:w-full flex items-center justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 sm:text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-0 ml-3 w-auto text-sm">
                        <svg wire:loading wire:target="decline" class="animate-spin h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading.remove wire:target="decline">Decline</span>
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