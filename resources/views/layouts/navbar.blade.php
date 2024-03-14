    <nav>
        <ul class="nav_list">
            <li class="nav-item mobile-home"><a class="nav-item mobile-home" href="{{ route('home') }}" > Home</a></li>
            <li ><a class="nav-item" href="{{route('food')}}">Foods</a></li>
@auth 
{{-- User is logged in --}}
<li class="sign_out">
<p class="nav_name">Hey {{ Auth::user()->name }}</p>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="nav-btn" type="submit">Sign out</button>
</form>
@else
{{-- User is not logged in --}}
<li>
    <form action="{{ route('login.show') }}" method="GET">
    <button class="nav-btn" type="submit">Sign in</button>
</form>

</li>
@endauth
        </ul>
    </nav>
    

 