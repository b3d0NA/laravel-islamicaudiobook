@extends("admin.layouts.app")

@section("title", "Users Messages - ".config("app.name"))

@section("content")
<div class="col-span-6 card flex flex-col">
    <livewire:admin-messages />
</div>
@endsection