@extends('layouts.app')

@section('content')

<h1 class="food_title">Food</h1>
<table id="foods">
<tr>
    <th>Name</th>
    <th>Measurement unit</th>
    <th>Quantity</th>
    <th>Unit price</th>
    <th>Actions</th>
    <th>View</th>
  </tr>
  @foreach($foods as $food)
  <tr id="{{$food->id}}">
    <td class="table_data">{{$food->name}}</td>
    <td class="table_data">{{$food->measurement_unit}}</td>
    <td class="table_data">{{$food->quantity}}</td>
    <td class="table_data">{{$food->price}}</td>
    <td class="table_data"><form method="POST" action="{{ route('food.destroy', $food->id) }}" > @csrf @method('DELETE') <button type="submit" class="btn_delete">Delete</button></form></td>
    <td class="table_data"><form ></form></td>
  </tr>

  @endforeach

</table>

<form action="{{ route('food.new') }}">
    <button type="submit" class="btn_new_food">Add Food</button>
</form>

@endsection