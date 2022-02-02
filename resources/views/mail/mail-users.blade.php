@component('mail::message')
## As-Salamu Alaikum {{$user->name}},

{{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent