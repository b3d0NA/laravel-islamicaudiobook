@extends("admin.layouts.app")

@section("title", "Admin Messages - ".config("app.name"))

@push("custom-styles")
<style>
.scrollbar-w-2::-webkit-scrollbar {
    width: 0.25rem;
    height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
    --bg-opacity: 1;
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
    --bg-opacity: 1;
    background-color: #edf2f7;
    background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
    border-radius: 0.25rem;
}
</style>
@endpush

@section("content")
<div class="w-10/12 md:w-full mx-auto card">
    <div class="card-body">
        <h2 x-init class="mb-8 text-2xl font-bold text-center text-gray-700 flex justify-around">
            <a href="{{route('admin.users.messages.index')}}" class="text-2xl text-blue-500 hover:text-blue-700"><i
                    class="fas fa-arrow-left"></i></a>
            <span>Send Message to {{$user->name}}</span>
            <button @click="location.reload()" class="text-2xl text-blue-500 hover:text-blue-700"><i
                    class="fas fa-redo-alt transform rotate-180"></i></button>

        </h2>
        <!-- component -->
        <div
            class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-full md:w-full w-8/12 mx-auto bg-gradient-to-b from-stone-50 to-teal-50 rounded-lg shadow-md">
            <div id="messages"
                class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch h-[600px]">
                @forelse ($messages as $message)
                @if ($message->is_admin)
                <div class="chat-message">
                    <div class="flex items-end justify-end">
                        <div class="flex flex-col space-y-2 max-w-xs mx-2 order-1 items-end text-md">
                            <div><span
                                    class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white normal-case ">{{$message->message}}</span>
                            </div>
                        </div>
                        <img src="{{asset('images/logo.png')}}" alt="{{config('app.name')}}"
                            class="w-6 h-6 rounded-full order-1">
                    </div>
                </div>
                @else
                <div class="chat-message">
                    <div class="flex items-end">
                        <div class="flex flex-col space-y-2 max-w-xs mx-2 order-2 items-start text-md">
                            <div><span
                                    class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600 normal-case">{{$message->message}}</span>
                            </div>
                        </div>

                    </div>
                </div>

                @endif
                @empty
                <div class="chat-message">
                    <div class="flex items-end justify-end">
                        <div class="flex flex-col py-4 space-y-2 max-w-xs order-1 items-end text-md mx-auto">
                            <h2 class="text-center block bg-teal-100 rounded-lg p-3 px-9">No messages yet!</h2>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                <form action="{{route('admin.users.messages.store', $user->id)}}" method="POST">
                    @csrf
                    <div class="relative flex">
                        <input type="text" placeholder="Write messages to admin"
                            class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 px-5 bg-gray-200 rounded-full py-3"
                            name="message">
                        <div class="absolute right-0 items-center inset-y-0 sm:flex">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-6 w-6 transform rotate-90">
                                    <path
                                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push("custom-scripts")
<script>
const el = document.getElementById('messages')
el.scrollTop = el.scrollHeight
</script>
@endpush