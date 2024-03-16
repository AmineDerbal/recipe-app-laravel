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
  <h2 class="title_login">Sign up</h2>

  <form method="POST" action="{{ route('register.store') }}">
    @csrf
    <div class="field">
      <label for="name" class="label">Name</label>
      <br>
      <input id="name" type="text" class="input" name="name" required autocomplete="name" autofocus>
    </div>
    <div class="field">
      <label for="email" class="label">Email</label>
      <br>
      <input id="email" type="email" class="input" name="email" required autocomplete="email" autofocus>
    </div>
    <div class="field">
      <label for="password" class="label">Password</label>
      <br>
      <input id="password" type="password" class="input" name="password" required autocomplete="new-password">
    </div>
    <div class="field">
      <label for="password_confirmation" class="label">Password confirmation</label>
      <br>
      <input id="password_confirmation" type="password" class="input" name="c_password" required
        autocomplete="new-password">
    </div>
    <div class="actions"> <input type="submit" name='commit' class="btn-submit" value="Sign up"> </div>
  </form>
  @include('shared.links')

</div>

@endsection