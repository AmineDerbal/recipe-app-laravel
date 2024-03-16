<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;

class publicRecipesController extends Controller
{
    public function index()
    {
        $recipes = Recipe::where('is_public', true)->get()->sortByDesc('created_at');
        return view('public_recipes.index', compact('recipes'));
    }


}
