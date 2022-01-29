@extends("user.layouts.app")

@section("title", "Home -- ".config("app.name"))

@section("content")
@if (!$maintenance->value)
<livewire:books />
@else
<div class="card">
    <div class="card-body" x-init>
        <div class="maint mx-auto text-center h-28 my-32">
            <h2 class="text-3xl text-center justify-center text-gray-700 mb-8 flex space-x-4 items-center font-light">
                <i class="fas fa-cog animate-spin text-6xl"></i>
                <span class="normal-case text-gray-500">SubhanAllaah! Site is under maintenance right now.</span>
            </h2>
        </div>
    </div>
</div>
@endif
@endsection