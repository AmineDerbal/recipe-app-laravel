@extends('layouts.app')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="container-login">
    <h2 class="title_login">Forgot your passwords</h2>

    <form method="POST" action="{{route('password.email')}}">
        @csrf
        <div class="field">
            <label for="email" class="label">Email</label>
            <br>
            <input id="email" type="email" class="input" name="email" required autocomplete="email" autofocus>
        </div>

        <div class="actions">
            <input type="submit" name="commit" value="Send me reset password email" class="btn-submit">
        </div>

    </form>


</div>

@endsection