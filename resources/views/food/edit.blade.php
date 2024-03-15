@extends('layouts.app')

@section('content')
<h1 class="food_title">Editing food</h1>
<form action="{{route('food.update', $food)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="field">
    <label class="label" style="display: block;">Name</label>
    <input class="input" type="text" name="name" value="{{$food->name}}" required>
  </div>
  <div class="field">
    <label class="label" style="display: block;">Measurement_unit</label>
    <input class="input" type="text" value="{{$food->measurement_unit}}" name="measurement_unit" maxlength="10"
      placeholder="max 10 characters" required>
  </div>
  <div class="field">
    <label class="label" style="display: block;">Quantity</label>
    <input class="input" type="number" value="{{$food->quantity}}" name="quantity" required>
  </div>
  <div class="field">
    <label class="label" style="display: block;">Price</label>
    <input class="input" type="number" value="{{$food->price}}" step="0.01" name="price" required>
  </div>

  <input type="submit" value="Update food" class="btn-submit">
</form>
<br>
<div>
  <a href="{{route('food.show', $food)}}">show this food</a> |
  <a href="{{route('food')}}">back to food</a>
</div>
@endsection