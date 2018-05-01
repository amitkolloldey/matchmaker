@extends('admin.layouts.master')

@section('title')
    Create Role
@stop

@section('content')
    <div class="col-md-12">
        <div class="block margin-bottom-sm">
            <form class="form-horizontal" action="{{route('roles.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="name">Role Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Role Name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

