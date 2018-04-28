@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="title-page profile_title text-center">
                    <h2>{{$user->name}}'s Profile</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @include('front.partials.profilelinks')
                </div>
                <div class="col-md-8">
                    <div class="profile_info">
                        <form action="{{ route('profile.password.change',$user->id)}}" method="post" class="row
                        home-registration-form lf_form">
                            {{csrf_field()}}

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
                            <div class="home-reg-email home-reg-field lf_form_input col-md-12">
                                <label for="password">{{ __('New Password') }}</label>
                                <input type="password" name="password" required/>
                            </div>
                            <div class="home-reg-email home-reg-field lf_form_input col-md-12">
                                <label for="password-confirm">{{ __('Confirm New Password') }}</label>
                                <input type="password" name="password_confirmation" required/>
                            </div>
                            <div class="col-md-12">
                                <input class="lf_pink_button" type="submit" value="{{ __('Change Password') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection