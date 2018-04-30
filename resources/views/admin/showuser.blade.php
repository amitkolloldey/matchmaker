@extends('admin.layouts.master')

@section('title')
    {{$user->name}}'s Info
@stop

@section('content')
    <div class="col-md-12">
        <div class="block margin-bottom-sm lf_user_info">
            <img src="{{url('uploads/',$user->image)}}" alt="{{$user->name}}" class="img-thumbnail" width="200">
            <h2><strong>Name:</strong> {{$user->name}}</h2>
            <h2><strong>Email:</strong> {{$user->email}}</h2>
            <h2><strong>Rewards:</strong> {{$user->rewards}}</h2>
            <h2><strong>Age:</strong> {{$user->age}}</h2>
            <h2><strong>Gender:</strong> {{$user->gender}}</h2>
            <h2><strong>Preferences:</strong></h2>
            <p>
                {{$user->preferances}}
            </p>
            <h2><strong>Other:</strong></h2>
            <p>
                {{$user->other}}
            </p>
        </div>
    </div>
@stop

