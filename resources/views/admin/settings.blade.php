@extends("admin.layouts.app")

@section("title", "Settings - ".config("app.name"))

@section("content")
<div class="card">
    <div class="card-body" x-init>
        <h2 class="font-bold text-2xl text-center text-gray-700 mb-8">Site Settings</h2>
        <form action="{{route('admin.settings.update')}}" method="post">
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
            <div class="maintenance flex items-center space-x-4 ">
                <label class="font-base text-lg ">Maintenace Mode: </label>
                <select required
                    class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                    name="maintenance">
                    <option @if($maintenance->value == 0) selected @endif value="0">De Activate</option>
                    <option @if($maintenance->value == 1) selected @endif value="1">Activate</option>
                </select>
            </div>
            <div class="submit-btn mt-14">
                <button type="submit" name="submit"
                    class="px-6 py-2 bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>


</div>

@endsection