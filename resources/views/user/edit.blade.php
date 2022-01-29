@extends("user.layouts.app")

@section("title", "Edit Profile - ".config("app.name"))

@section("content")
<div class="card w-10/12 mx-auto">
    <div class="card-body">
        <h2 class="font-bold text-2xl text-center text-gray-700 mb-8">Edit Profile</h2>
        @if (session('success'))
        <div class="alert alert-success mb-5 flex space-x-4 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>{{session('success')}}</span>
        </div>
        @endif

        <div class="flex md:space-y-10 md:flex-col">
            <div class="form-wrapper md:w-full w-6/12 mx-auto sm:px-2 px-8 mr-10">
                <div
                    class="flex sm:w-full sm:space-y-3 w-full sm:flex-col space-x-3 sm:px-0 px-8 mb-10 justify-around sm:justify-center">
                    <h3 class="text-gray-500 flex sm:flex-col space-x-3 sm:space-y-3 items-center"><span>Group
                            Status:</span>
                        <span @class([ 'px-8 py-2 text-xl text-center text-white rounded-md' ,'bg-teal-500'=>
                            $user->group_status,
                            'bg-red-500' => !$user->group_status
                            ])>
                            @if ($user->group_status)
                            Active
                            @else
                            Un Active
                            @endif
                        </span>
                    </h3>
                    <h3 class="text-gray-500 flex sm:flex-col space-x-3 sm:space-y-3 items-center"><span>Paid
                            Status:</span>
                        <span @class([ 'px-8 py-2 text-xl text-center text-white rounded-md' ,'bg-teal-500'=>
                            $user->paid_status,
                            'bg-red-500' => !$user->paid_status
                            ])>
                            @if ($user->paid_status)
                            Active
                            @else
                            Un Active
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
                    <div class="flex flex-col justify-center space-y-4 my-3">
                        <label class="font-base text-md">Name: </label>
                        <input type="text"
                            class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                            value="{{$user->name}}" disabled readonly>
                    </div>
                    <div class="flex flex-col justify-center space-y-4 my-3">
                        <label class="font-base text-md">Email: </label>
                        <input type="text"
                            class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="email" value="{{$user->email}}">
                    </div>
                    <div class="flex flex-col justify-center space-y-4 my-3">
                        <label class="font-base text-md">Mobile: </label>
                        <input type="text"
                            class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                            value="{{$user->mobile}}" readonly disabled>
                    </div>
                    <div class="flex flex-col justify-center space-y-4 my-3">
                        <label class="font-base text-md">Facebook: </label>
                        <input type="text"
                            class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 disabled:bg-gradient-to-r disabled:text-gray-500 disabled:from-sky-50 disabled:to-teal-50"
                            value="{{$user->fb_link}}" disabled readonly>
                    </div>

                    <div class="submit-btn sm:mt-7 sm:mx-auto mt-14">
                        <button type="submit" name="submit"
                            class="px-6 py-2 bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500 text-white rounded-lg">Save</button>
                    </div>
                </form>
            </div>
            <div class="form-wrapper sm:w-full mx-auto w-6/12 sm:px-2 px-8">
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
                    <div class="flex flex-col justify-center space-y-4 my-3">
                        <label class="font-base text-md">Current Password: </label>
                        <input type="password"
                            class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="current_password">
                    </div>
                    <div class="flex flex-col justify-center space-y-4 my-3">
                        <label class="font-base text-md">New Password: </label>
                        <input type="password"
                            class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="new_password">
                    </div>
                    <div class="flex flex-col justify-center space-y-4 my-3">
                        <label class="font-base text-md">Confirm new Password: </label>
                        <input type="password"
                            class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            name="confirm_new_password">
                    </div>
                    <div class="submit-btn mt-7">
                        <button type="submit" name="submit"
                            class="px-6 py-2 bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500 text-white rounded-lg">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection