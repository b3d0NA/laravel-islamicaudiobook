@extends("user.layouts.auth")
@section("title", "Register || ".config("app.name"))

@section("content")

<section class="flex flex-col items-center justify-center main-login h-[900px]">
    <div class="mb-5 login-image">
        <img class="w-40" src="{{asset('images/logo.png')}}" alt="ISLAMIC AUDIOBOOK">
    </div>
    @if (!$maintenance->value)
    <div class="p-5 bg-white login-form rounded-xl md:w-[320px] w-[400px]">
        <h2 class="mb-4 text-2xl font-semibold text-center text-gray-600">Register</h2>
        @foreach ($errors->all() as $error)
        <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{$error}}</span>
        </div>
        @endforeach
        <form action="{{route('user.register')}}" method="post" class="flex flex-col space-y-4 ">
            @csrf
            <input required
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                placeholder="Enter your name" type="text" name="name">
            <input required
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                placeholder="Enter your email address" type="email" name="email">
            <input required
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                placeholder="Enter your password" type="password" name="password">
            <input required
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                placeholder="Enter your mobile number" type="number" name="mobile">
            <input
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                placeholder="Enter your facebook account link" type="text" name="fb_link">
            <select required
                class="p-2 px-4 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                name="gender">
                <option disabled>Select your gender</option>
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
            <button type="submit"
                class="flex items-center justify-center w-5/12 px-8 py-3 mx-auto space-x-2 text-white bg-blue-400 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none hover:bg-blue-500 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span>Register</span>
            </button>
        </form>
        <p class="mt-5 text-center normal-case">Already have an account? Login <a href="{{route('user.login.index')}}"
                class="text-blue-500 hover:underline">here</a></p>
    </div>
    @else
    <div class="px-4 mx-auto my-32 text-center maint h-28 sm:px-8">
        <h2 class="flex items-center justify-center mb-8 space-x-4 text-3xl font-light text-center text-gray-700 sm:flex-col sm:space-y-6">
            <i class="text-6xl fas fa-cog animate-spin"></i>
            <span class="text-gray-500 normal-case">SubhanAllaah! Site is under maintenance right now. You can not register</span>
        </h2>
    </div>
    @endif
</section>

@endsection