@extends("admin.layouts.app")

@section("title", "Book Requests - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[75vw] w-[80vw]">

    <livewire:book-requests />

</div>

<livewire:user-view />
<livewire:approve-book-request />
<livewire:decline-book-request />
<livewire:delete-book-request />
<livewire:view-request />

@endsection