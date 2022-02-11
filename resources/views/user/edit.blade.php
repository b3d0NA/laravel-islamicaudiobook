@extends("user.layouts.app")

@section("title", "Edit Profile - ".config("app.name"))

@section("content")
<div class="w-10/12 mx-auto card">
    <div class="card-body">
        <h2 class="mb-8 text-2xl font-bold text-center text-gray-700">Edit Profile</h2>
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

        <div class="flex md:space-y-10 md:flex-col">
            <div class="w-6/12 px-8 mx-auto mr-10 form-wrapper md:w-full sm:px-2">
                <div
                    class="flex justify-around w-full px-8 mb-10 space-x-3 xl:flex-col xl:space-y-4 xl:justify-center xl:items-center sm:w-full sm:space-y-3 sm:flex-col sm:px-0 sm:justify-center">
                    <h3 class="flex items-center space-x-3 text-gray-500 sm:flex-col sm:space-y-3"><span>Group
                            Status:</span>
                        <span @class([ 'px-8 py-2 text-xl text-center text-white rounded-md' ,'bg-teal-500'=>
                            $user->group_status,
                            'bg-red-500' => !$user->group_status
                            ])>
                            @if ($user->group_status)
                            Active
                            @else
                            Inactive
                            @endif
                        </span>
                    </h3>
                    <h3 class="flex items-center space-x-3 text-gray-500 sm:flex-col sm:space-y-3"><span>Paid
                            Status:</span>
                        <span @class([ 'px-8 py-2 text-xl text-center text-white rounded-md' ,'bg-teal-500'=>
                            $user->paid_status,
                            'bg-red-500' => !$user->paid_status
                            ])>
                            @if ($user->paid_status)
                            Active
                            @else
                            Inactive
                            @endif
                        </span>
                    </h3>
                </div>
                <form action="{{route('user.edit')}}" method="post">
                    @csrf

                    @error("email")
                    <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    <div class="flex flex-col justify-center my-3 space-y-4">
                        <label class="font-base text-md">Name: </label>
                        <input type="text"
                            class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                            value="{{$user->name}}" disabled readonly>
                    </div>
                    <div class="flex flex-col justify-center my-3 space-y-4">
                        <label class="font-base text-md">Email: </label>
                        <input type="email"
                            class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="email" value="{{$user->email}}">
                    </div>
                    <div class="flex flex-col justify-center my-3 space-y-4">
                        <label class="font-base text-md">Mobile: </label>
                        <input type="text"
                            class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                            value="{{$user->mobile}}" readonly disabled>
                    </div>
                    <div class="flex flex-col justify-center my-3 space-y-4">
                        <label class="font-base text-md">Facebook: </label>
                        <input type="text"
                            class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                            value="{{$user->fb_link}}" disabled readonly>
                    </div>

                    <div class="submit-btn sm:mt-7 sm:mx-auto mt-14">
                        <button type="submit" name="submit"
                            class="px-6 py-2 text-white rounded-lg bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500">Save</button>
                    </div>
                </form>
            </div>
            <div class="w-6/12 px-8 mx-auto form-wrapper sm:w-full sm:px-2">
                <form action="{{route('user.changepwd')}}" method="post">
                    @csrf
                    @error("current_password")
                    <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    @error("new_password")
                    <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    @error("confirm_new_password")
                    <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    <div class="flex flex-col justify-center my-3 space-y-4">
                        <label class="font-base text-md">Current Password: </label>
                        <input type="password"
                            class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="current_password">
                    </div>
                    <div class="flex flex-col justify-center my-3 space-y-4">
                        <label class="font-base text-md">New Password: </label>
                        <input type="password"
                            class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="new_password">
                    </div>
                    <div class="flex flex-col justify-center my-3 space-y-4">
                        <label class="font-base text-md">Confirm new Password: </label>
                        <input type="password"
                            class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="confirm_new_password">
                    </div>
                    <div class="submit-btn mt-7">
                        <button type="submit" name="submit"
                            class="px-6 py-2 text-white rounded-lg bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection