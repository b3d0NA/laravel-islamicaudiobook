@extends("admin.layouts.app")

@section("title", "Users - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[70vw] w-[75vw]">
    <livewire:users />
</div>

<livewire:user-edit />
<livewire:user-delete />
<livewire:toggle-user-group-status />
<livewire:toggle-user-paid-status />
@endsection