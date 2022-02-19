<div class="px-3 py-3 my-3">
    <div class="overflow-x-scroll card-body" x-init>
        <h2 class="mb-10 text-lg font-bold text-center">Users list</h2>
        <div class="flex flex-wrap my-3 space-x-4 space-y-2 feature">
            <input wire:model.debounce.500ms="search" type="search"
                class="px-4 py-2 text-md rounded-md w-[400px] bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                placeholder="Search by name, email, mobile">
            <button x-on:click="$dispatch('open-add-users-modal')" class="my-3 btn">Add Users</button>
            <select wire:model.debounce.500ms="gender"
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                name="gender">
                <option value="">Gender</option>
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
            <select wire:model.debounce.500ms="filter"
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                name="gender">
                <option value="">User Filter</option>
                <option value="1">Inactive since 30 days</option>
                <option value="2">Have not been paying since 30 days</option>
                <option value="3">Submitted survey</option>
                <option value="4">Not Submitted survey</option>
            </select>
            <select wire:model.debounce.500ms="group_status"
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                name="gender">
                <option value="">Group Status</option>
                <option value="1">Activated</option>
                <option value="0">Not Activated</option>
            </select>
            <select wire:model.debounce.500ms="paid_status"
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                name="gender">
                <option value="">Paid Status</option>
                <option value="1">Activated</option>
                <option value="0">Not Activated</option>
            </select>
        </div>
        <!-- start a table -->
        <table class="w-full overflow-x-scroll border table-auto rounded-xl">

            <!-- table head -->
            <thead class="text-center bg-gray-50 rounded-xl">
                <tr>
                    <th class="py-5 text-sm font-semibold tracking-wide capitalize">No.</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">email</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">survey</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">group status</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid status</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">actions</th>
                </tr>
            </thead>
            <!-- end table head -->

            <!-- table body -->
            <tbody class="text-left text-gray-600">
                @forelse ($this->users as $user)
                <!-- item -->
                <tr @class(["bg-teal-50"=> $loop->even])>
                    <td class="text-sm normal-case border-gray-200 text-center">
                        {{$loop->iteration}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$user->email}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        <div @class([ "p-3 rounded-lg text-center text-white" , "bg-teal-500"=> $user->survey,
                            "bg-red-500" => !$user->survey ])>
                            @if ($user->survey)
                            Submitted
                            @else
                            Not Submitted
                            @endif
                        </div>
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        <label class="relative inline-block w-10 h-5 mr-4 switch">
                            <input wire:click="updateGroupStatus({{$user->id}})" type="checkbox"
                                @if($user->group_status)
                            checked @endif>
                            <span class="absolute inset-0 rounded-full cursor-pointer slider round"></span>
                        </label>
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        <label class="relative inline-block w-10 h-5 mr-4 switch">
                            <input wire:click="updatePaidStatus({{$user->id}})" type="checkbox" @if($user->paid_status)
                            checked @endif>
                            <span class="absolute inset-0 rounded-full cursor-pointer slider round"></span>
                        </label>
                    </td>
                    <td wire:ignore.self
                        class="flex justify-center items-center space-x-2 space-y-2 text-sm text-center normal-case border-gray-200">
                        <div class="flex items-center justify-center my-1 space-x-2 md:space-y-2">
                            <button wire:click="view({{$user->id}})"
                                @class([ "btn text-white focus:ring-2 focus:ring-sky-500 focus:ring-offset-2"
                                , "bg-green-600"=> $user->survey,
                                "bg-sky-500"=> !$user->survey,
                                ])>
                                <svg wire:loading wire:target="view({{$user->id}})"
                                    class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove wire:target="view({{$user->id}})">View</span>
                            </button>
                            <button wire:click="edit({{$user->id}})"
                                class="btn-bs-primary focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg wire:loading wire:target="edit({{$user->id}})"
                                    class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove wire:target="edit({{$user->id}})">Edit</span>
                            </button>
                            <button wire:click.prevent="delete({{$user->id}})" href="#" class="btn-bs-danger">
                                <svg wire:loading wire:target="delete({{$user->id}})"
                                    class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove wire:target="delete({{$user->id}})">Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan='9' class="py-3 text-xl text-center text-orange-500">In Shaa Allaah! User will be
                        registered
                        soon. Be
                        patient.
                    </td>
                </tr>
                @endforelse
                <!-- item -->

            </tbody>
            <!-- end table body -->

        </table>
        <!-- end a table -->
    </div>
    {{$this->users->links()}}
</div>