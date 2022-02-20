<div class="px-3 py-3 my-3">
    <div class="overflow-x-scroll card-body" x-init>
        <h2 class="mb-10 text-lg font-bold text-center">Visitors list</h2>
        <div class="flex flex-wrap my-3 space-x-4 space-y-2 feature">
        <button wire:click="deleteAll" class="my-3 btn btn-danger">Delete All</button>
        </div>
        <!-- start a table -->
        <table class="w-full overflow-x-scroll border table-fixed rounded-xl">

            <!-- table head -->
            <thead class="text-center bg-gray-50 rounded-xl">
                <tr>
                    <th class="py-5 text-sm font-semibold tracking-wide capitalize">No.</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">user</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">page</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">device</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">platform</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">browser</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">ip</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">at</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">action</th>
                </tr>
            </thead>
            <!-- end table head -->

            <!-- table body -->
            <tbody class="text-left text-gray-600">
                @forelse ($this->visitor as $visitor)
                <!-- item -->
                <tr @class(["bg-teal-50"=> $loop->even])>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$loop->iteration}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        <button wire:click="view({{$visitor->visitor_id}})"
                                @class([ "btn text-white focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 bg-stone-300"])>
                                <svg wire:loading wire:target="view({{$visitor->visitor_id}})"
                                    class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove wire:target="view({{$visitor->visitor_id}})">View</span>
                            </button>
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$visitor->url}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$visitor->device}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$visitor->platform}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$visitor->browser}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$visitor->ip}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{Carbon\Carbon::parse($visitor->created_at)->diffForHumans()}}
                    </td>
                    <td wire:ignore.self
                        class="flex items-center justify-center space-x-2 space-y-2 text-sm text-center normal-case border-gray-200">
                        <div class="flex items-center justify-center my-1 space-x-2 md:space-y-2">
                            <button wire:click.prevent="delete({{$visitor->id}})" href="#" class="btn-bs-danger">
                                <svg wire:loading wire:target="delete({{$visitor->id}})"
                                    class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove wire:target="delete({{$visitor->id}})">Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan='9' class="py-3 text-xl text-center text-orange-500">Opss.. No visitors yet
                    </td>
                </tr>
                @endforelse
                <!-- item -->

            </tbody>
            <!-- end table body -->

        </table>
        <!-- end a table -->
    </div>
    {{$this->visitor->links()}}
</div>
