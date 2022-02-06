@extends("admin.layouts.auth-app")

@section("title", "Login - Admin || ".config("app.name"))

@section("content")
<section class="flex flex-col items-center justify-center main-login h-[600px]">
    <div class="p-5 bg-white login-form rounded-xl md:w-[320px] w-[400px] flex flex-col items-center">
        <div class="mb-5 login-image">
            <h1 class="text-transparent logo-text bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600">{{config('app.name')}}</h1>
        </div>
        <h2 class="mb-4 text-2xl font-semibold text-center text-gray-600">Admin Login</h2>
        @foreach ($errors->all() as $error)
        <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{$error}}</span>
        </div>
        @endforeach
        <form action="{{route('admin.login')}}" method="post" class="flex flex-col space-y-4 ">
            @csrf
            <input required
                class="p-2 px-4 py-3 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                placeholder="Admin Email" type="email" name="email">
            <input required
                class="p-2 px-4 py-3 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                placeholder="Admin Password" type="password" name="password">
            <button type="submit"
                class="flex items-center justify-center w-6/12 px-6 py-3 mx-auto space-x-2 text-white bg-blue-400 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none hover:bg-blue-500 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span>Login</span>
            </button>
        </form>
    </div>
</section>
@endsection