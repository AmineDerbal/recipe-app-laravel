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

<h2 class='header-title'> New Recipe </h2>
<form method="POST" action="{{ route('recipe.create') }}">
  @csrf
  <div class="field">
    <label class="label">Name</label>
    <br>
    <input class="input" type="text" name="name" placeholder="Recipe Name">
  </div>
  <div class="field">
    <label class="label">Preparation time in hours</label>
    <br>
    <input class="input" type="number" step="0.25" value="0.25" min="0.25" name="preparation_time">
  </div>
  <div class="field">
    <label class="label">Cooking time in hours</label>
    <br>
    <input class="input" type="number" step="0.25" value="0.25" min="0.25" name="cooking_time">
  </div>
  <div class="field">
    <label class="label">Description</label>
    <br>
    <textarea class="form-control" name="description" rows="5" placeholder="Recipe Description"></textarea>
  </div>
  <div class="field">
    <label for="public" class="label">Public</label>
    <input type="checkbox" name="public" value="1">
  </div>
  <input type="submit" value="Create A Recipe" class="btn-submit">
</form>

@endsection