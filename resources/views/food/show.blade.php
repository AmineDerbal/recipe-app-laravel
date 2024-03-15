@extends('layouts.app')


@section('content')
<h1 class="food_title">Show Food</h1>
@include('food.food_table', ['foods' => $foods])
<br>
<div>
  <a href="{{ route('food') }}">Back to Foods</a> |
  <a href="{{ route('food.edit', $foods[0]->id) }}">Edit this food</a>

</div>

@endsection