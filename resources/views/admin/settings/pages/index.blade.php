@extends("admin.layouts.app")

@section("title", "Settings - ".config("app.name"))

@section("content")
<div class="card">
    <div class="card-body">
        <h1 class="flex items-center justify-center mb-8 space-x-4 text-2xl font-bold text-center text-gray-700">
            <a href="{{route('admin.settings.index')}}" class="">
                <svg class="w-8 h-8 hover:fill-blue-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <span>Pages Settings</span>
        </h1>
        <a href="{{route('admin.settings.pages.payment.index')}}"
            class="block p-5 shadow-xs cursor-pointer hover:shadow-md">
            Payment Page
        </a>
        <a href="{{route('admin.settings.pages.terms.index')}}"
            class="block p-5 shadow-xs cursor-pointer hover:shadow-md">
            Terms & Condition Page
        </a>
        <a href="{{route('admin.settings.pages.contact.index')}}"
            class="block p-5 shadow-xs cursor-pointer hover:shadow-md">
            Contact Us Page
        </a>
        <a href="{{route('admin.settings.pages.disclaimer.index')}}"
            class="block p-5 shadow-xs cursor-pointer hover:shadow-md">
            Disclaimer Page
        </a>
    </div>
</div>

@endsection