<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\RecipeFood;
use App\Models\Recipe;

class RecipeFoodController extends Controller
{
    public function new($id)
    {
        $user = Auth::user();
        $recipe = Recipe::find($id);
        return view('recipeFood.new', compact('recipe', 'user'));
    }

    public function create(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'food_id' => 'required',
            'quantity' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recipeFood = new RecipeFood();
        $recipeFood->recipe_id = $id;
        $recipeFood->food_id = $request['food_id'];
        $recipeFood->quantity = $request['quantity'];
        $recipeFood->save();
        return redirect()->route('recipe.show', $id)->with('success', 'Food added to recipe successfully!');
    }

    public function destroy($id)
    {
        $recipeFood = RecipeFood::find($id);
        $recipeFood->delete();
        return redirect()->back()->with('success', 'Food removed from recipe successfully!');
    }
}
