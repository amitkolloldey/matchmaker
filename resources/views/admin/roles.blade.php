@extends('admin.layouts.master')

@section('title')
    Roles
    @stop

@section('content')
    <div class="col-md-12">
        <div class="block margin-bottom-sm">
            <div class="title"><strong><a href="{{route('roles.create')}}" class="btn btn-primary">Add
                        New</a></strong></div>
            <div class="table-responsive lf_table">
                <table class="table" id="lf_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Last Updated</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($roles) > 0)
                        @foreach($roles as $role)
                    <tr>
                        <th>{{$role->id}}</th>
                        <td>{{$role->name}}</td>
                        <td>{{$role->created_at->diffForHumans()}}</td>
                        <td>{{$role->updated_at->diffForHumans()}}</td>
                        <td><a href="{{route('roles.edit',$role->id)}}" class="btn-primary btn">Edit</a>
                        @if(!$role->id == "1" || !$role->id == "2" )
                            <form action="{{route('roles.destroy',$role->id)}}" method="post" class="lf_delete_form">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" onclick='return confirm("Are You Sure " +
                                 "Want to Delete?")' value="Delete">
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else

                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop

@section('scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#lf_table').DataTable();
        } );
    </script>
    @stop

