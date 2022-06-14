import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Recipes from '../views/Recipes.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import Recipe from '../views/Recipe.vue'
import Profile from '../views/Profile.vue'
import CreateRecipe from "../views/CreateRecipe";
import MyRecipes from "../views/MyRecipes";
import EditRecipe from "../views/EditRecipe";
import SavedRecipes from "../views/SavedRecipes";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: "Home"
    }
  },
  {
    path: '/recipes/:categoryId?',
    name: 'Recipes',
    component: Recipes,
    meta: {
      title: "Recipes"
    }
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
    meta: {
      title: "Register"
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    meta: {
      title: "Login"
    }
  },
  {
    path: '/recipe/:id',
    name: 'Recipe',
    component: Recipe,
    meta: {
      title: "Recipe"
    }
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
    meta: {
      title: "Profile"
    }
  },
  {
    path: '/create-recipe',
    name: 'CreateRecipe',
    component: CreateRecipe,
    meta: {
      title: "Create Recipe"
    }
  },
  {
    path: '/my-recipes',
    name: 'MyRecipes',
    component: MyRecipes,
    meta: {
      title: "My Recipes"
    }
  },
  {
    path: '/edit-recipe/:id',
    name: 'EditRecipe',
    component: EditRecipe,
    meta: {
      title: "Edit Recipe"
    }
  },
  {
    path: '/saved-recipes',
    name: 'SavedRecipes',
    component: SavedRecipes,
    meta: {
      title: "Saved Recipes"
    }
  },
]

const router = new VueRouter({
  mode: 'hash', // mode: history
  base: process.env.BASE_URL,
  routes,
  scrollBehavior() {
    return { x: 0, y: 0 };
  },
})

router.beforeEach((to, from, next) => {
  document.title = `${to.meta.title} | Cooking app`;
  next();
});

export default router
