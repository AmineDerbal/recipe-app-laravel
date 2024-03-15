@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('recipe_food.create',$recipe->id)}}">
  @csrf
  <h1 class="text-center mb-3">Add Food in Recipe</h1>
  <div class="mb-3 form">
    <label class="label">Name</label>
    <br>
    <select class="form-select form-select-sm" name="food_id">
      @foreach ($user->food as $food)
      <option value="{{ $food->id }}">{{ $food->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3 form">
    <label class="label">Quantity</label>
    <br>
    <input class="form-control" type="number" name="quantity" required>
  </div>

  <div class="mb-3 form">
    <p> <strong>Note: </strong>if the quantity for the food selected was already created before this will simply update
      its value rather than create a new ingredient </p>
  </div>
  <div class="mb-3 form">
    <input type="submit" value="Add Food" class="btn btn-primary">
  </div>

</form>

@endsection