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
    <h2 class="title_login">Input your new password</h2>

    <form method="post" action="{{route('password.update')}}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="field">
            <label for="password" class="label">Password</label>
            <br>
            <input id="password" type="password" class="input" name="password" required autocomplete="new-password">
        </div>

        <div class="field">
            <label for="password_confirmation" class="label">Password confirmation</label>
            <br>
            <input id="password_confirmation" type="password" class="input" name="c_password" required autocomplete="new-password">
        </div>

        <div class="actions">
            <input type="submit" class="btn-submit" value="Change password" />
        </div>

    </form>


</div>

@endsection