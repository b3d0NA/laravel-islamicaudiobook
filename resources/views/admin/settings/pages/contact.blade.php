@extends("admin.layouts.app")

@section("title", "Settings - ".config("app.name"))


@section("content")
<div class="card">
    <div class="card-body" x-init>

        <h2 class="mb-8 text-2xl font-bold text-center text-gray-700 flex space-x-4 justify-center items-center">
            <a href="{{route('admin.settings.pages.index')}}" class="">
                <svg class="h-8 w-8 hover:fill-blue-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <span>Contact Us Page Settings</span>
        </h2>
        <form action="{{route('admin.settings.pages.contact.update')}}" method="post">
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
            <div class="flex items-center mt-4 space-x-4">
                <label class="text-lg font-base ">Contact Email: </label>
                <input
                    class="px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                    name="contact" value="{{$contact}}" />
            </div>
            <div class="submit-btn mt-14">
                <button type="submit" name="submit"
                    class="px-6 py-2 text-white rounded-lg bg-gradient-to-r from-sky-400 to-teal-400 hover:from-teal-500 hover:to-sky-500">Save</button>
            </div>
        </form>
    </div>


</div>

@endsection

@push("custom-scripts")
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('ckPageContent');
</script>
@endpush