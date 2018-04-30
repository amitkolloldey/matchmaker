@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('password.request') }}" method="post" class="row home-registration-form lf_form">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="col-md-12">
                        @if(count($errors)>0)
                            <div class="errors">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="home-reg-name home-reg-field lf_form_input col-md-6">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input type="email" name="email" value="{{old('email') }}" required autofocus>
                    </div>
                    <div class="home-reg-email home-reg-field lf_form_input col-md-6">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" name="password" required/>
                    </div>
                    <div class="home-reg-email home-reg-field lf_form_input col-md-6">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" required/>
                    </div>
                    <div class="col-md-4" ></div>
                    <div class="la-button-default la-btn2 iam-btn
                     col-md-4" >
                        <button type="submit">{{ __('Set Password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
