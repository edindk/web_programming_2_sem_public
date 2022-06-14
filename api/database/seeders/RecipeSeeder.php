<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('recipes')->insert([
                'categoryId' => 1,
                'userId' => 1,
                'title' => 'Vegan jambalaya',
                'createdDate' => new \DateTime(),
                'recipeHTML' => "
                <h3>Step 1</h3>
                <p>Heat the oil in a large pan set over a high heat and fry the onion, celery and pepper, stirring occasionally, for 5 mins until starting to soften and colour.</p>
                <h3>Step 2</h3>
                <p>Stir in the spices and rice, then tip in the tomatoes and a can of water. Stir in the garlic, beans and bouillon. Bring to a simmer, then cover and cook for 25 mins until the rice is tender and has absorbed most of the liquid. Keep an eye on the pan towards the end of the cooking time to make sure it doesn’t boil dry – if it starts to catch, add a little more water. Stir in the parsley and serve hot.</p>
                ",
                'imageFile' => 'images/recipeImages/chili-con-carne.jpg',
                'fileName' => 'chili-con-carne.jpg',
                'description' => "Enjoy a delicious plant-based dinner with this vegan rice and bean one-pot. It's packed with all five of your 5-a-day, as well as iron, vitamin C and fibre",
                'serves' => '2',
                'cookTime' => '35 mins',
                'prepTime' => '10 mins',
                'difficulty' => 'easy'
            ]);
            DB::table('recipes')->insert([
                'categoryId' => 1,
                'userId' => 1,
                'title' => 'Vegan chili',
                'createdDate' => new \DateTime(),
                'recipeHTML' => "
                <h3>Step 1</h3>
                <p>Heat the oven to 200C/180C fan/gas 6. Put the sweet potato in a roasting tin and drizzle over 1½ tbsp oil, 1 tsp smoked paprika and 1 tsp ground cumin. Give everything a good mix so that all the chunks are coated in spices, season with salt and pepper, then roast for 25 mins until cooked.</p>
                <h3>Step 2</h3>
                <p>Meanwhile, heat the remaining oil in a large saucepan over a medium heat. Add the onion, carrot and celery. Cook for 8-10 mins, stirring occasionally until soft, then crush in the garlic and cook for 1 min more. Add the remaining dried spices and tomato purée. Give everything a good mix and cook for 1 min more.</p>
                <h3>Step 3</h3>
                <p>Add the red pepper, chopped tomatoes and 200ml water. Bring the chilli to a boil, then simmer for 20 mins. Tip in the beans and cook for another 10 mins before adding the sweet potato. Season to taste then serve with lime wedges, guacamole, rice and coriander. Will keep, in an airtight container in the freezer, for up to three months.</p>
                ",
                'imageFile' => 'images/recipeImages/vegan-chili.png',
                'fileName' => 'vegan-chili.png',
                'description' => 'This vegan chilli packs in plenty of vegetables and doesn’t fall short on the flavour front. Serve it with rice or in jacket potatoes for a filling supper',
                'serves' => '4',
                'cookTime' => '45 mins',
                'prepTime' => '15 mins',
                'difficulty' => 'easy'
            ]);
            DB::table('recipes')->insert([
                'categoryId' => 2,
                'userId' => 1,
                'title' => 'One-pan pasta',
                'createdDate' => new \DateTime(),
                'recipeHTML' => "
                <h3>Step 1</h3>
                <p>Heat the oil in a deep, wide frying pan or casserole dish over a medium-high heat. Tip in the meatballs and cook for 5 mins, turning until browned all over. Add the onion and garlic, and fry for 8 more mins until softened.</p>
                <h3>Step 2</h3>
                <p>Add the ketchup, chopped tomatoes, chopped basil and 400ml water to the pan and bring to the boil. Add the spaghetti and cook for 10-12 mins, stirring occasionally. When the pasta is cooked and the sauce has reduced, season and sprinkle with the basil leaves to serve.</p>
                ",
                'imageFile' => 'images/recipeImages/one-pan-pasta.png',
                'fileName' => 'one-pan-pasta.png',
                'description' => "Save on washing up with this easy and quick one-pan spaghetti dish with meatballs and a tomato sauce. It's both healthy and low in calories",
                'serves' => '4',
                'cookTime' => '30 mins',
                'prepTime' => '5 mins',
                'difficulty' => 'easy'
            ]);
            DB::table('recipes')->insert([
                'categoryId' => 2,
                'userId' => 1,
                'title' => 'Jacket potato with whipped feta & sumac',
                'createdDate' => new \DateTime(),
                'recipeHTML' => "
                <h3>Step 1</h3>
                <p>Heat oven to 220C/200C fan/ gas 6. Prick the potato all over with a fork and bake for 1 hr until it is golden outside and soft inside. Mix 1 tsp olive oil with the garlic salt. Cut a deep cross into the top of the jacket, drizzle the garlic oil into the cross and rub it all over the outside. Return to the oven and bake for 15 mins more until the edges are golden and crispy.</p>
                <h3>Step 2</h3>
                <p>Meanwhile, crumble the feta into a bowl, add the yogurt and whisk together until creamy. Stir in the red pepper with a good grind of black pepper and spoon the whipped feta into the jacket. Sprinkle with the sumac, drizzle over the remaining 1 tsp olive oil and scatter a few torn basil leaves on top, if you like.</p>
                ",
                'imageFile' => 'images/recipeImages/jacket-potato.png',
                'fileName' => 'jacket-potato.png',
                'description' => 'The perfect budget-friendly, filling supper for one. The fragrant, zesty flavour of sumac is a refreshing contrast to the creamy whipped feta',
                'serves' => '1',
                'cookTime' => '1 hr and 15 mins',
                'prepTime' => '10 mins',
                'difficulty' => 'easy'
            ]);
            DB::table('recipes')->insert([
                'categoryId' => 3,
                'userId' => 1,
                'title' => 'One-pan salmon with roast asparagus',
                'createdDate' => new \DateTime(),
                'recipeHTML' => "
                <h3>Step 1</h3>
                <p>Heat oven to 220C/fan 200C/gas 7. Tip the potatoes and 1 tbsp of olive oil into an ovenproof dish, then roast the potatoes for 20 mins until starting to brown. Toss the asparagus in with the potatoes, then return to the oven for 15 mins.</p>
                <h3>Step 2</h3>
                <p>Throw in the cherry tomatoes and vinegar and nestle the salmon amongst the vegetables. Drizzle with the remaining oil and return to the oven for a final 10-15 mins until the salmon is cooked. Scatter over the basil leaves and serve everything scooped straight from the dish.</p>
                ",
                'imageFile' => 'images/recipeImages/one-pan-salmon.png',
                'fileName' => 'one-pan-salmon.png',
                'description' => "For an easy side dish to complement a spring roast, just cook this recipe without the salmon",
                'serves' => '2',
                'cookTime' => '50 mins',
                'prepTime' => '20 mins',
                'difficulty' => 'easy'
            ]);
        }
    }
}
