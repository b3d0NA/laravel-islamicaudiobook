@extends("user.layouts.app")

@section("title", "Home - ".config("app.name"))

@section("content")
@guest
<div class="w-11/12 mx-auto rounded-md main-section" x-data="{isOpen: true}">
    <div x-show="isOpen" x-transition.duration.300ms
        class="flex items-center p-3 px-3 space-x-3 rounded-lg bg-gradient-to-r from-sky-400 to-teal-500 notice">
        <svg @click="isOpen = false" class="w-6 h-6 text-white cursor-pointer hover:fill-red-500 animate-spin"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="w-11/12 text-white text-md">
            {{$guest_notice->value}}
        </p>
    </div>
</div>
@endguest
@auth
<x-notices :active-notice='$active_notice' :inactive-notice='$inactive_notice' :paid-notice='$paid_notice' />
@endauth


<x-featured-books />


@if (!$maintenance->value)
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