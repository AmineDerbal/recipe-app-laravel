<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GenrealShoppingListController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recipes = $user->recipes;
        $foods = $user->food;
        $missing_foods = [];
        foreach($foods as $food) {
            $total_quantity = 0;
            $total_quantity = $recipes->sum(function ($recipe) use ($food) {
                return $recipe->food->where('id', $food->id)->sum('pivot.quantity');
            });

            if($food->quantity < $total_quantity) {
                $missing_quantity = $total_quantity - $food->quantity;
                $missing_foods[] = ['name' => $food->name, 'quantity' => $missing_quantity,'price' => $food->price];
            }
        }
        return view('general_shopping_list.index', compact('missing_foods'));
    }
}
