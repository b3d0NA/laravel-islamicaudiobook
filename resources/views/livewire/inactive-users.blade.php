<div class="p-5 bg-white rounded-md card-body" x-init>
    <h2 class="mb-10 text-lg font-bold text-center">Inactive Users list</h2>
    <!-- start a table -->
    <table class="w-full border table-auto rounded-xl">

        <!-- table head -->
        <thead class="text-center bg-gray-50 rounded-xl">
            <tr>
                <th class="py-5 text-sm capitalize font-semibold tracking-wide">No.</th>
                <th class="py-5 text-sm capitalize font-semibold tracking-wide text-center">name</th>
                <th class="py-5 text-sm capitalize font-semibold tracking-wide text-center">email</th>
                <th class="py-5 text-sm capitalize font-semibold tracking-wide text-center">group status</th>
                <th class="py-5 text-sm capitalize font-semibold tracking-wide text-center">action</th>
            </tr>
        </thead>
        <!-- end table head -->

        <!-- table body -->
        <tbody class="text-left text-gray-600">
            @forelse ($this->users as $user)
            <!-- item -->
            <tr @class(["bg-teal-50"=> $loop->even])>
                <td class="p-2 mb-4 text-sm font-normal tracking-wider normal-case border-r border-gray-200">
                    {{$loop->iteration}}
                </td>
                <td
                    class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                    {{$user->name}}
                </td>
                <td
                    class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                    {{$user->email}}
                </td>
                <td
                    class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                    <label class="relative inline-block w-10 h-5 mr-4 switch">
                        <input wire:click="updateGroupStatus({{$user->id}})" type="checkbox" @if($user->group_status)
                        checked @endif>
                        <span class="absolute inset-0 rounded-full cursor-pointer slider round"></span>
                    </label>
                </td>
                <td
                    class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                    <button wire:click="view({{$user->id}})"
                        @class([ "btn text-white focus:ring-2 focus:ring-sky-500 focus:ring-offset-2" , "bg-green-600"=>
                        $user->survey,
                        "bg-sky-500"=> !$user->survey,
                        ])>
                        <svg wire:loading wire:target="view({{$user->id}})" class="w-5 h-5 text-white animate-spin"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading.remove wire:target="view({{$user->id}})">View</span>
                    </button>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan='9' class="py-3 text-xl text-center text-orange-500">No inactive users. Alhamdulillah!
                </td>
            </tr>
            @endforelse
            <!-- item -->

        </tbody>
        <!-- end table body -->

    </table>
    <!-- end a table -->
    {{$this->users->links()}}
</div>