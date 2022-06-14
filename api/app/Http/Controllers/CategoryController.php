<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function getCategories()
    {
        return Category::all();
    }

    public function create(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|max:255',
            'categoryImg' => 'required',
        ]);

        Storage::disk('s3')->put('images/categoryImages/' . $request->categoryImg->getClientOriginalName(), file_get_contents($request->categoryImg));

        Category::create([
            'categoryName' => $request->categoryName,
            'categoryImg' => 'images/categoryImages/' . $request->categoryImg->getClientOriginalName(),
            "fileName" => $request->categoryImg->getClientOriginalName(),
        ]);
    }
}
