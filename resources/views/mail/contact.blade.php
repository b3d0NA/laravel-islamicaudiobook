@component('mail::message')
## As-Salamu Alaikum, You got a message from miftiradia.com --

@component('mail::panel')
Name: {{$name}} <br />
Email: {{$email}} <br />
Subject: {{$subject}} <br />
Message: {{$message}} <br />
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent