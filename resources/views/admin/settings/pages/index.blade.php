@extends("admin.layouts.app")

@section("title", "Settings - ".config("app.name"))

@section("content")
<div class="card">
    <div class="card-body">
        <h1 class="mb-8 text-2xl font-bold text-center text-gray-700 flex space-x-4 justify-center items-center">
            <a href="{{route('admin.settings.index')}}" class="">
                <svg class="h-8 w-8 hover:fill-blue-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <span>Pages Settings</span>
        </h1>
        <a href="{{route('admin.settings.pages.terms.index')}}"
            class="p-5 shadow-xs cursor-pointer hover:shadow-md block">
            Terms & Condition Page
        </a>
        <a href="{{route('admin.settings.pages.contact.index')}}"
            class="p-5 shadow-xs cursor-pointer hover:shadow-md block">
            Contact Us Page
        </a>
        <a href="{{route('admin.settings.pages.disclaimer.index')}}"
            class="p-5 shadow-xs cursor-pointer hover:shadow-md block">
            Disclaimer Page
        </a>
    </div>
</div>

@endsection