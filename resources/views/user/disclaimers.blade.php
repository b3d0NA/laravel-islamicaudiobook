@extends("user.layouts.app")

@section("title", "Disclaimers - ".config("app.name"))

@section("content")
<div class="w-10/12 md:w-full mx-auto card">
    <div class="card-body">
        <h2 x-init class="mb-8 text-2xl font-bold text-center text-gray-700 flex justify-around">
            <span>Disclaimers</span>

        </h2>
        <!-- component -->
        <div class="contents">
            {!!$disclaimer!!}
        </div>
    </div>
</div>

@endsection