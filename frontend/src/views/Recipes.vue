<template>
  <div>
    <v-container>
      <span class="title">Recipes</span>
      <v-row>
        <v-col class="mt-10" md="2">
          <v-text-field
              v-model="searchInput"
              label="Search"
              outlined
              color="green"
              v-on:input="search"
          ></v-text-field>
          <h3 class="pb-5">Filter</h3>
          <div>
            <p>Total time</p>
            <v-row class="ml-5">
              <v-checkbox
                  v-model="time10"
                  :label="`10 minutes or less`"
                  color="green"
                  @click="filterByTime(10, time10)"
              ></v-checkbox>
              <v-checkbox
                  v-model="time30"
                  :label="`30 minutes or less`"
                  color="green"
                  @click="filterByTime(30, time30)"
              ></v-checkbox>
              <v-checkbox
                  v-model="time60"
                  :label="`1 hour or less`"
                  color="green"
                  @click="filterByTime(60, time60)"
              ></v-checkbox>
            </v-row>
          </div>
          <div>
            <p class="pt-5">Difficulty</p>
            <v-row class="ml-5">
              <v-checkbox
                  v-model="diffEasy"
                  :label="`Easy`"
                  color="green"
                  @click="filterByDifficulty('Easy', diffEasy)"
              ></v-checkbox>
              <v-checkbox
                  v-model="diffEffort"
                  :label="`More effort`"
                  color="green"
                  @click="filterByDifficulty('More effort', diffEffort)"
              ></v-checkbox>
              <v-checkbox
                  v-model="diffChallenge"
                  :label="`A challenge`"
                  color="green"
                  @click="filterByDifficulty('A challenge', diffChallenge)"
              ></v-checkbox>
            </v-row>
          </div>
          <div>
            <p class="pt-5">Servings</p>
            <v-row class="ml-5">
              <v-checkbox
                  v-model="servings1"
                  :label="`1 servings`"
                  color="green"
                  @click="filterByServings(1, servings1)"
              ></v-checkbox>
              <v-checkbox
                  v-model="servings2"
                  :label="`2 servings`"
                  color="green"
                  @click="filterByServings(2, servings2)"
              ></v-checkbox>
              <v-checkbox
                  v-model="servings5"
                  :label="`5 servings`"
                  color="green"
                  @click="filterByServings(5, servings5)"
              ></v-checkbox>
              <v-checkbox
                  v-model="servings8"
                  :label="`8 servings`"
                  color="green"
                  @click="filterByServings(8, servings8)"
              ></v-checkbox>
            </v-row>
          </div>
        </v-col>
        <v-col md="10">
          <v-container class="recent-container">
            <v-col>
              <v-row class="recipe-row">
                <RecipeCard
                    :recipe="recipe"
                    v-for="(recipe, index) in recipes"
                    :key="index"
                />
              </v-row>
            </v-col>
          </v-container>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import RecipeCard from "../components/RecipeCard.vue";

export default {
  name: "Recipes",
  components: {
    RecipeCard
  },
  data() {
    return {
      categoryId: null,
      recipes: null,
      searchInput: null,
      time10: false,
      time30: false,
      time60: false,
      diffEasy: false,
      diffEffort: false,
      diffChallenge: false,
      servings1: false,
      servings2: false,
      servings5: false,
      servings8: false,
      test: null,
    }
  },
  async created() {
    await this.getRecipes();
  },
  methods: {
    async getRecipes() {
      this.categoryId = this.$route.params.categoryId;

      await this.$store.dispatch('getRecipes');
      this.recipes = this.$store.getters.allRecipes;

      if (this.categoryId) {
        this.recipes = this.recipes.filter((recipe) => {
          return recipe.categoryId === parseInt(this.categoryId);
        });
      }
    },
    filterByTime(time, model) {
      if (model) {
        this.recipes = this.recipes.filter((recipe) => {
          return parseInt(recipe.prepTime) + parseInt(recipe.cookTime) <= parseInt(time)
        });
      } else {
        this.getRecipes();
      }
    },
    filterByDifficulty(diff, model) {
      if (model) {
        this.recipes = this.recipes.filter((recipe) => {
          return recipe.difficulty.toString().toLowerCase() === diff.toString().toLowerCase();
        });
      } else {
        this.getRecipes();
      }
    },
    filterByServings(servings, model) {
      if (model) {
        this.recipes = this.recipes.filter((recipe) => {
          return parseInt(recipe.serves.match(/\d+/)) === parseInt(servings);
        });
      } else {
        this.getRecipes();
      }
    },
    search() {
      if (this.searchInput.length > 0) {
        this.recipes = this.recipes.filter((recipe) => {
          return recipe.title.toLowerCase().includes(this.searchInput.toLowerCase(), 0)
        });
      } else {
        this.getRecipes();
      }
    }
  },
}
</script>

<style lang="scss" scoped>
@import "../styles/_variables.scss";
@import "../styles/_styling.scss";

.title {
  @include spanStyle();
  color: $primary-color;
  margin-top: 15px;
  margin-bottom: 15px;
}
</style>