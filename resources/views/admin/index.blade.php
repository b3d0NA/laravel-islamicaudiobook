@extends("admin.layouts.app")

@section("title", "Dashboard - ".config("app.name"))

@section("content")
<!-- strat content -->
<div class="flex-1 p-6 bg-gray-100 md:mt-16">
    <!-- General Report -->
    @include('admin.index.generalReport')
    <!-- End General Report -->
    <livewire:dashboard-visitors-summary />
</div>
<livewire:inactive-users />
<livewire:user-view />
<livewire:toggle-user-group-status />
<!-- end content -->
@endsection

@push("custom-scripts")
@endpush
