<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'ingredientId';
    protected $fillable = [
        "recipeId",
        "ingredient",
    ];
}
