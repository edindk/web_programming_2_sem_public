<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recipe 1
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '2 tbsp olive oil',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '1 large onion (180g), finely chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '4 celery sticks , finely chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '1 yellow pepper , chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '2 tsp smoked paprika',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '½ tsp chilli flakes',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '½ tsp dried oregano',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '115g brown basmati rice',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '400g can chopped tomatoes',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '2 garlic cloves , finely grated',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '400g butter beans , drained and rinsed',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => '2 tsp vegetable bouillon powder',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 1,
                'ingredient' => 'large handful of parsley , chopped',
            ]);
        }

        // Recipe 2
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '3 tbsp olive oil',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '2 sweet potatoes, peeled and cut into medium chunks',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '2 tsp smoked paprika',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '2 tsp ground cumin',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '1 onion, chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '2 carrots, chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '2 celery sticks, chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '2 garlic cloves, crushed',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '1-2 tsp chilli powder (depending on how hot you like it)',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '1 tsp dried oregano',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '1 tbsp tomato purée',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '1 red pepper, cut into chunks',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '2 x 400g cans chopped tomatoes',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '400g can black beans, drained',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => '400g can kidney beans, drained',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 2,
                'ingredient' => 'lime wedges, guacamole, rice and coriander to serve',
            ]);
        }

        // Recipe 3
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '1 tbsp rapeseed oil',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '12 meatballs (300g)',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '1 onion, finely chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '3 garlic cloves, finely chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '2 tbsp ketchup',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '2 x 400g cans chopped tomatoes',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '1 large bunch of basil, finely chopped, plus a few whole leaves',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 3,
                'ingredient' => '225g dried spaghetti',
            ]);
        }

        // Recipe 4
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => '1 baking potato',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => '2 tsp olive oil',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => '½ tsp garlic salt',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => '50g feta',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => '50g Greek yogurt',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => '1 roasted red peppers from a jar (about 25g), finely chopped',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => '½ tsp sumac',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 4,
                'ingredient' => 'few basil leaves , to serve (optional)',
            ]);
        }

        // Recipe 5
        {
            DB::table('ingredients')->insert([
                'recipeId' => 5,
                'ingredient' => '400g new potato, halved if large',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 5,
                'ingredient' => '2 tbsp olive oil',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 5,
                'ingredient' => '8 asparagus spears, trimmed and halved',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 5,
                'ingredient' => '2 handfuls cherry tomatoes',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 5,
                'ingredient' => '1 tbsp balsamic vinegar',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 5,
                'ingredient' => '2 salmon fillets, about 140g/5oz each',
            ]);
        }
        {
            DB::table('ingredients')->insert([
                'recipeId' => 5,
                'ingredient' => 'handful basil leaves',
            ]);
        }
    }
}
