@component('mail::message')
    <p>Ви отримали нову заявку</p>
    <p>{{$application['subject']}}</p>
    <p>{{$application['message']}}</p>
    <p>{{$application->user['name']}}</p>
    <p>{{$application->user['email']}}</p>
@endcomponent
