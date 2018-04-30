@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="">
                <div class="edit_profile">
                    <a href="{{route('admin.matchmaker.edit',$user->id)}}">EDIT PROFILE</a>
                </div>

                <div class="mm_image">
                    <img src="{{asset("uploads/".$user->image)}}" alt="{{$user->image}}">
                </div>
                <div class="info_field">
                    <p>Name: {{$user->name}}</p>
                </div>
                <div class="info_field">
                    <p>Email: {{$user->email}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection