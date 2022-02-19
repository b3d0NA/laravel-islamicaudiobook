@if ($books->first())
<div class="w-8/12 py-8 mx-auto my-8 border border-gray-200 rounded-xl bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="card-body">
        <div class="mx-auto text-center main">
            <h2 class="py-5 text-2xl font-bold text-gray-600">Featured Books</h2>
            <div class="flex flex-wrap items-center justify-center space-x-8 space-y-8 sm:flex-col sm:space-x-0 books">
                @foreach ($books as $book)
                <div
                    class="rounded-2xl book w-[230px] border border-gray-200 overflow-hidden hover:shadow-md transition ease-in-out min-h-[480px]">
                    <div class="rounded-tr-2xl rounded-br-2xl min-h-[300px] w-[230px] overflow-hidden book-image">
                        <img class="object-contain w-full transition ease-in-out cursor-pointer hover:scale-105 aspect-auto rounded-tr-2xl rounded-br-2xl"
                            src="{{$book->cover_link}}" alt="{{$book->name}}">
                    </div>
                    <div class="mt-2 text-center book-info">
                        <h2 class="my-3 text-xl font-bold text-gray-700">{{$book->name}}</h2>
                        @if (!$book->expire_time->isPast())
                        <a class="flex items-center justify-center px-2 py-2 m-auto mb-3 space-x-2 text-white transition ease-in-out bg-teal-400 w-fit rounded-xl hover:bg-teal-500 focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            target="_blank" href="{{$book->read_link}}">
                            <span>Read Book</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        @endif
                        <p class="my-3 text-xs italic text-gray-500">Ends at: <span
                                class="endsAt">{{$book->expire_time->format('m/d/Y')}}</span></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@push('custom-scripts')
<script>
(function CountDownTimer() {
    const allELements = document.querySelectorAll(".endsAt");
    [...allELements].map(function(elem) {
        const dt = elem.textContent;
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {
                clearInterval(timer);
                elem.innerHTML = "EXPIRED!";

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            elem.innerHTML = days + "days ";
            elem.innerHTML += hours + "hrs ";
            elem.innerHTML += minutes + "mins ";
            elem.innerHTML += seconds + "secs";
        }

        timer = setInterval(showRemaining, 1000);
    });
})();
</script>
@endpush


@endif