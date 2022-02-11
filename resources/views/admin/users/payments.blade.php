@extends("admin.layouts.app")

@section("title", "Payments - ".config("app.name"))

@section("content")
<div class="card md:!w-full xl:w-[70vw] w-[75vw]">

    <livewire:payments />

</div>

<livewire:change-payment-status />
<livewire:delete-payments />
@endsection