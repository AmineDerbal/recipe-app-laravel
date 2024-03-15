@extends('layouts.app')

@section('content')

<h2 class='header-title'> {{$recipe->name}} </h2>
<div class='recipe container'>
  @if((Auth()->user()->id == $recipe->user_id) || $recipe->is_public)
  <div class='preparation-toggle'>

    <div>
      <p>
        <strong> Preparation time: {{$recipe->preparation_time }}
          @if($recipe->preparation_time > 1) hours @else hour @endif
        </strong>
      </p>
    </div>
    <div>
      @if(Auth()->user()->id == $recipe->user_id)
      <form method="POST" action="{{route('recipe.toggle_public',$recipe->id)}}">
        @csrf
        @method('PUT')
        @if ($recipe->is_public)
        <input type="submit" value="Make Private" class="btn btn-danger">
        @else
        <input type="submit" value="Make Public" class="btn btn-success">
        @endif
      </form>
      @endif
    </div>
  </div>
  <div class='preparation-toggle'>
    <p>
      <strong> Cooking time: {{$recipe->cooking_time}}
        @if($recipe->cooking_time > 1) hours @else hour @endif
      </strong>
    </p>
  </div>
  <div class='preparation-toggle'>
    <p><strong> Recipe steps:</strong> {{$recipe->description}} </p>
  </div>
  <div class="preparation-toggle ">
    <form method="get" action="">
      @csrf
      <input type="submit" value="Generate shopping list" class="btn btn-primary generator">
    </form>
    <form method="get" action="{{route('recipe_food.new',$recipe->id)}}">
      @csrf
      <input type="submit" value="Add Ingredient" class="btn btn-primary generator">
    </form>

  </div>
  <table class="table table-bordered table-striped" id='recipe_table'>
    <thead>
      <tr>
        <th> Food </th>
        <th> Quantity </th>
        <th> Value </th>
        <th> Actions </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($recipe->food as $food)
      <tr>
        <td> {{$food->name}} </td>
        <td> {{$food->pivot->quantity}} {{$food->measurement_unit}} </td>
        <td> {{$food->pivot->quantity * $food->price}} $ </td>
        <td>
          <form method="POST" action="">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger">
          </form>
        </td>
      </tr>
      @endforeach


  </table>
</div>

@else
<h2 class='header-title'> This recipe is private </h2>
@endif

@endsection