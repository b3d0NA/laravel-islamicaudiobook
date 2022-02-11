@extends("admin.layouts.app")

@section("title", "Virtual Library - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[75vw] w-[80vw]">

    <livewire:virtual-library />

</div>

<livewire:add-vlib-book />
<livewire:edit-vlib-book />
<livewire:delete-vlib-book />
<livewire:change-book-status />
@endsection