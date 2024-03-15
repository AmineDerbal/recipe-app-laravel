@if(isset($controllerName) && $controllerName !== 'LoginController')
<p><a href="{{ route('login') }}">Log in</a></p>
@endif

@if(isset($controllerName) && $controllerName !== 'RegisterController')
<p><a href="{{ route('register.show') }}">Register</a></p>
@endif