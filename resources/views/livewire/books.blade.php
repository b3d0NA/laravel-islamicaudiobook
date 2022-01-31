<section class="w-11/12 p-5 mx-auto rounded-md main-section">
    <div class="books-top">
        <input wire:model.debounce.500ms="search" type="search" name="search"
            placeholder="Search by book name, author name"
            class="p-2 rounded-lg w-80 md:w-full focus:ring-2 focus:ring-blue-400 focus:outline-none focus:ring-offset-4">
    </div>
    <div class="p-5 mt-5 bg-white rounded-lg books-section">
        <div class="flex flex-wrap sm:flex-col sm:space-x-0 items-center justify-center space-x-8 space-y-8 books">
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
            <div wire:loading.remove
                class="rounded-2xl book w-[230px] border border-gray-200 overflow-hidden hover:shadow-md transition ease-in-out min-h-[480px]">
                <div class="rounded-tr-2xl rounded-br-2xl min-h-[300px] w-[230px] overflow-hidden book-image">
                    <img class="object-contain w-full transition ease-in-out cursor-pointer hover:scale-105 aspect-auto rounded-tr-2xl rounded-br-2xl"
                        src="{{$book->cover_link}}" alt="{{$book->name}}">
                    <div class="book-image-overflow">
                        <h2 class="text-md p-1 px-4 text-white rounded-lg bg-gradient-to-r from-amber-300 to-amber-500">
                            Publication:
                            {{$book->publication}}
                        </h2>
                        <h2 class="text-md p-1 px-4 text-white rounded-lg bg-gradient-to-r from-red-300 to-red-500">
                            Page: {{$book->page_number}}</h2>
                        <h2 class="text-md p-1 px-4 text-white rounded-lg bg-gradient-to-r from-teal-300 to-teal-500">
                            Total Reads: {{\App\Http\Helpers\NumberFormat::readable($book->read)}}</h2>

                    </div>
                </div>
                <div class="mt-2 text-center book-info">
                    <h2 class="text-xl font-bold text-gray-700">{{$book->name}}</h2>
                    <h5 class="mb-3 italic text-gray-400 normal-case text-md font-extralight">by {{$book->author}}</h5>
                    @auth
                    @if (auth()->user()->group_status != 1)
                    <p class="px-2 py-3 my-3 text-xs italic font-light normal-case">
                        {{config('app.not_activated_group')}}</p>
                    @else
                    <a wire:click="read({{$book->id}})"
                        class="flex items-center justify-center w-6/12 px-5 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-blue-400 rounded-xl hover:bg-blue-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        target="_blank" href="{{$book->read_link}}">
                        <span>Read</span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    @endif
                    @endauth
                    @guest
                    <p class="my-3 normal-case"><a href="{{route('user.login.index')}}"
                            class="text-blue-500 hover:underline">Login</a> to read</p>
                    @endguest
                </div>
            </div>

            @empty
            <div class="flex items-center justify-center w-full bg-gray-50 h-28">
                <h2 class="text-xl font-medium text-gray-600">In Shaa Allaah! Book will be added.</h2>
            </div>
            @endforelse

            @for ($i=1; $i<=3; $i++) <div wire:loading
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
    <div class="my-4">{{$this->books->links('vendor.livewire.tailwind-custom')}}</div>
    </div>
</section>

@push("custom-scripts")


@endpush