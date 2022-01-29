@extends("admin.layouts.app")

@section("title", "Change Password - ".config("app.name"))

@section("content")
<div class="card">
    <div class="card-body">
        <h2 class="font-bold text-2xl text-center text-gray-700 mb-8">Change Password</h2>
        <div class="form-wrapper w-4/12 mx-auto">
            <form action="{{route('admin.changepwd')}}" method="post">
                @csrf
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
                @foreach ($errors->all() as $error)
                <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{$error}}</span>
                </div>
                @endforeach
                <div class="flex flex-col justify-center space-x-4 space-y-4 my-3">
                    <label class="font-base text-md">Current Password: </label>
                    <input type="password"
                        class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="current_password">
                </div>
                <div class="flex flex-col justify-center space-x-4 space-y-4 my-3">
                    <label class="font-base text-md">New Password: </label>
                    <input type="password"
                        class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="new_password">
                </div>
                <div class="flex flex-col justify-center space-x-4 space-y-4 my-3">
                    <label class="font-base text-md">Confirm new Password: </label>
                    <input type="password"
                        class="w-full py-2 px-4 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="confirm_new_password">
                </div>
                <div class="submit-btn mt-14">
                    <button type="submit" name="submit"
                        class="px-6 py-2 bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500 text-white rounded-lg">Save</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection