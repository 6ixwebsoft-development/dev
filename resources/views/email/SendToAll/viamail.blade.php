@component('mail::message')
<h2>Hi There,</h2>
<p><b>{{$data->userData->name}}</b> Schedule this mail for you with the message Below,</p>
<p><u>Message</u>:</p>
<p>{{$data->description}}</p>
@if($data->media_type == 'image' )
<img src="{{$data->media_link}}">
@else
<video width="320" height="240" controls>
<source src="{{$data->media_link}}" type="video/mp4">  
</video>
Video Link :{{$data->media_link}}
@endif
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
