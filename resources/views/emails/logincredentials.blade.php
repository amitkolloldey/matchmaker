@component('mail::message')

    Here are you login credentials. Please set new password after login.<br>
    <strong>Username:</strong>{{$user->user->email}} <br>
    <strong>Password:</strong>{{$user->user->password}} <br>
    Thanks,
    {{ config('app.name') }}
@endcomponent