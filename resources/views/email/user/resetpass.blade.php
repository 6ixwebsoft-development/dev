@component('mail::message')
<h1>Hi {{$data['name']}},</h1>

Use This OTP <strong>{{$data['otp']}}</strong> to Reset Your Account's Password.


Thanks,<br>
{{ config('app.name') }}
@endcomponent