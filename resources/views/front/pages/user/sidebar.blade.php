<div class="user-sidebar">
    <ul>
        <li><a href="{{route('front.user.mypage')}}" class="{{  request()->routeIs('front.user.mypage') ? 'active' : '' }}">My Page</a></li>
        <li><a href="{{route('front.user.chatroom')}}" class="{{  request()->routeIs('front.user.chatroom') ? 'active' : '' }}">Chat Room</a></li>
        <li><a href="#">Change Password</a></li>
    </ul>
</div>