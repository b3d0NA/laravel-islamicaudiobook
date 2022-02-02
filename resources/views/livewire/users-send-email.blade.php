<div class="card-body" x-init>
    <h2 class="mb-10 text-lg font-bold text-center">Send email to users</h2>

    <div class="w-6/12 max-w-full mx-auto md:w-full">
        @foreach ($errors->all() as $error)
        <div class="bg-red-500 normal-case text-white p-2 my-1 rounded-lg block">
            {{$error}}
        </div>
        @endforeach
        <div class="p-6 border rounded-lg">
            <label class="block mb-6">
                <span class="text-gray-700">To: </span>
                <select wire:model.debounce="type"
                    class="p-2 px-4 ml-5 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-xl"
                    name="gender">
                    <option value="0" selected>Mail to all inactive users</option>
                    <option value="1">Mail to all active users</option>
                    <option value="2">Mail to all paid users</option>
                    <option value="3">Individual Mail</option>
                </select>
            </label>
            @if ($type === 3)
            <label class="block mb-6">
                <span class="text-gray-700">Email address: </span>
                <input wire:model.defer="emails" name="email" type="email"
                    class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:outline-none focus:ring-opacity-50"
                    placeholder="abdullah@gmail.com, abdurrahman@gmail.com" required />
            </label>
            @endif
            <label class="block mb-6">
                <span class="text-gray-700">Subject: </span>
                <input wire:model.defer="subject" type="text"
                    class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:outline-none focus:ring-opacity-50"
                    @if ($type=='0' ) placeholder="eg: Opss! You are not eligible to read books..." @else
                    placeholder="eg: Alhamdulillah! You got the access to read books..." @endif required />
            </label>
            <label class="block mb-6 ">
                <span class="text-gray-700">Message</span>
                <textarea wire:model.defer="message" name="message"
                    class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:outline-none focus:ring-opacity-50"
                    rows="3" placeholder="Enter the message"></textarea>
            </label>
            <div class="mb-3">
                <button wire:loading.attr="disabled" wire:click="send" type="submit"
                    class="h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800 disabled:bg-indigo-300">
                    <svg wire:loading class="w-5 h-5 text-white animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span wire:loading.remove>Send</span>
                </button>
            </div>
        </div>
    </div>

</div>