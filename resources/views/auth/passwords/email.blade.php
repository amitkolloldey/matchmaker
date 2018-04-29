@extends('front.layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('password.email') }}" class="row home-registration-form lf_form">
                    @csrf
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
                    <div class="home-reg-name home-reg-field lf_form_input col-md-12">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-4" ></div>
                    <div class="la-button-default la-btn2 iam-btn
                     col-md-4" >
                        <button type="submit">{{ __('Send Set Password Link') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
