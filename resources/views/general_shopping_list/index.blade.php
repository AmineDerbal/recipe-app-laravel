@extends('layouts.app')

@section('content')
<h1>General Shopping List</h1>
@if (empty($missing_foods))
<p>No missing food items.</p>
@else
<?php $missing_foods = collect($missing_foods);
$total_items = $missing_foods->count();

$total_price = $missing_foods->sum(function ($missing_food) {
    return $missing_food['quantity'] * $missing_food['price'];
});

?>

<div class="total-missing">
  <p><strong>Total Missing Food Items: </strong>{{$total_items}}</p>
  <p><strong>Total Price of Missing Food: </strong>{{$total_price}}$</p>
</div>

<table class="shopping-list-table">
  <thead>
    <tr>
      <th>Food Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($missing_foods as $missing_food)
    <tr>
      <td>{{$missing_food['name']}}</td>
      <td>{{$missing_food['quantity']}}</td>
      <td>{{$missing_food['price']}}$</td>
    </tr>
    @endforeach

  </tbody>

</table>


@endif

@endsection