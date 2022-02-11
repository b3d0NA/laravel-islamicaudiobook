<div class="px-3 py-3 my-3">
    <div class="overflow-x-scroll card-body" x-init>
        <h2 class="mb-10 text-lg font-bold text-center">Payments</h2>
        <div class="flex my-3 space-x-4 space-y-2 feature">
            <input wire:model.debounce.500ms="search" type="search"
                class="px-4 py-2 text-md rounded-md w-[400px] bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                placeholder="Search by user name,email,mobile">
            <select wire:model.debounce.500ms="payment_status"
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl">
                <option value="">Payment Status</option>
                <option value="1">Verified</option>
                <option value="0">Not Verified</option>
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
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid from</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid to</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">amount</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">transaction id</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid at</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid status</th>
                    <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">actions</th>
                </tr>
            </thead>
            <!-- end table head -->

            <!-- table body -->
            <tbody class="text-left text-gray-600">
                @forelse ($this->payments as $payment)
                @if ($payment->user)
                <!-- item -->
                <tr @class(["bg-teal-50"=> $loop->even])>
                    <td class="p-2 mb-4 text-sm font-normal tracking-wider normal-case border-r border-gray-200">
                        {{$loop->iteration}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        {{$payment->name}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        {{$payment->email}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        {{$payment->paid_from}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        {{$payment->paid_to}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        {{$payment->amount}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        {{$payment->txn_id}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        {{$payment->created_at->diffForHumans()}}
                    </td>
                    <td
                        class="p-2 mb-4 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        <select wire:change="statusChange({{$payment->id}}, $event.target.value)" @class(['w-full px-3
                            py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2
                            text-white' , 'bg-red-500'=>
                            $payment->status == 0
                            , 'bg-teal-500'=> $payment->status == 1
                            ])>
                            <option disabled>Select payment status</option>
                            <option @if($payment->status==0) selected @endif value="0">Unverified</option>
                            <option @if($payment->status==1) selected @endif value="1">Verified</option>
                        </select>
                    </td>
                    <td wire:ignore.self
                        class="flex items-center p-2 mb-4 space-x-2 space-y-2 text-sm font-normal tracking-wider text-center normal-case border-r border-gray-200">
                        <button wire:click.prevent="delete({{$payment->id}})" href="#" class="btn-bs-danger">
                            <svg wire:loading wire:target="delete({{$payment->id}})"
                                class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span wire:loading.remove wire:target="delete({{$payment->id}})">Delete</span>
                        </button>
                    </td>
                </tr>
                <!-- item -->
                @endif
                @empty
                <tr>
                    <td colspan='9' class="py-3 text-xl text-center">Opss!! No payments yet
                    </td>
                </tr>
                @endforelse
            </tbody>
            <!-- end table body -->

        </table>
        <!-- end a table -->
    </div>
    {{$this->payments->links()}}
</div>