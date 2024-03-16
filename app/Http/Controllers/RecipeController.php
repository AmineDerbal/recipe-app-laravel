<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recipes = Recipe::where('user_id', $user->id)->get();
        return view('recipe.index', compact('recipes', 'user'));
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe.show', compact('recipe'));
    }

    public function new()
    {
        return view('recipe.new');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'preparation_time' => 'required',
            'cooking_time' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recipe = new Recipe();
        $recipe->name = $request['name'];
        $recipe->preparation_time = $request['preparation_time'];
        $recipe->cooking_time = $request['cooking_time'];
        $recipe->description = $request['description'];
        $public = $request->boolean('public');
        $recipe->is_public = $public;
        $recipe->user_id = Auth::user()->id;
        $recipe->save();
        return redirect()->route('recipe.index')->with('success', 'Recipe created successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->route('recipe.index')->with('success', 'Recipe deleted successfully!');
    }

    public function toggle_public($id)
    {
        $recipe = Recipe::find($id);
        $recipe->is_public = !$recipe->is_public;
        $recipe->save();
        return redirect()->route('recipe.show', $id);
    }
}
