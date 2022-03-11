@extends("user.layouts.app")

@section("title", "Make Payment - ".config("app.name"))

@section("content")
<div class="w-10/12 mx-auto card">
    <div class="card-body">
        <h2 class="text-2xl font-bold text-center text-gray-700">Make Payment</h2>
        @if($paymentStatus)
        <p class="mb-8 italic text-center normal-case">Make a payment to become a paid member</p>
        @else
        <p class="mb-8 italic text-center normal-case text-red-500">Sorry! Paid membership is not available for now.</p>
        @endif

        @if($paymentStatus)
        @if (session('success'))
        <div class="flex items-center mb-5 space-x-4 alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>{{session('success')}}</span>
        </div>
        @endif

        <div class="flex md:space-y-10 md:flex-col-reverse">
            <div class="w-6/12 px-8 mx-auto mr-10 form-wrapper md:w-full sm:px-2">
                <form action="{{route('user.payment.store')}}" method="post">
                    @csrf
                    @foreach ($errors->all() as $error)
                    <div class="flex items-center my-3 space-x-3 normal-case md:space-x-0 alert alert-error">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$error}}</span>
                    </div>
                    @endforeach
                    <div class="flex w-full space-x-3 md:space-x-0 input-row md:flex-col">
                        <div class="flex flex-col justify-center w-6/12 my-3 space-y-4 md:w-full">
                            <label class="font-base text-md">Name: </label>
                            <input type="text"
                                class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                                value="{{$user->name}}" disabled>
                        </div>
                        <div class="flex flex-col justify-center w-6/12 my-3 space-y-4 md:w-full">
                            <label class="font-base text-md">Email: </label>
                            <input type="email"
                                class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                                value="{{$user->email}}" disabled>
                        </div>
                    </div>
                    <div class="flex w-full space-x-3 md:space-x-0 input-row md:flex-col">
                        <div class="flex flex-col justify-center w-6/12 my-3 space-y-4 md:w-full">
                            <label class="font-base text-md">Paid from Mobile number: </label>
                            <input type="number"
                                class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                                name="paid_from" required>
                        </div>
                        <div class="flex flex-col justify-center w-6/12 my-3 space-y-4 md:w-full">
                            <label class="font-base text-md">Paid to: </label>
                            <select required
                                class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                                name="paid_to">
                                <option disabled>Select paid to</option>
                                <option value="bKash">bKash</option>
                                <option value="Rocket">Rocket</option>
                                <option value="Nagad">Nagad</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex w-full space-x-3 md:space-x-0 input-row md:flex-col">
                        <div class="flex flex-col justify-center w-6/12 my-3 space-y-4 md:w-full">
                            <label class="font-base text-md">Paid Amount: </label>
                            <input type="number"
                                class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                                name="amount" required>
                        </div>
                        <div class="flex flex-col justify-center w-6/12 my-3 space-y-4 md:w-full">
                            <label class="font-base text-md">Transaction ID: </label>
                            <input type="text"
                                class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                                name="txn_id">
                        </div>
                    </div>
                    <div class="submit-btn sm:mt-7 sm:mx-auto mt-14">
                        <button type="submit" name="submit"
                            class="px-6 py-2 text-white rounded-lg bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500">Submit</button>
                    </div>
                </form>
            </div>
            <div class="w-6/12 px-8 mx-auto my-5 normal-case md:w-full form-wrapper sm:w-full sm:px-2">
                {!!$paymentContent!!}
            </div>
        </div>
        @endif
        <div class="w-10/12 mx-auto mt-10 overflow-auto border rounded-lg bg-gray-50 border-stone-100">
            <h2 class="py-5 text-2xl text-center text-gray-700">Your Last Payments</h2>
            <div class="table p-3 mx-auto my-4 rounded-lg bg-teal-50">
                <table class="w-full mx-auto overflow-x-scroll border table-auto rounded-xl">
                    <!-- table head -->
                    <thead class="text-center bg-gray-50 rounded-xl">
                        <tr>
                            <th class="py-5 text-sm font-semibold tracking-wide capitalize">No.</th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">name</th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">email</th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid from</th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid to</th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">amount</th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">transaction id
                            </th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid at
                            </th>
                            <th class="py-5 text-sm font-semibold tracking-wide text-center capitalize">paid status</th>
                        </tr>
                    </thead>
                    <!-- end table head -->

                    <!-- table body -->
                    <tbody class="text-left text-gray-600">
                        @forelse ($payments as $payment)
                        <!-- item -->
                        <tr @class(["bg-teal-50"=> $loop->even])>
                            <td
                                class="p-2 mb-4 text-sm font-normal tracking-wider normal-case border-r border-gray-200">
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
                                <div wire:change="statusChange({{$payment->id}}, $event.target.value)" @class(['w-full
                                    px-3 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500
                                    focus:ring-offset-2 text-white' , 'bg-red-500'=>
                                    $payment->status == 0
                                    , 'bg-teal-500'=> $payment->status == 1
                                    ])>
                                    @if($payment->status==0) Unverified @endif
                                    @if($payment->status==1) Verified @endif
                                </div>
                            </td>

                        </tr>
                        <!-- item -->
                        @empty
                        <tr>
                            <td colspan='9' class="py-3 text-xl text-center">Opss!! No payments yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <!-- end table body -->

                </table>
            </div>
        </div>
    </div>


</div>

@endsection