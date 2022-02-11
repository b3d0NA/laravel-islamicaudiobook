@extends("user.layouts.app")

@section("title", "Contact Us - ".config("app.name"))

@section("content")
<div class="w-10/12 md:w-full mx-auto card">
    <div class="card-body">
        <h2 x-init class="mb-8 text-2xl font-bold text-center text-gray-700 flex justify-around">
            <span>Contact Us</span>

        </h2>
        <!-- component -->
        @foreach ($errors->all() as $error)
        <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
            {{$error}}
        </div>
        @endforeach
        @if (session('success'))
        <div class="flex items-center mb-5 space-x-4 alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>{{session('success')}}</span>
        </div>
        @endif
        <form action="{{route('user.contact.sendmail')}}" method="POST" class="w-full max-w-lg mx-auto">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 md:mb-6 mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Name
                    </label>
                    <input type="text"
                        class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="name" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        E-mail
                    </label>
                    <input type="email"
                        class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="email" placeholder="Enter your email address" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Subject
                    </label>
                    <input type="text"
                        class="w-full px-4 py-2 bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        name="subject" placeholder="Enter your subject" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Message
                    </label>
                    <textarea
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                        name="message"></textarea>
                </div>
            </div>
            <div class="flex items-center">
                <div class="w-1/3">
                    <button
                        class="shadow bg-teal-400 hover:bg-teal-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Send
                    </button>
                </div>
                <div class="md:w-2/3"></div>
            </div>
        </form>
    </div>
</div>

@endsection