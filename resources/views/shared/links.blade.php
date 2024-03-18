@if(isset($controllerName) && $controllerName !== 'LoginController')
<p><a href="{{ route('login') }}">Log in</a></p>
@endif

@if(isset($controllerName) && $controllerName !== 'RegisterController')
<p><a href="{{route('password.request')}}">Forget Password ?</a></p>
<p><a href="{{ route('register.show') }}">Register</a></p>
@endif

@if ((isset($controllerName) && $controllerName === 'LoginController') && (auth()->check() && !auth()->user()->email_verified_at))
<p> <a href="{{route('resend.verification.email')}}">resend verification email</a></p>

@endif