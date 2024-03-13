    <nav>
        <ul class="nav_list">
            <li><a href="{{ route('home') }}" class="nav-item mobile-home"> Home</a></li>
            @if(auth()->check())
            <li class="sign_out">
            <p class="nav_name">Hey {{ auth()->user()->name }}</p>
            <p>logout</p>     
            </li>
            @else
            <li >Sign in</li>
            @endif
       
        </ul>
    </nav>
    

