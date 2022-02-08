@extends("admin.layouts.app")

@section("title", "Settings - ".config("app.name"))

@section("content")
<div class="card">
    <div class="card-body" x-init>
        <h2 class="mb-8 text-2xl font-bold text-center text-gray-700">Site Settings</h2>
        <form action="{{route('admin.settings.update')}}" method="post">
            @csrf
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
            <div class="flex items-center space-x-4 maintenance ">
                <label class="text-lg font-base ">Maintenace Mode: </label>
                <select required
                    class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                    name="maintenance">
                    <option @if($maintenance->value == 0) selected @endif value="0">De Activate</option>
                    <option @if($maintenance->value == 1) selected @endif value="1">Activate</option>
                </select>
            </div>
            <div class="flex items-center mt-4 space-x-4">
                <label class="text-lg font-base ">Active users notice: </label>
                <textarea
                        class="px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="active_users_notice">{{$active_u_notice->value}}</textarea>
            </div>
            <div class="flex items-center mt-4 space-x-4">
                <label class="text-lg font-base ">Inactive users notice: </label>
                <textarea
                        class="px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="inactive_users_notice">{{$inactive_u_notice->value}}</textarea>
            </div>
            <div class="flex items-center mt-4 space-x-4">
                <label class="text-lg font-base ">Paid users notice: </label>
                <textarea
                        class="px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="paid_users_notice">{{$paid_u_notice->value}}</textarea>
            </div>
            <div class="flex items-center mt-4 space-x-4">
                <label class="text-lg font-base ">Guests notice: </label>
                <textarea
                        class="px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="guests_notice">{{$guest_notice->value}}</textarea>
            </div>
            <div class="submit-btn mt-14">
                <button type="submit" name="submit"
                    class="px-6 py-2 text-white rounded-lg bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500">Save</button>
            </div>
        </form>
    </div>


</div>

@endsection