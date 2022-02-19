@extends("user.layouts.auth")
@section("title", "Survey - ".config("app.name"))

@section("content")

<section class="flex flex-col items-center justify-center main-login">
    <div class="my-5 login-image">
        <h1 class="text-transparent logo-text bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600">
            {{config('app.name')}}</h1>
    </div>
    @if (!$maintenance->value)
    @if(!auth()->user()->survey)
    <div class="p-8 bg-white login-form rounded-xl md:w-[420px] w-[700px]">
        <h2 class="mb-4 text-2xl font-semibold text-center text-gray-600">Answer these questions</h2>
        @foreach ($errors->all() as $error)
        <div class="flex items-center my-3 space-x-3 normal-case alert alert-error">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-lg">{{$error}}</span>
        </div>
        @endforeach
        <form action="{{route('user.survey.store')}}" method="post" class="flex flex-col space-y-4 ">
            @csrf
            <div class="flex flex-col justify-center space-y-2">
                <label for="why_cant_buy_book" class="text-gray-600 text-lg">আপনি কেনো বই কিনতে পারেন না? </label>
                <textarea required
                    class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl h-44"
                    placeholder="উত্তর দিন" type="text" id="why_cant_buy_book"
                    name="why_cant_buy_book">{{old('why_cant_buy_book')}}</textarea>
            </div>
            <div class="flex flex-col justify-center space-y-2">
                <label for="monthlyMobileCosts" class="text-gray-600 text-lg">আপনার মাসিক মোবাইল খরচ কতো? </label>
                <input required
                    class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                    placeholder="উত্তর দিন" type="text" id="monthlyMobileCosts" value="{{old('monthly_mobile_costs')}}"
                    name="monthly_mobile_costs">
            </div>
            <div class="flex flex-col justify-center space-y-2">
                <label for="occupation" class="text-gray-600 text-lg">আপনার পেশা? </label>
                <input required
                    class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                    placeholder="উত্তর দিন" type="text" id="occupation" value="{{old('occupation')}}" name="occupation">
            </div>
            <div class="flex flex-col justify-center space-y-2">
                <label for="monthlyHandCosts" class="text-gray-600 text-lg">আপনার মাসিক হাত খরচ কতো? </label>
                <input required
                    class="p-2 px-4 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                    placeholder="উত্তর দিন" type="text" id="monthlyHandCosts" value="{{old('monthly_hand_costs')}}"
                    name="monthly_hand_costs">
            </div>
            <div class="flex flex-col justify-center space-y-2">
                <label class="text-gray-600 text-lg">আপনার ইন্টারনেট স্পিড কেমন? </label>
                <p class="mb-3">যেহেতু আপনাকে বইটি গুগল ড্রাইভ এর মাধ্যমে পড়তে হবে তাই আপনার একটি সচল ইন্টারনেট কানেকশন
                    প্রয়োজন হবে।
                    তাই 2G নেটওয়ার্কে বই টি পড়া সম্ভব হবে না। </p>
                <div class="flex items-center space-x-3">
                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="Wifi/Broadband নেটওয়ার্ক"
                        type="radio" id="internet_speed1" name="internet_speed"
                        {{ old('internet_speed') == 'Wifi/Broadband নেটওয়ার্ক' ? 'checked' : '' }}>
                    <label class="text-lg text-gray-700" for="internet_speed1">Wifi/Broadband নেটওয়ার্ক</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="4G ইন্টারনেট"
                        type="radio" id="internet_speed2" name="internet_speed"
                        {{ old('internet_speed') == '4G ইন্টারনেট' ? 'checked' : '' }}>
                    <label class="text-lg text-gray-700" for="internet_speed2">4G ইন্টারনেট</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none"
                        value="3G ইন্টারনেট - পড়তে সমস্যা হতে পারে" type="radio" id="internet_speed3"
                        name="internet_speed"
                        {{ old('internet_speed') == '3G ইন্টারনেট - পড়তে সমস্যা হতে পারে' ? 'checked' : '' }}>
                    <label class="text-lg text-gray-700" for="internet_speed3">3G ইন্টারনেট - পড়তে সমস্যা হতে পারে
                    </label>
                </div>
                <div class="flex items-center space-x-3">
                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none"
                        value="2G নেটওয়ার্কে আপনি বই পড়তে পারবেন" type="radio" id="internet_speed4"
                        name="internet_speed" {{ old('internet_speed') == '2G নেটওয়ার্কে আপনি বই পড়তে পারবেন
                        না' ? 'checked' : '' }}>
                    <label class="text-lg text-gray-700" for="internet_speed4">2G নেটওয়ার্কে আপনি বই পড়তে পারবেন
                        না</label>
                </div>
            </div>

            <div class="flex flex-col justify-center space-y-2">
                <label for="monthlyHandCosts" class="text-gray-600 text-lg">আপনি কি ওয়াদা দিচ্ছেন যে আপনি বইগুলো কারো
                    সাথে শেয়ার করবেন না? </label>
                <div class="flex items-center space-x-3">
                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="শেয়ার করবো না"
                        type="radio" id="is_promised1" name="is_promised">
                    <label class="text-lg text-gray-700" for="is_promised1">শেয়ার করবো না </label>
                </div>

                <div class="flex items-center space-x-3">
                    <input class="p-2 px-4 text-gray-500 bg-gray-50 focus:outline-none" value="না ওয়াদা করছি না"
                        type="radio" id="is_promised2" name="is_promised">
                    <label class="text-lg text-gray-700" for="is_promised2">না ওয়াদা করছি না </label>
                </div>
            </div>

            <button type="submit"
                class="flex items-center justify-center px-8 py-3 mx-auto space-x-2 text-white bg-teal-400 focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:outline-none hover:bg-teal-500 rounded-xl">
                <span>Submit</span>
                <i class="fal fa-poll-h text-lg"></i>
            </button>
        </form>
        <p class="mt-5 text-center normal-case text-md">পরে উত্তর দিবেন? Get into <a href="{{route('user.home')}}"
                class="text-blue-500 hover:underline">home</a></p>
    </div>
    @else
    <div class="p-10 m-32 text-white rounded-lg bg-red-500 text-center text-2xl">আলহামদুলিল্লাহ! আমরা আপনার প্রশ্নের
        উত্তর
        গুলো পেয়েছি। অনুগ্রহ
        করে এডমিন একসেপ্ট না করা পর্যন্ত অপেক্ষা করুন অথবা এডমিন কে <a href="{{route('user.messages.index')}}"
            class="text-sky-500 hover:underline">মেসেজ</a> করুন। ইনশা-আল্লাহ! </div>
    @endif
    @else
    <div class="px-4 mx-auto my-32 text-center maint h-28 sm:px-8">
        <h2
            class="flex items-center justify-center mb-8 space-x-4 text-3xl font-light text-center text-gray-700 sm:flex-col sm:space-y-6">
            <i class="text-6xl fas fa-cog animate-spin"></i>
            <span class="text-gray-500 normal-case">SubhanAllaah! Site is under maintenance right now. You can not
                take any survey</span>
        </h2>
    </div>
    @endif
</section>

@endsection