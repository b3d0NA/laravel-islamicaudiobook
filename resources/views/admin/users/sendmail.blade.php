@extends("admin.layouts.app")

@section("title", "Send Mail - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[70vw] w-[75vw]">
    <livewire:users-send-email />
</div>

@endsection