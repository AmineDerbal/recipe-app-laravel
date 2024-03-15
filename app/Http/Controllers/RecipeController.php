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

    public function new()
    {
        return view('recipe.new');
    }

    public function create(Request $request)
    {

    }

    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->route('recipe.index')->with('success', 'Recipe deleted successfully!');
    }
}
