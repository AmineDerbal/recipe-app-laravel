@extends('layouts.app')

@section('content')
<h1 class='header-title'>List of All recipes of {{ $user->name }}</h1>
<h2> <a href="{{ route('recipe.new') }}">Add Recipe</a></h2>

@if($recipes->isEmpty())
<h3 class='header-title'>No recipes found</h3>
@else
@foreach ($recipes as $recipe)
<div class='container-md recipe-container border border-dark'>
  <div class='recipe_name'>
    <h3><a href="{{route('recipe.show',$recipe->id)}}">{{ $recipe->name }}</a></h3>
    @if($user->id == $recipe->user_id)
    <form method="POST" action="{{route('recipe.destroy', $recipe->id)}}">
      @csrf
      @method('DELETE')
      <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @endif
  </div>
  <div>
    <p>{{ $recipe->description }}</p>
  </div>
</div>
@endforeach

@endif

@endsection