@extends('layouts.app')


@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="container-login">
  <h2 class="title_login">Log in</h2>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="field">
      <label for="email" class="label">Email</label>
      <br>
      <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email"
        autofocus>
    </div>

    <div class="field">
      <label for="password" class="label">Password</label>
      <br>
      <input id="password" type="password" class="input" name="password" required autocomplete="current-password">
    </div>

    <div class="field">
      <input type="checkbox" id="remember" name="remember">
      <label class="label" for="remember">Remember me</label>
    </div>
    <div class="actions">
      <input type="submit" name="commit" value="Log in" class="btn-submit">
    </div>
  </form>

  @include('shared.links')

</div>
@endsection