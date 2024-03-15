@extends('layouts.app')

@section('content')

<h1 class="food_title">Food</h1>


@include('food.food_table', ['foods' => $foods])

<form action="{{ route('food.new') }}">
  <button type="submit" class="btn_new_food">Add Food</button>
</form>

@endsection