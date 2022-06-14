<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categoryName' => 'Vegan',
            'categoryImg' => 'images/categoryImages/icons8-zucchini.png',
            'fileName' => 'icons8-zucchini.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Cheap eats',
            'categoryImg' => 'images/categoryImages/icons8-cheap.png',
            'fileName' => 'icons8-cheap.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Seasonal recipes',
            'categoryImg' => 'images/categoryImages/icons8-2020.png',
            'fileName' => 'icons8-2020.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Easy',
            'categoryImg' => 'images/categoryImages/icons8-easy.png',
            'fileName' => 'icons8-easy.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Cakes & baking',
            'categoryImg' => 'images/categoryImages/icons8-cake.png',
            'fileName' => 'icons8-cake.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Family ideas',
            'categoryImg' => 'images/categoryImages/icons8-family.png',
            'fileName' => 'icons8-family.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Cocktails',
            'categoryImg' => 'images/categoryImages/icons8-cocktail.png',
            'fileName' => 'icons8-cocktail.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Healthy',
            'categoryImg' => 'images/categoryImages/icons8-health.png',
            'fileName' => 'icons8-health.png'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Vegetarian',
            'categoryImg' => 'images/categoryImages/icons8-vegetarian_mark.png',
            'fileName' => 'icons8-vegetarian.png'
        ]);
    }
}
