@extends("admin.layouts.app")

@section("title", "Settings - ".config("app.name"))

@section("content")
<div class="card">
    <div class="card-body">
        <h1 class="text-2xl text-center pb-3 border-b border-gray-200">Settings</h1>
        <a href="{{route('admin.settings.general.index')}}" class="p-5 shadow-xs cursor-pointer hover:shadow-md block">
            General Settings
        </a>
        <a href="{{route('admin.settings.pages.index')}}" class="p-5 shadow-xs cursor-pointer hover:shadow-md block">
            Pages Settings
        </a>
    </div>
</div>

@endsection