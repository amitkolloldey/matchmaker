@extends('front.layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('login') }}" class="row home-registration-form lf_form">
                    <div class="col-md-12">
                        @if(session()->has('warning'))
                            <div class="success">
                                <div class="alert alert-danger">
                                    {{session()->get('warning')}}
                                </div>
                            </div>
                        @endif
                        @if(session()->has('status'))
                            <div class="success">
                                <div class="alert alert-success">
                                    {{session()->get('status')}}
                                </div>
                            </div>
                        @endif
                        @if(session()->has('success_msg'))
                            <div class="success">
                                <div class="alert alert-success">
                                    {{session()->get('success_msg')}}
                                </div>
                            </div>
                        @endif
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

                    @csrf
                    <div class="home-reg-name home-reg-field lf_form_input col-md-6">
                        <label for="email" >{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="home-reg-email home-reg-field lf_form_input col-md-6">
                        <label for="password" >{{ __('Password') }}</label>
                            <input type="password" name="password" required>
                    </div>
                    <div class="home-reg-email home-reg-field lf_form_input col-md-12">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="col-md-4" ><h4><a style="color: #fff;" href="{{ route('password.request') }}">
                                {{ __('Reset Password?') }}
                            </a></h4></div>
                    <div class="col-md-4" >
                        <div class="la-button-default la-btn2 iam-btn">
                            <input type="submit" value="{{ __('Login') }}">
                        </div>
                    </div>
                    <div class="col-md-4" >

                    </div>
                    <div class="col-md-4 " >

                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
