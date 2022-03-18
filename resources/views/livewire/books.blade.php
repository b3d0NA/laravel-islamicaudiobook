<section class="w-11/12 p-5 mx-auto rounded-md main-section">
    <div class="flex items-center space-x-4 books-top md:flex-col md:items-start">
        <input wire:model.debounce.500ms="search" type="search" name="search"
            placeholder="Search by book name, author name"
            class="p-2 rounded-lg w-80 md:w-full focus:ring-2 focus:ring-blue-400 focus:outline-none focus:ring-offset-4" />
        <select wire:model.debounce.500ms="filter"
            class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 rounded-xl md:mt-4"
            name="gender">
            <option value="">Book Filter</option>
            <option value="3">Active Books</option>
            <option value="1">Free Books</option>
            <option value="2">Paid Books</option>
        </select>
    </div>
    <div class="p-5 mt-5 bg-white rounded-lg books-section">
        <div class="flex flex-wrap items-center justify-center space-x-8 space-y-8 sm:flex-col sm:space-x-0 books">
            <div wire:loading wire:target="search"
                class="rounded-2xl book w-[230px] border border-gray-200 overflow-hidden hover:shadow-md transition ease-in-out max-h-[450px]">
                <div class="rounded-tr-2xl rounded-br-2xl max-h-[300px] w-[230px] overflow-hidden book-image p-1">
                    <div
                        class="object-contain w-full transition ease-in-out bg-gray-100 cursor-pointer animate-pulse h-52 rounded-2xl">
                    </div>
                </div>
                <div class="mt-4 text-center book-info">
                    <div class="w-40 h-6 mx-auto bg-gray-100 animate-pulse rounded-xl"></div>
                    <div class="w-32 h-5 mx-auto mt-2 bg-gray-100 animate-pulse rounded-xl"></div>
                    <div class="mx-auto my-4 bg-gray-100 animate-pulse w-28 h-7 rounded-xl"></div>
                </div>
            </div>
            @forelse ($this->books as $book)
            {{-- dump(auth()->user()->isPendingRequest($book)) --}}
            <div wire:loading.remove
                class="rounded-2xl book w-[230px] border border-gray-200 overflow-hidden hover:shadow-md transition ease-in-out h-fit"
                x-init>
                <div class="rounded-tr-2xl rounded-br-2xl max-h-[300px] w-[230px] overflow-hidden book-image">
                    <img class="object-contain transition ease-in-out cursor-pointer hover:scale-105 aspect-auto rounded-tr-2xl rounded-br-2xl"
                        src="{{ $book->cover_link }}" alt="{{ $book->name }}" />
                    <div class="book-image-overflow">
                        <h2 class="p-1 px-4 text-white rounded-lg text-md bg-gradient-to-r from-amber-300 to-amber-500">
                            Publication:
                            {{ $book->publication }}
                        </h2>
                        <h2 class="p-1 px-4 text-white rounded-lg text-md bg-gradient-to-r from-red-300 to-red-500">
                            Page: {{ $book->page_number }}
                        </h2>
                        @auth
                        <h2 class="p-1 px-4 text-white rounded-lg text-md bg-gradient-to-r from-teal-300 to-teal-500">
                            Total Reads:
                            {{ \App\Http\Helpers\NumberFormat::readable($book->read) }}
                        </h2>
                        @endauth
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center mt-2 text-center book-info">
                    <div>
                        <h2 class="px-2 font-bold text-gray-700 text-md">
                            {{ $book->name }}
                        </h2>
                    </div>
                    <div>
                        <h5 class="mb-3 text-sm italic text-gray-400 normal-case font-extralight">
                            by {{ $book->author }}
                        </h5>
                    </div>
                    <div class="w-full">
                        @auth
                        @if (auth()->user()->group_status != 1)
                        @if($book->status == 2 && auth()->user()->paid_status == 1)
                        <a wire:click="read({{ $book->id }})"
                            class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-teal-400 rounded-xl hover:bg-teal-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            target="_blank" href="{{ $book->read_link }}">
                            <span>Read Full Book</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        @elseif ($book->short_link)
                        <a class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-blue-300 rounded-xl hover:bg-blue-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            target="_blank" href="{{ $book->short_link }}">
                            <span>Read Short Book</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        @endif
                        @if (auth()->user()->survey) @if ($book->status == 2 && auth()->user()->paid_status == 1)
                        @else
                        <p class="px-2 py-3 my-3 text-xs italic font-light normal-case">
                            {{ config("app.not_activated_group") }}
                        </p>
                        @endif
                        @else
                        <p class="px-2 py-3 my-3 text-xs italic font-light normal-case">
                            Please fill the
                            <a href="{{ route('user.survey.index') }}" class="text-blue-500 hover:underline">survey
                                form</a>
                            first to read this book.
                        </p>
                        @endif
                        @else
                        @if ($book->status == 2 && auth()->user()->paid_status == 1)
                        <a wire:click="read({{ $book->id }})"
                            class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-teal-400 rounded-xl hover:bg-teal-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            target="_blank" href="{{ $book->read_link }}">
                            <span>Read Full Book</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        @elseif($book->status == 1)
                        @if (auth()->user()->isApprovedRequest($book))
                        @if (!auth()->user()->requestedBook($book)->first()->expirationInDate()->isPast())
                        <a wire:click="read({{ $book->id }})"
                            class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-teal-400 rounded-xl hover:bg-teal-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            target="_blank" href="{{ $book->read_link }}">
                            <span>Read Full Book</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <p class="my-3 text-xs italic text-gray-500">Ends at: <span
                                class="endsAt">{{auth()->user()->requestedBook($book)->first()->expirationInDate()->format('m/d/Y')}}</span>
                        </p>
                        @else

                        @if (auth()->user()->requestedBook($book)->first()->updated_at->lessThan(now()->subDays(30)))

                        <button
                            class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-violet-400 rounded-xl hover:bg-violet-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-violet-500"
                            @click="$dispatch('open-request-book-modal', '{{$book}}')">
                            <span>Request to Read</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                        @else
                        <p class="px-2 py-3 my-3 text-xs italic font-light normal-case">
                            Expired! You can request again after 1 month.
                        </p>
                        @endif
                        @endif
                        @elseif(auth()->user()->isDeclinedRequest($book))
                        @if (auth()->user()->requestedBook($book)->first()->updated_at->lessThan(now()->subDays(30)))

                        <button
                            class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-violet-400 rounded-xl hover:bg-violet-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-violet-500"
                            @click="$dispatch('open-request-book-modal', '{{$book}}')">
                            <span>Request to Read</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                        @else
                        <p class="px-2 py-3 my-3 text-xs italic font-light normal-case">
                            Inna Lillah! Your request have been declined.
                            <a href="{{ route('user.messages.index') }}" class="text-blue-500 hover:underline">Message
                                admin</a>
                            to know why the request had declined.
                        </p>
                        @endif

                        @elseif(auth()->user()->isPendingRequest($book))
                        <p class="px-2 py-3 my-3 text-xs italic font-light normal-case">
                            Alhamdulillah! Admin recieved your request.
                            <a href="{{ route('user.messages.index') }}" class="text-blue-500 hover:underline">Message
                                admin</a>
                            if you think it's being so late.
                        </p>
                        @else
                        <button
                            class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-violet-400 rounded-xl hover:bg-violet-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-violet-500"
                            @click="$dispatch('open-request-book-modal', '{{$book}}')">
                            <span>Request to Read</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                        @endif
                        @else
                        <p class="px-2 py-3 my-3 text-xs italic font-light normal-case">
                            Become a paid member by
                            <a href="{{ route('user.payment.index') }}" class="text-blue-500 hover:underline">making
                                payment</a>
                            to read this book.
                        </p>
                        @endif
                        @endif
                        @endauth
                    </div>
                    @guest
                    @if ($book->short_link)
                    <a class="flex items-center justify-center w-10/12 px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-blue-300 rounded-xl hover:bg-blue-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        target="_blank" href="{{ $book->short_link }}">
                        <span>Read Short Book</span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    @endif
                    <p class="my-3 normal-case">
                        <a href="{{ route('user.login.index') }}" class="text-blue-500 hover:underline">
                            Login
                        </a>
                        to read full book
                    </p>
                    @endguest
                </div>
            </div>
            @empty
            <div class="flex items-center justify-center w-full bg-gray-50 h-28">
                <h2 class="text-xl font-medium text-gray-600">
                    In Shaa Allaah! Book will be added.
                </h2>
            </div>
            @endforelse
            @for ($i = 1; $i <= 3; $i++) <div wire:loading
                class="rounded-2xl book w-[230px] border border-gray-200 overflow-hidden hover:shadow-md transition ease-in-out max-h-[450px]">
                <div class="rounded-tr-2xl rounded-br-2xl max-h-[300px] w-[230px] overflow-hidden book-image p-1">
                    <div
                        class="object-contain w-full transition ease-in-out bg-gray-100 cursor-pointer animate-pulse h-52 rounded-2xl">
                    </div>
                </div>
                <div class="mt-4 text-center book-info">
                    <div class="w-40 h-6 mx-auto bg-gray-100 animate-pulse rounded-xl"></div>
                    <div class="w-32 h-5 mx-auto mt-2 bg-gray-100 animate-pulse rounded-xl"></div>
                    <div class="mx-auto my-4 bg-gray-100 animate-pulse w-28 h-7 rounded-xl"></div>
                </div>
        </div>
        @endfor
    </div>
    <div class="my-4">
        {{ $this->books->links('vendor.livewire.tailwind-custom') }}
    </div>
    </div>
</section>

@push('custom-scripts') @endpush