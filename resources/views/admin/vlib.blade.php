@extends("admin.layouts.app")

@section("title", "Virtual Library - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[70vw]">

    <livewire:virtual-library />

</div>

<livewire:add-vlib-book />
<livewire:edit-vlib-book />
<livewire:delete-vlib-book />
@endsection