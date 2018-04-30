<nav id="sidebar">
    <!-- Sidebar Header-->
    @if(Auth::check())
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{url('uploads/',Auth::user()->image)}}" alt="{{Auth::user()->name}}" class="img-fluid
        rounded-circle"></div>
            <div class="title">
                <h1 class="h5">{{Auth::user()->name}}</h1>
            </div>
        </div>
    @endif


    <ul class="list-unstyled">
        <li><a href="#mm" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-heartbeat"></i>Matchmaker
                Management</a>
            <ul id="mm" class="collapse list-unstyled ">
                <li><a href="#">Matchmakers</a></li>
            </ul>
        </li>
        <li><a href="#um" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-users"></i>User
                Management</a>
            <ul id="um" class="collapse list-unstyled ">
                <li><a href="{{route('users.index')}}">Users</a></li>
                <li><a href="{{route('roles.index')}}">Roles</a></li>
            </ul>
        </li>
     </ul>
</nav>