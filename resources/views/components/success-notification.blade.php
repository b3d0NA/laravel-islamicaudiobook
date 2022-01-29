@props([
"isRedirected" => false,
"successMessage" => "",
])

<div x-cloak x-data="{
        isOpen: false,
        successMessage: '{{$successMessage}}',
        showNotification(message) {
            this.isOpen=true
            this.successMessage=message
            setTimeout(() => {
                this.isOpen=false
            }, 5000)
        }
    }" x-init="
        @if ($isRedirected)
            $nextTick(() => showNotification(successMessage));
        @else
        Livewire.on('BookAddedSuccesfully', (message) => {
            showNotification(message)
        })
        Livewire.on('BookUpdatedSuccesfully', (message) => {
            showNotification(message)
        })
        Livewire.on('BookDeletedSuccessfully', (message) => {
            showNotification(message)
        })
        Livewire.on('UserUpdatedSuccesfully', (message) => {
            showNotification(message)
        })
        Livewire.on('UserDeletedSuccessfully', (message) => {
            showNotification(message)
        })
        Livewire.on('UserGroupStatusUpdatedSuccessfully', (message) => {
            showNotification(message)
        })
        Livewire.on('UserPaidStatusUpdatedSuccessfully', (message) => {
            showNotification(message)
        })
        @endif
    " x-show="isOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-8"
    x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-9" @keydown.window.esc="isOpen=false"
    class="notification px-4 py-3 border border-green-500 rounded-lg bg-white flex justify-between fixed bottom-5 right-5 space-x-6 z-20">
    <div class="flex items-center space-x-2">
        <div>
            <svg class="text-green-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="text-base font-semibold text-gray-600" x-text="successMessage"></div>
    </div>
    <button @click="isOpen=false" class="text-gray-500 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>