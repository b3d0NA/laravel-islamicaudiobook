@extends("admin.layouts.app")

@section("title", "Featured Books - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[75vw] w-[80vw]">

    <livewire:featured-books />

</div>

<livewire:add-featured-books />
<livewire:edit-featured-book />
<livewire:delete-featured-book />
<livewire:change-featured-book-status />
@endsection