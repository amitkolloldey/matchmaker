@extends('admin.layouts.master')

@section('title')
    Users
@stop

@section('content')
    <div class="col-md-12">
        <div class="block margin-bottom-sm">
            <div class="table-responsive lf_table">
                <table class="table" id="lf_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rewards</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            @if($user->role_id != 1)
                            <tr>
                                <th>{{$user->id}}</th>
                                <th><img src="{{url('uploads/',$user->image)}}" alt="{{$user->name}}"
                                         class="img-thumbnail" width="50"></th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->rewards}}</td>
                                <td>{{$user->age}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td><a href="{{route('users.show',$user->id)}}" class="btn-primary btn">View</a>
                                    <form action="{{route('users.destroy',$user->id)}}" method="post"
                                          class="lf_delete_form">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger" onclick='return confirm("Are You Sure " +
                             "Want to Delete?")' value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @else ""
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

