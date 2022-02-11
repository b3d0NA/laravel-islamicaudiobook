<div class="px-3 py-3 my-3">
    <div class="overflow-x-scroll card-body" x-init>
        <h2 class="mb-10 text-lg font-bold text-center">Users list</h2>
        <div class="flex flex-wrap my-3 space-x-4 space-y-2 feature">
            <input wire:model.debounce.500ms="search" type="search"
                class="px-4 py-2 text-md rounded-md w-[400px] bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                placeholder="Search by name, email, mobile">
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
                    <th class="py-5 text-sm font-semibold tracking-wide">No.</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">name</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">email</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">mobile</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">facebook</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">gender</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">group status</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">paid status</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center">actions</th>
                </tr>
            </thead>
            <!-- end table head -->

            <!-- table body -->
            <tbody class="text-left text-gray-600">
                @forelse ($this->users as $user)
                <!-- item -->
                <tr @class(["bg-teal-50"=> $loop->even])>
                    <td class="text-sm normal-case border-gray-200">
                        {{$loop->iteration}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$user->name}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$user->email}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        {{$user->mobile}}
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        <a target="_blank" class="text-blue-500 normal-case hover:underline" href="{{$user->fb_link}}">
                            {{\Str::limit($user->fb_link, 20, "...")}}
                        </a>
                    </td>
                    <td class="text-sm text-center normal-case border-gray-200">
                        @if ($user->gender == 0)
                        Male
                        @else
                        Female
                        @endif
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
                        class="flex items-center space-x-2 space-y-2 text-sm text-center normal-case border-gray-200">
                        <button wire:click="edit({{$user->id}})"
                            class="btn-bs-primary focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg wire:loading wire:target="edit({{$user->id}})" class="w-5 h-5 text-white animate-spin"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
                                class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span wire:loading.remove wire:target="delete({{$user->id}})">Delete</span>
                        </button>
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