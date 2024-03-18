    <nav>
      <ul class="nav_list">
        <li class="nav-item mobile-home"><a class="nav-item mobile-home" href="{{ route('home') }}"> Home</a></li>
        <li><a class="nav-item" href="{{route('food')}}">Foods</a></li>
        <li><a class="nav-item" href="{{route('recipe.index')}}">Recipes</a></li>
        <li><a class="nav-item" href="{{route('public_recipes')}}">Public Recipes</a></li>
        <li><a class="nav-item" href="{{route('general_shopping_list')}}">General Shopping List</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Languages
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Fr</a></li>
            <li><a class="dropdown-item" href="#">en</a></li>
          </ul>
        </li>

        @auth
        {{-- User is logged in --}}
        <li class="sign_out">
          <p class="nav_name">Hey {{ Auth::user()->name }}</p>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="nav-btn" type="submit">Sign out</button>
          </form>
        </li>
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