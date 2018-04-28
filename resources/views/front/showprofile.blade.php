@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="title-page profile_title text-center">
                    <h2>{{$user->name}}'s Profile</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile_picture">
                            <img src="{{url('uploads',$user->image)}}" alt="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="show_profile_info">
                            <h2><strong>Name:</strong>{{$user->name}} </h2>
                            <h2><strong>Age:</strong>{{$user->age}} </h2>
                            <h2><strong>Email:</strong>{{$user->email}} </h2>
                            <h2><strong>Wants To Reward:</strong>{{$user->rewards}} </h2>

                        </div>
                    </div>
                    <div class="col-md-12 more_user_info">
                        <h2><strong>Preferences:</strong> </h2>
                        <p>{!! $user->preferances !!}</p>
                    </div>
                    <div class="col-md-12 more_user_info">
                        <h2><strong>Other:</strong> </h2>
                        <p>{!! $user->other !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection