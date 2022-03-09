<div class="px-3 py-3 my-3">
    <div class="overflow-x-scroll card-body" x-init>
        <h2 class="mb-10 text-lg font-bold text-center">Book Requests</h2>
        <div class="flex flex-wrap my-3 space-x-4 space-y-2 feature">
            <input wire:model.debounce.500ms="search" type="search"
                class="px-4 py-2 text-md rounded-md w-[400px] bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                placeholder="Search by user name, email, mobile">
            <select wire:model.debounce.500ms="filter"
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                name="gender">
                <option value="">Requests Filter</option>
                <option value="1">Pending requests</option>
                <option value="2">Approved Requests</option>
                <option value="3">Declined Requests</option>
            </select>
        </div>
        <!-- start a table -->
        <table class="w-full overflow-x-scroll border table-auto rounded-xl">

            <!-- table head -->
            <thead class="text-center bg-gray-50 rounded-xl">
                <tr>
                    <th class="py-5 text-sm font-semibold tracking-wide capitalize">No.</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">name</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">email</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">number</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">book cover</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">request status</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">request expiration</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">actions</th>
                </tr>
            </thead>
            <!-- end table head -->

            <!-- table body -->
            <tbody class="text-left text-gray-600">
                @forelse ($this->requests as $request)
                <!-- item -->
                <tr @class(["bg-teal-50"=> $loop->even])>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider border-r border-gray-200">
                        {{$loop->iteration}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$request->user->name}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <h2 wire:click="viewUser({{$request->user_id}})"
                            @class([ "text-white focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 cursor-pointer normal-case hover:underline"
                            , "text-red-500"=> !$request->user->isSurveyed(),
                            "text-teal-500" => $request->user->isSurveyed(),
                            ])>
                            <svg wire:loading wire:target="viewUser({{$request->user_id}})" @class(["w-5 h-5
                                animate-spin", "text-sky-500"=> !$request->user->isSurveyed(),
                                "text-teal-500" => $request->user->isSurveyed(),
                                ])
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span wire:loading.remove
                                wire:target="viewUser({{$request->user_id}})">{{$request->user->email}}</span>
                        </h2>
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$request->user->mobile}}
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <a target="_blank" class="" href="{{$request->book->cover_link}}">
                            <img class="aspect-auto rounded-lg max-h-[150px] max-w-[150px] m-auto filter hover:saturate-200 hover:drop-shadow-xl"
                                src="{{$request->book->cover_link}}" alt="{{$request->book->name}}">

                        </a>
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        <div @class([ "p-3 rounded-xl text-sm text-center text-white" , "bg-teal-500"=> (int)
                            $request->status
                            == 2,
                            "bg-red-500" => (int) $request->status === 1,
                            "bg-violet-500" => !$request->status,
                            ])>
                            @if ((int) $request->status == 2)
                            Approved
                            @elseif((int) $request->status === 1)
                            Declined
                            @else
                            Pending...
                            @endif
                        </div>
                    </td>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider text-center border-r border-gray-200">
                        {{$request->expirationToHuman()}}
                    </td>
                    <td wire:ignore.self
                        class="p-2 mb-4 space-x-2 space-y-2 text-sm font-normal tracking-wider border-r border-gray-200">
                        <div class="flex items-center justify-center space-x-2 md:space-y-2">
                            <button wire:click="view({{$request->id}})"
                                class="btn-bs-primary focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg wire:loading wire:target="view({{$request->id}})"
                                    class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove wire:target="view({{$request->id}})">View</span>
                            </button>
                            <button wire:click.prevent="delete({{$request->id}})" href="#" class="btn-bs-danger">
                                <svg wire:loading wire:target="delete({{$request->id}})"
                                    class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove wire:target="delete({{$request->id}})">Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- item -->
                @empty
                <tr>
                    <td colspan='9' class="py-3 text-xl text-center">Opss!! No request yet
                    </td>
                </tr>
                @endforelse
            </tbody>
            <!-- end table body -->

        </table>
        <!-- end a table -->
    </div>
    {{$this->requests->links()}}
</div>