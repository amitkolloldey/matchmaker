@component('mail::message')

    Welcome to the site {{$user['name']}}<br/>
    Please Confirm The Activation Link
    <br/>
    @component('mail::button', ['url' => route('user.activate', $activation['token'])])
        Activate Account
    @endcomponent
    Thanks,
    {{ config('app.name') }}
@endcomponent