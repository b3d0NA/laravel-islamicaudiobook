@extends("admin.layouts.app")

@section("title", "Visitors - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[70vw] w-[75vw]">
    <livewire:visitors />
</div>


<livewire:user-view />
@endsection
