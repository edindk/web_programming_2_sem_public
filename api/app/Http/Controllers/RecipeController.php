<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\SavedRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function getRecipes()
    {
        return Recipe::all();
    }

    public function create(Request $request)
    {
        $role = $request->user()->role;

        if ($role === 'Admin') {
            $request->validate([
                "categoryId" => 'required|max:255',
                "title" => 'required|max:255',
                "recipeHTML" => 'required',
                "imageFile" => 'required',
                "description" => 'required',
                "serves" => 'required',
                "cookTime" => 'required',
                "prepTime" => 'required',
                "difficulty" => 'required',
                "ingredients" => 'required'
            ]);

            try {
                DB::beginTransaction();

                Storage::disk('s3')->put('images/recipeImages/' . $request->imageFile->getClientOriginalName(), file_get_contents($request->imageFile));

                $recipe = Recipe::create([
                    "categoryId" => $request->categoryId,
                    "userId" => $request->user()->id,
                    "title" => $request->title,
                    "createdDate" => new \DateTime(),
                    "recipeHTML" => $request->recipeHTML,
                    "imageFile" => 'images/recipeImages/' . $request->imageFile->getClientOriginalName(),
                    "fileName" => $request->imageFile->getClientOriginalName(),
                    "description" => $request->description,
                    "serves" => $request->serves,
                    "cookTime" => $request->cookTime,
                    "prepTime" => $request->prepTime,
                    "difficulty" => $request->difficulty,
                ]);

                $ingredients = json_decode($request->ingredients);

                foreach ($ingredients as $ingredient) {
                    Ingredient::create([
                        "recipeId" => $recipe->id,
                        "ingredient" => $ingredient->ingredient
                    ]);
                }

                DB::commit();
                return [
                    'id' => $recipe->id,
                    'message' => 'Recipe added!'
                ];
            } catch (\Exception $e) {
                return $e;
                DB::rollBack();
            }
        } else {
            return [
                'message' => 'You do not have rights to add a recipe!'
            ];
        }
    }

    public function update(Request $request, $id)
    {
        $role = $request->user()->role;

        if ($role === 'Admin') {
            $request->validate([
                "categoryId" => 'required|max:255',
                "title" => 'required|max:255',
                "recipeHTML" => 'required',
                "imageFile" => 'nullable',
                "description" => 'required',
                "serves" => 'required',
                "cookTime" => 'required',
                "prepTime" => 'required',
                "difficulty" => 'required',
                "ingredients" => 'required'
            ]);

            try {
                DB::beginTransaction();

                $recipe = Recipe::find($id);

                if ($request->imageFile) {
                    Storage::disk('s3')->delete('images/recipeImages/' . $recipe->fileName);
                    Storage::disk('s3')->put('images/recipeImages/' . $request->imageFile->getClientOriginalName(), file_get_contents($request->imageFile));
                    $filePath = 'images/recipeImages/' . $request->imageFile->getClientOriginalName();
                    $fileName = $request->imageFile->getClientOriginalName();
                } else {
                    $filePath = $recipe->imageFile;
                    $fileName = $recipe->fileName;
                }

                $recipe->update([
                    "categoryId" => (int)$request->categoryId,
                    "title" => $request->title,
                    "recipeHTML" => $request->recipeHTML,
                    "imageFile" => $filePath,
                    "fileName" => $fileName,
                    "description" => $request->description,
                    "serves" => $request->serves,
                    "cookTime" => $request->cookTime,
                    "prepTime" => $request->prepTime,
                    "difficulty" => $request->difficulty,
                ]);

                Ingredient::where('recipeId', $request->id)->delete();

                $ingredients = json_decode($request->ingredients);

                foreach ($ingredients as $ingredient) {
                    Ingredient::create([
                        "recipeId" => $request->id,
                        "ingredient" => $ingredient->ingredient
                    ]);
                }

                DB::commit();
                return [
                    'message' => 'Recipe updated!'
                ];
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        } else {
            return [
                'message' => 'You do not have rights to update a recipe!'
            ];
        }

    }

    public function delete(Request $request)
    {
        $role = $request->user()->role;
        $recipeId = $request->id;
        $recipe = Recipe::find($recipeId);

        if ($role === "Admin") {
            Storage::disk('s3')->delete('images/recipeImages/' . $recipe->fileName);
            try {
                DB::beginTransaction();
                SavedRecipe::where('recipeId', $recipeId)->delete();
                Ingredient::where('recipeId', $recipeId)->delete();
                Recipe::destroy($recipeId);

                DB::commit();
                return [
                    'message' => 'Recipe successfully deleted!'
                ];
            } catch (\Exception $e) {
                dd($e);
                DB::rollBack();
            }
        } else {
            return [
                'message' => 'You are not authorized!'
            ];
        }
    }
}
