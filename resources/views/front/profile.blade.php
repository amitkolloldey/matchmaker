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
                    @if(session()->has('image_update_success'))
                        <div class="success">
                            <div class="alert alert-success">
                                {{session()->get('image_update_success')}}
                            </div>
                        </div>
                    @endif
                    <div class="profile_picture">

                        <img src="{{url('/uploads',$user->image)}}" alt="">
                        <form action="{{route('profile.image.post',$user->id)}}" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <p class="upload-text">Click To choose Image</p>
                            <input type="file" name="image">
                            <input type="submit" value="Upload Avater">
                        </form>
                    </div>

                    @include('front.partials.profilelinks')
                </div>
                <div class="col-md-8">
                    <div class="profile_info">
                        <form action="{{route('user.profile.update',$user->id)}}" method="post" class="row lf_form">
                            <div class="col-md-12">
                                @if(session()->has('password_update_success'))
                                    <div class="success">
                                        <div class="alert alert-success">
                                            {{session()->get('password_update_success')}}
                                        </div>
                                    </div>
                                @endif
                                @if(session()->has('profile_update_success'))
                                    <div class="success">
                                        <div class="alert alert-success">
                                            {{session()->get('profile_update_success')}}
                                        </div>
                                    </div>
                                @endif
                                @if(session()->has('success_activate_msg'))
                                    <div class="success">
                                        <div class="alert alert-info">
                                            {{session()->get('success_activate_msg')}}
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
                            <div class="lf_form_input col-md-12">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Name" value="{{$user->name}}">
                            </div>
                            <div class="lf_form_input col-md-12">
                                <label for="email">Email</label>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="col-md-12 lf_form_input ">
                                <h2>How much do you want to reward for an introduction ?</h2>
                                <label class="radio-inline">
                                    <input type="radio" name="rewards" value="Hugs/Good Karma" {{ $user->rewards ==
                                    'Hugs/Good Karma' ? 'checked' : '' }}>Hugs/Good Karma
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rewards" value="$5" {{ $user->rewards ==
                                    '$5' ? 'checked' : '' }}>$5
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rewards" value="$10" {{ $user->rewards ==
                                    '$10' ? 'checked' : '' }}>$10
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rewards" value="$20" {{ $user->rewards ==
                                    '$20' ? 'checked' : '' }}>$20
                                </label>
                            </div>
                            <div class="col-md-12 lf_form_input ">
                                <h2>Gender</h2>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="male" {{ $user->gender ==
                                    'male' ? 'checked' : '' }}>Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="female" {{ $user->gender ==
                                    'female' ? 'checked' : '' }}>Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="other" {{ $user->gender ==
                                    'other' ? 'checked' : '' }}>Other
                                </label>
                            </div>
                            <div class="lf_form_input col-md-12">
                                <label for="age">Age</label>
                                <input type="text" name="age" placeholder="Age" value="{{$user->age}}">
                            </div>
                            <div class="lf_form_input col-md-12">
                                <label for="preferances">Preferences</label>
                                <textarea name="preferances" id="lfmce">{{$user->preferances}}</textarea>
                            </div>
                            <div class="lf_form_input col-md-12">
                                <label for="other">Other</label>
                                <textarea name="other" id="lfmce">{{$user->other}}</textarea>
                            </div>
                            <div class="col-md-12 lf_form_input ">
                                <h2>Make Your Profile Public?</h2>
                                <label class="radio-inline">
                                    <input type="radio" name="public_visibility" value="0" {{ $user->public_visibility ==
                                    '0' ? 'checked' : '' }}>No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="public_visibility" value="1" {{ $user->public_visibility ==
                                    '1' ? 'checked' : '' }}>Yes
                                </label>
                            </div>
                            <div class="col-md-12" >
                                    <div class="la-button-default la-btn2 iam-btn" style="">
                                        <button type="submit">{{ __('Update Profile') }}</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection