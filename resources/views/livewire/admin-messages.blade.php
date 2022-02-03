<div class="card-body">
    <div class="px-3 border-b w-full">
        <input wire:model.debounce.500ms="search"
            class="p-3 flex-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-lg"
            type="search" placeholder="Search by name, email, number">
    </div>

    <div class="flex-1 flex flex-col">
        @forelse ($this->users as $user)
        @if ($user->messages)
        <!-- message -->
        <a href="{{route('admin.users.messages.view', $user->id)}}"
            class="flex items-center shadow-xs transition-all duration-300 ease-in-out p-5 hover:shadow-md cursor-pointer">

            <div class="flex flex-col space-y-1 justify-center items-center">
                <h1 class="ml-3">{{$user->name}}</h1>
                <h1 class="text-xs text-gray-600 normal-case">{{$user->email}}</h1>
            </div>
            <p class="ml-6 flex-1 text-xs">{{$user->lastMessage()->message}}</p>
            <p class="font-bold text-gray-900">{{$user->lastMessage()->created_at->diffForHumans()}}</p>
        </a>
        <!-- message -->
        @endif
        @empty
        <div class="block p-3 text-2xl text-gray-700 rounded-lg">No messages yet!</div>
        @endforelse



    </div>
    {{$this->users->links()}}
</div>