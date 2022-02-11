@extends("user.layouts.app")

@section("title", "Terms & Conditions - ".config("app.name"))

@section("content")
<div class="w-10/12 md:w-full mx-auto card">
    <div class="card-body">
        <h2 x-init class="mb-8 text-2xl font-bold text-center text-gray-700 flex justify-around">
            <span>Terms & Conditions</span>

        </h2>
        <!-- component -->
        <div class="contents">
            {!!$terms!!}
        </div>
    </div>
</div>

@endsection