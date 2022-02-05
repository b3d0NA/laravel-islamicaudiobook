<div>
@if (auth()->user()->group_status == "0" && $inactive_notice->value)
<div class="w-11/12 mx-auto rounded-md main-section" x-data="{isOpen: true}">
    <div x-show="isOpen" x-transition.duration.300ms class="flex items-center p-3 px-3 space-x-3 rounded-lg bg-gradient-to-r from-sky-400 to-teal-500 notice">
        <svg @click="isOpen = false" class="w-6 h-6 text-white cursor-pointer hover:fill-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="w-11/12 text-white text-md">
            {{$inactive_notice->value}}
        </p>
    </div>
</div>
@elseif (auth()->user()->group_status == "1" && $active_notice->value)
<div class="w-11/12 mx-auto rounded-md main-section" x-data="{isOpen: true}">
    <div x-show="isOpen" x-transition.duration.300ms class="flex items-center p-3 px-3 space-x-3 rounded-lg bg-gradient-to-r from-sky-400 to-teal-500 notice">
        <svg @click="isOpen = false" class="w-6 h-6 text-white cursor-pointer hover:fill-red-500 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="w-11/12 text-white text-md">
            {{$active_notice->value}}
        </p>
    </div>
</div>
@elseif (auth()->user()->paid_status == "1" && $paid_notice->value)
<div class="w-11/12 mx-auto rounded-md main-section" x-data="{isOpen: true}">
    <div x-show="isOpen" x-transition.duration.300ms class="flex items-center p-3 px-3 space-x-3 rounded-lg bg-gradient-to-r from-sky-400 to-teal-500 notice">
        <svg @click="isOpen = false" class="w-6 h-6 text-white cursor-pointer hover:fill-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="w-11/12 text-white text-md">
            {{$paid_notice->value}}
        </p>
    </div>
</div>
@endif
</div>