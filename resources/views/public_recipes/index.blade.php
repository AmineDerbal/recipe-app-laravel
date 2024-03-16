@extends('layouts.app')

@section('content')
<h1 class='header-title'> List of all public recipes </h1>
@foreach ($recipes as $recipe)

<?php
$total_quantity = $recipe->recipefood->sum('quantity');
$total_food = $recipe->recipefood->count();
$total_price = $recipe->food->sum(function ($food) {
    return $food->pivot->quantity * $food->price;
});
?>
<div class='container-md recipe-container border border-dark'>
  <div class='recipe_name'>
    <h3><a href="/recipe/{{$recipe->id}}">{{$recipe->name}}</a></h3>
    <p>By: {{$recipe->user->name}}</p>
  </div>
  <div>
    <p>Total food items: {{$total_food}} </p>
    <p>Total Price: {{$total_price}}$</p>
  </div>
</div>

@endforeach

@endsection