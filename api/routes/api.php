<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SavedRecipesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::patch('/user', [AuthController::class, 'update']);
    Route::post('/recipe', [RecipeController::class, 'create']);
    Route::post('/recipe/{id}', [RecipeController::class, 'update']);
    Route::delete('/recipe/{id}', [RecipeController::class, 'delete']);
    Route::get('/saved-recipes', [SavedRecipesController::class, 'getSavedRecipes']);
    Route::delete('/saved-recipes/{id}', [SavedRecipesController::class, 'delete']);
    Route::post('/saved-recipes/{id}', [SavedRecipesController::class, 'create']);
});

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/category', [CategoryController::class, 'getCategories']);
Route::post('/category', [CategoryController::class, 'create']);
Route::get('/recipe', [RecipeController::class, 'getRecipes']);
