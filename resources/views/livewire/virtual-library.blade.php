<div class="px-3 py-3 my-3">
    <div class="overflow-x-scroll card-body" x-init>
        <h2 class="mb-10 text-lg font-bold text-center">Virtual Library</h2>
        <div class="flex my-3 space-x-4 space-y-2 feature">
            <input wire:model.debounce.500ms="search" type="search"
                class="px-4 py-2 text-md rounded-md w-[400px] bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                placeholder="Search by book name,author,publication">
            <button x-on:click="$dispatch('open-add-book-modal')" class="my-3 btn">Add Book</button>
        </div>
        <!-- start a table -->
        <table class="w-full overflow-x-scroll border table-auto rounded-xl">

            <!-- table head -->
            <thead class="text-center bg-gray-50 rounded-xl">
                <tr>
                    <th class="py-5 text-sm font-semibold tracking-wide capitalize">No.</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">name</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">author</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">publication</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">page number</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">cover</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">read link</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">short link</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">read count</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">book status</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">actions</th>
                </tr>
            </thead>
            <!-- end table head -->

            <!-- table body -->
            <tbody class="text-left text-gray-600">
                @forelse ($this->books as $book)
                <!-- item -->
                <tr @class(["bg-teal-50"=> $loop->even])>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider border-r border-gray-200">
                        {{$loop->iteration}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$book->name}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$book->author}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$book->publication}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$book->page_number}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <a target="_blank" class="" href="{{$book->cover_link}}">
                            <img class="aspect-auto rounded-lg max-h-[150px] max-w-[150px] m-auto filter hover:saturate-200 hover:drop-shadow-xl"
                                src="{{$book->cover_link}}" alt="{{$book->name}}">

                        </a>
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <a target="_blank" class="text-blue-500 normal-case hover:underline"
                            href="{{$book->read_link}}">
                            {{\Str::limit($book->read_link, 20, "...")}}
                        </a>
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <a target="_blank" class="text-blue-500 normal-case hover:underline"
                            href="{{$book->short_link}}">
                            {{\Str::limit($book->short_link, 10, "...")}}
                        </a>
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$book->read}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <select wire:change="statusChange({{$book->id}}, $event.target.value)" @class(['w-full px-3 py-3
                            rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2
                            text-white' , 'bg-indigo-500'=>
                            $book->status == 0
                            , 'bg-teal-500'=> $book->status == 1
                            , 'bg-sky-500'=> $book->status == 2
                            ])>
                            <option disabled>Select book status</option>
                            <option @if($book->status==0) selected @endif value="0">Draft</option>
                            <option @if($book->status==1) selected @endif value="1">Active</option>
                            <option @if($book->status==2) selected @endif value="2">Paid</option>
                        </select>
                    </td>
                    <td wire:ignore.self
                        class="flex items-center p-2 mb-4 space-x-2 space-y-2 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <button wire:click="edit({{$book->id}})"
                            class="btn-bs-primary focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg wire:loading wire:target="edit({{$book->id}})" class="w-5 h-5 text-white animate-spin"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span wire:loading.remove wire:target="edit({{$book->id}})">Edit</span>
                        </button>
                        <button wire:click.prevent="delete({{$book->id}})" href="#" class="btn-bs-danger">
                            <svg wire:loading wire:target="delete({{$book->id}})"
                                class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span wire:loading.remove wire:target="delete({{$book->id}})">Delete</span>
                        </button>
                    </td>
                </tr>
                <!-- item -->
                @empty
                <tr>
                    <td colspan='9' class="py-3 text-xl text-center">In Shaa Allaah! Add a book. No book has been added
                        yet
                    </td>
                </tr>
                @endforelse
            </tbody>
            <!-- end table body -->

        </table>
        <!-- end a table -->
    </div>
    {{$this->books->links()}}
</div>