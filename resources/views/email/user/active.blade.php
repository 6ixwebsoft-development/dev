@component('mail::message')
<H1>Activated !!!</H1>
<p>Hi {{$data['name']}}, your account is Activated Now</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
