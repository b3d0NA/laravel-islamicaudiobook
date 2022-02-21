<section
    x-init
    class="relative flex flex-row items-center justify-around mb-10 bg-gray-200 sm:flex-col sm:h-fit h-28 sm:space-y-3 sm:py-4 w-100 header">
    @auth
    <div class="flex items-center space-x-1 navigation sm:flex-col sm:space-y-3">
        <button @click="$dispatch('open-navbar')" class="hidden md:block">
            <i class="text-2xl text-transparent fas fa-bars bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600"></i>
        </button>
        <div class="flex items-center space-x-1 md:hidden navigation sm:flex-col sm:space-y-3">
            <a href="{{route('user.edit.index')}}"
                class="flex items-center px-3 py-2 space-x-2 text-sm text-gray-600 border rounded-lg border-stone-300 hover:bg-gradient-to-r hover:from-stone-100 hover:to-teal-50 hover:text-gray-800">
                <i class="text-transparent fas fa-edit bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600"></i>
                <span>
                    Edit
                    Profile
                </span>
            </a>
            <a href="{{route('user.messages.index')}}"
                class="flex items-center px-3 py-2 space-x-2 text-sm text-gray-600 border rounded-lg border-stone-300 hover:bg-gradient-to-r hover:from-stone-100 hover:to-teal-50 hover:text-gray-800">
                <i class="text-transparent fas fa-comment-alt-dots bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600"></i>
                <span>
                    Message
                    Admin
                </span>
            </a>
            <a href="{{route('user.payment.index')}}"
                class="flex items-center px-3 py-2 space-x-2 text-sm text-gray-600 border rounded-lg border-stone-300 hover:bg-gradient-to-r hover:from-stone-100 hover:to-teal-50 hover:text-gray-800">
                <i class="text-transparent fas fa-money-check-alt bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600"></i>
                <span>Make Payment</span>
            </a>
        </div>
    </div>
    <div @open-navbar.window="$el.classList.remove('-translate-x-full')" @close-navbar.window="$el.classList.add('-translate-x-full')" class="absolute top-0 left-0 z-30 hidden w-8/12 h-screen p-5 ease-in-out -translate-x-full rounded-lg shadow-xl bg-gradient-to-b from-sky-50 to-teal-50 md:block">


        <div @click="$dispatch('close-navbar')" class="hidden mb-2 text-right md:block">
              <button id="sideBarHideBtn">
                  <i class="text-xl fad fa-times-circle"></i>
              </button>
        </div>
        <div class="flex flex-col items-center space-y-3 navigation">
            <a href="{{route('user.edit.index')}}"
                class="flex items-center px-3 py-2 space-x-2 text-sm text-gray-600 border rounded-lg border-stone-300 hover:bg-gradient-to-r hover:from-stone-100 hover:to-teal-50 hover:text-gray-800">
                <i class="text-transparent fas fa-edit bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600"></i>
                <span>
                    Edit
                    Profile
                </span>
            </a>
            <a href="{{route('user.messages.index')}}"
                class="flex items-center px-3 py-2 space-x-2 text-sm text-gray-600 border rounded-lg border-stone-300 hover:bg-gradient-to-r hover:from-stone-100 hover:to-teal-50 hover:text-gray-800">
                <i class="text-transparent fas fa-comment-alt-dots bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600"></i>
                <span>
                    Message
                    Admin
                </span>
            </a>
            <a href="{{route('user.payment.index')}}"
                class="flex items-center px-3 py-2 space-x-2 text-sm text-gray-600 border rounded-lg border-stone-300 hover:bg-gradient-to-r hover:from-stone-100 hover:to-teal-50 hover:text-gray-800">
                <i class="text-transparent fas fa-money-check-alt bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600"></i>
                <span>Make Payment</span>
            </a>
        </div>
    </div>
    @endauth
    <a href="{{route('user.home')}}" class="w-4/12 text-center md:w-fit">
        <h1 class="text-center text-transparent logo-text bg-clip-text bg-gradient-to-br from-blue-400 to-teal-600">
            {{config('app.name')}}</h1>
    </a>
    @auth
    <div x-data="{isOpen: false}" class="relative flex items-center navigation justify-self-end">
        <button @click="isOpen = true" class="flex items-center justify-between">
            <p class="p-2 px-4">{{auth()->user()->name}}</p>
            <i class="text-xl fas fa-angle-down"></i>
        </button>

        <div x-cloak x-show="isOpen" x-transition.scale.origin.top @click.away="isOpen = false" class="absolute flex flex-col items-center p-3 px-4 space-y-3 rounded-lg shadow-md left-4 top-12 profile-options bg-stone-100">
            <div class="flex items-center justify-center space-x-3">
                <span class="text-sm text-gray-500">Group:</span>
                <span
                    @class(['
                        p-2 px-3 text-white rounded-lg',
                        'bg-teal-500'=> auth()->user()->group_status,
                        'bg-red-500' => !auth()->user()->group_status
                    ])>
                    @if (auth()->user()->group_status)
                        Active
                    @else
                        Inactive
                    @endif
                </span>
            </div>
            <div class="flex items-center justify-center space-x-3">
                <span class="text-sm text-gray-500">Paid:</span>
                <span  @class(['p-2 px-3 text-white rounded-lg',
                        'bg-teal-500'=> auth()->user()->paid_status,
                        'bg-red-500' => !auth()->user()->paid_status
                    ])>
                    @if (auth()->user()->paid_status)
                        Active
                    @else
                        Inactive
                    @endif
                </span>
            </div>
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

    </div>
    @endauth
    @guest
    <div class="flex space-x-4 log-reg">
        <div class="flex flex-col items-center navigation justify-self-end">
            <a href="{{route('user.login.index')}}" title="Login"
                class="flex p-2 px-4 space-x-3 text-white transition duration-300 bg-gradient-to-l hover:from-blue-500 hover:to-indigo-400 from-blue-300 to-indigo-400 rounded-xl">
                <span>Login</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </a>
        </div>
        @if ($registration_status->value == 1)
        <div class="flex flex-col items-center navigation justify-self-end">
            <a href="{{route('user.register.index')}}" title="Regsiter"
                class="flex p-2 px-4 space-x-3 text-white transition duration-300 bg-gradient-to-l hover:from-teal-500 hover:to-green-400 from-green-300 to-teal-400 rounded-xl">
                <span>Register</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </a>
        </div>
        @endif
    </div>
    @endguest
</section>
