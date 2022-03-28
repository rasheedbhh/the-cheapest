<h1>i am a user</h1>
<ul class="list-unstyled user-profile-nav">
    <li><a href="{{route('profile.show')}}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
    <form method="POST" action="{{ route('logout') }}">
     @csrf
    <li><a href="{{route('logout')}}"  onclick="event.preventDefault();
     this.closest('form').submit();"><i class="icon ion-power"></i>{{ __('Log Out') }}</a></li>
  </form>
  </ul>