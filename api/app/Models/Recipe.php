<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "categoryId",
        "userId",
        "title",
        "createdDate",
        "recipeHTML",
        "imageFile",
        "fileName",
        "description",
        "serves",
        "cookTime",
        "prepTime",
        "difficulty"
    ];
    protected $with = [
        'ingredients'
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, "recipeId", "id");
    }
}
