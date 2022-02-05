<div class="card-body">
    <div class="w-full px-3 border-b">
        <input wire:model.debounce.500ms="search"
            class="flex-1 w-full p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            type="search" placeholder="Search by name, email, number">
    </div>

    <div class="flex flex-col flex-1 space-y-2">
        @forelse ($this->messages as $message)
        @if ($message->user)
        <!-- message -->
        <a href="{{route('admin.users.messages.view', $message->user_id)}}"
            @class([
                'flex items-center p-5 transition-all duration-300 ease-in-out shadow-xs cursor-pointer hover:shadow-md',
                'bg-red-200 font-bold' => $message->is_read == "0",
                'mt-4' => $loop->first
            ])>

            <div class="flex flex-col items-center justify-center space-y-1">
                <h1 class="ml-3">{{$message->user->name}}</h1>
                <h1 class="text-xs text-gray-600 normal-case">{{$message->user->email}}</h1>
            </div>
            <p class="flex-1 ml-6 text-xs">{{$message->message}}</p>
            <p class="font-bold text-gray-900">{{$message->created_at->diffForHumans()}}</p>
        </a>
        <!-- message -->
        @endif
        @empty
        <div class="block p-3 text-2xl text-gray-700 rounded-lg">No messages yet!</div>
        @endforelse



    </div>
    {{$this->messages->links()}}
</div>