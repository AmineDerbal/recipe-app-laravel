<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'preparation_time', 'cooking_time','is_public','user_id'];

    public function food()
    {
        return $this->belongsToMany(Food::class, 'recipe_food')->withPivot('quantity');
    }

}
