<?php

namespace App\Http\Controllers;

use App\Http\Resources\SavedRecipesResource;
use App\Models\Recipe;
use App\Models\SavedRecipe;
use Illuminate\Http\Request;

class SavedRecipesController extends Controller
{
    public function getSavedRecipes(Request $request)
    {
        $id = $request->user()->id;

        $savedRecipes = SavedRecipe::where('userId', $id)->get();

        return SavedRecipesResource::collection($savedRecipes);
    }

    public function delete(Request $request)
    {
        $savedRecipeId = $request->id;

        SavedRecipe::destroy($savedRecipeId);

        return [
            'message' => 'Successfully removed!'
        ];
    }

    public function create(Request $request)
    {
        $id = $request->user()->id;
        $recipeId = $request->id;

        SavedRecipe::create([
            "userId" => $id,
            "recipeId" => $recipeId,
        ]);

        return [
            'message' => 'Recipe was successfully saved!'
        ];
    }
}
