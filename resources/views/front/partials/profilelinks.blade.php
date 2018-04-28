 @if(Auth::check())
<div class="profile_links">
    <ul>
        <li><a href="{{route('user.profile',Auth::user()->id)}}">Profile</a></li>
        <li><a href="{{route('profile.share',Auth::user()->id)}}">Sharing</a></li>
        <li><a href="Profile">Matching History</a></li>
        <li><a href="{{route('password.change',Auth::user()->id)}}">Change Password</a></li>
    </ul>
</div>
@endif