<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'measurement_unit', 'quantity', 'user_id'];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_food')->withPivot('quantity');
    }


}
