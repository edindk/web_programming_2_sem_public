<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedRecipe extends Model
{
    use HasFactory;

    protected $table = 'savedRecipes'; // <- here

    public $timestamps = false;
    protected $fillable = [
        "userId",
        "recipeId",
    ];
}
