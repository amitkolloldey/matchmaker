@if(Auth::check())
    <div class="profile_links">
        <ul>
            <li><a href="{{route('user.profile',Auth::user()->id)}}">Profile</a></li>
            <li><a href="{{route('profile.share',Auth::user()->id)}}">Sharing</a></li>
            <li><a href="Profile">Matching History</a></li>
            <li><a href="{{route('admin.matchmaker.request',Auth::user()->id)}}">Request MatchMaker</a></li>
            {{--after clicking this link show a popup and confirm to go the link--}}
            <li><a href="{{route('password.change',Auth::user()->id)}}">Change Password</a></li>
        </ul>
    </div>
@endif