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
                <th class="py-5 text-sm capitalize font-semibold tracking-wide text-center">mobile</th>
                <th class="py-5 text-sm capitalize font-semibold tracking-wide text-center">group status</th>
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
                    {{$user->mobile}}
                </td>
                <td
                    class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                    <label class="relative inline-block w-10 h-5 mr-4 switch">
                        <input wire:click="updateGroupStatus({{$user->id}})" type="checkbox" @if($user->group_status)
                        checked @endif>
                        <span class="absolute inset-0 rounded-full cursor-pointer slider round"></span>
                    </label>
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