@extends('admin.layouts.master')

@section('title')
    Edit Role
@stop

@section('content')
    <div class="col-md-12">
        <div class="block margin-bottom-sm">
            @if(count($errors) > 0)
            <div class="errors">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                   @endforeach
            </div>
            @endif
            <form class="form-horizontal" action="{{route('roles.update',$role->id)}}" method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="name">Role Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Role Name"
                               value="{{$role->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

