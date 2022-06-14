<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SavedRecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('savedRecipes')->insert([
                'userId' => 1,
                'recipeId' => 1,

            ]);
        }
        {
            DB::table('savedRecipes')->insert([
                'userId' => 1,
                'recipeId' => 2,

            ]);
        }
        {
            DB::table('savedRecipes')->insert([
                'userId' => 1,
                'recipeId' => 3,

            ]);
        }
    }
}
