<section
    class="relative flex flex-row items-center justify-around mb-10 bg-gray-200 sm:flex-col sm:h-fit h-28 sm:space-y-3 sm:py-4 w-100 header">
    @auth
    <div class="flex items-center navigation">
        <a href="{{route('user.edit.index')}}"
            class="px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-800 bg-stone-300">Edit
            Profile</a>
    </div>
    @endauth
    <a href="{{route('user.home')}}">
        <img class="w-[100px]" src="{{asset('images/logo.png')}}" alt="ISLAMIC AUDIOBOOK">
    </a>
    @auth
    <div class="flex flex-col items-center navigation justify-self-end">
        <p class="p-2 px-4 bg-gray-100 rounded-xl">{{auth()->user()->name}}</p>
        <form action="{{route('user.logout')}}" method="post">
            @csrf
            <button type="submit" title="Logout"
                class="flex p-2 px-4 space-x-3 text-white hover:from-orange-500 hover:to-amber-400 bg-gradient-to-l from-amber-400 to-orange-500 rounded-xl">
                <span>Logout</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </form>
    </div>
    @endauth
    @guest
    <div class="flex flex-col items-center navigation justify-self-end">
        <a href="{{route('user.login.index')}}" title="Logout"
            class="flex p-2 px-4 space-x-3 text-white transition duration-300 bg-gradient-to-l hover:from-teal-500 hover:to-green-400 from-green-300 to-teal-400 rounded-xl">
            <span>Login</span>
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </a>
    </div>
    @endguest
</section>