@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-sm-12 col-md-8 col-lg-push-3 col-md-push-2">

                <form id="mm_profile_form" action="{{route('matchmaker.login.check')}}" method="post"
                      class="row lf_form">

                    <input value="{{ csrf_token() }}" name="_token" type="text" hidden>
                    <div class="lf_form_input col-md-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" required><span
                                class="err_email"></span>
                    </div>
                    <div class="lf_form_input col-md-12">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your Password" minlength="6" required><span
                                class="err_password"></span>
                    </div>

                    <div class="col-md-12">
                        <div class="la-button-default la-btn2 iam-btn" style="">
                            <input id="login" type="submit" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection