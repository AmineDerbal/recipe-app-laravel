<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function index(){
        $user = Auth::user();
        $foods = Food::where('user_id', $user->id)->get();
        return view('food.index', compact('foods'));
    }

    public function new() {
        return view('food.new');
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'measurement_unit' => 'required',
            'quantity' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $food = new Food();
         $food->name = $request['name'];
         $food->price = $request['price'];
         $food->measurement_unit = $request['measurement_unit'];
         $food->quantity = $request['quantity'];
         $food->user_id = Auth::user()->id;
         $food->save(); 
   
        return redirect()->route('food')->with('success', 'Food created successfully!');
        
    }

    public function destroy($id){
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('food')->with('success', 'Food deleted successfully!');
    }
    
}
