@extends('layouts.app')

@section('content')
<h2>Register</h2>
<form method="post" action="{{ route('apiRegister') }}">
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
</div>
<div class="mb-3"> 
    <label for="password-confirm" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password-confirm" name="c_password">
</div>
<button type="submit" class="btn btn-primary">Register</button>

</form>

@endsection