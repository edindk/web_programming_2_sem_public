<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "categoryName",
        "categoryImg",
        "fileName",
    ];
    protected $with = [
        'recipes'
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class, "categoryId", "id");
    }
}
