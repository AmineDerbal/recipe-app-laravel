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

<form method="POST" action="{{ route('food.create') }}">
  @csrf
  <div class="field">
    <label class="label" style="display: block;">Name</label>
    <input class="input" type="text" name="name" required>
  </div>
  <div class="field">
    <label class="label" style="display: block;">Measurement_unit</label>
    <input class="input" type="text" name="measurement_unit" maxlength="10" placeholder="max 10 characters" required>
  </div>
  <div class="field">
    <label class="label" style="display: block;">Quantity</label>
    <input class="input" type="number" name="quantity" required>
  </div>
  <div class="field">
    <label class="label" style="display: block;">Price</label>
    <input class="input" type="number" step="0.01" name="price" required>
  </div>

  <button type="submit" class="btn-submit">Create food</button>

</form>


@endsection