@extends('front.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <form action="{{route('front.register')}}" method="post" class="row home-registration-form lf_form">
                    <div class="col-md-12">
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
                    {{csrf_field()}}
                    <div class="home-reg-name home-reg-field lf_form_input col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name" value="{{old('name')}}">
                    </div>
                    <div class="home-reg-email home-reg-field lf_form_input col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                    </div>
                    <div class="home-reg-rewards home-reg-field col-md-12">
                        <h2>How much do you want to reward for an introduction ?</h2>
                        <label class="radio-inline">
                            <input type="radio" name="rewards" value="Hugs/Good Karma">Hugs/Good Karma
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rewards" value="$5">$5
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rewards" value="$10">$10
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rewards" value="$20">$20
                        </label>
                    </div>
                    <div class="col-md-4" ></div>
                    <div class="la-button-default la-btn2 iam-btn
                     col-md-4" >
                            <button type="submit">Create</button>
                    </div>
                    <div class="col-md-4" >
                    </div>
                    <div class="col-md-4" >

                    </div>
                    <div class="col-md-4" >
                        <h2>Or</h2>
                        <a href="{{url('login')}}" >
                            <div class="la-button-default la-btn2 iam-btn" style="">
                                Login
                            </div>
                        </a>
                    </div>

                </form>
        </div>
    </div>
</div>
@stop