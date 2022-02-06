@extends("user.layouts.app")

@section("title", "Home - ".config("app.name"))

@section("content")
@if (!$maintenance->value)
@auth
<x-notices :active-notice='$active_notice' :inactive-notice='$inactive_notice' :paid-notice='$paid_notice' />
@endauth
<livewire:books />
@else
<div class="card">
    <div class="card-body">
        <div class="mx-auto my-32 text-center maint h-28">
            <h2 class="flex items-center justify-center mb-8 space-x-4 text-3xl font-light text-center text-gray-700">
                <i class="text-6xl fas fa-cog animate-spin"></i>
                <span class="text-gray-500 normal-case">SubhanAllaah! Site is under maintenance right now.</span>
            </h2>
        </div>
    </div>
</div>
@endif
@endsection