<template>
  <v-container fluid v-if="recipe">
    <v-row class="head-section">
      <v-col md="6" offset-md="3">
        <v-alert type="success" v-show="msg" dismissible>
          {{ msg }}
        </v-alert>
        <v-alert type="error" v-show="errorMsg" dismissible>
          {{ errorMsg }}
        </v-alert>
      </v-col>
      <v-col class="recipe-img" md="6" sm="12">
        <div>
          <img :src="recipe.imageFile" height="150px" width="150px"/>
        </div>
        <div>
          <v-btn class="save-recipe-btn mr-2 mb-2" @click="saveRecipe()">
            <v-icon class="icon mr-2">mdi-content-save-outline</v-icon>
            Save recipe
          </v-btn>
          <!--          <v-btn class="print-btn mr-2 mb-2">-->
          <!--            <v-icon class="icon mr-2">mdi-printer-outline</v-icon>-->
          <!--            Print-->
          <!--          </v-btn>-->
        </div>
      </v-col>
      <v-col class="recipe-info text-left">
        <h1>{{ recipe.title }}</h1>
        <h4 class="mb-5">By Admin</h4>
        <v-row>
          <!--          <v-rating-->
          <!--              class="rating mt-2"-->
          <!--              v-model="rating"-->
          <!--              background-color="green lighten-3"-->
          <!--              color="#80b700"-->
          <!--              medium-->
          <!--          ></v-rating>-->
          <!--          <p class="mt-4">(433)</p>-->
        </v-row>
        <p class="mt-5">
          {{ recipe.description }}
        </p>
        <v-row no-gutters>
          <v-col>
            <p>Prep: {{ recipe.prepTime }}</p>
            <p>Cook: {{ recipe.cookTime }}</p>
          </v-col>
          <v-col>
            <p>Difficulty: {{ recipe.difficulty }}</p>
          </v-col>
          <v-col>
            <p>Serves: {{ recipe.serves }}</p>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <v-row justify="center">
      <v-col md="4">
        <h4>Ingredients</h4>
        <v-list-item v-for="(ingredient, index) in recipe.ingredients" :key="index">
          <v-list-item-content>
            <v-list-item-title>{{ ingredient.ingredient }}</v-list-item-title>
            <v-divider class="mt-3"></v-divider>
          </v-list-item-content>
        </v-list-item>
      </v-col>
      <v-col cols="12" md="4" sm="12" v-html="recipe.recipeHTML"></v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Recipe",
  data() {
    return {
      recipeId: null,
      rating: 3,
      msg: '',
      errorMsg: '',
    };
  },
  computed: {
    recipe() {
      let recipes = this.$store.getters.allRecipes;

      if (this.recipeId) {
        recipes = recipes.filter((recipe) => {
          return recipe.id === parseInt(this.recipeId);
        });
        return recipes[0];
      }
    },
  },
  mounted() {
    this.recipeId = this.$route.params.id;
  },
  methods: {
    saveRecipe() {
      const token = localStorage.getItem('token');

      return new Promise((resolve, reject) => {
        axios.post('/saved-recipes/' + this.recipeId, {data: ''}, {
          headers: {Authorization: `Bearer ${token}`}
        }).then(response => {
          this.msg = 'Recipe is saved!'
          setTimeout(() => this.msg = null, 10000);
          resolve(response);
        }).catch(error => {
          this.errorMsg = 'Recipe could not be saved!'
          setTimeout(() => this.errorMsg = null, 10000);
          reject(error);
        })
      });
    },
  }
}

</script>

<style lang="scss" scoped>
@import "../styles/_variables.scss";
@import "../styles/_styling.scss";

.head-section {
  @include sub-section();
}

.recipe-img {
  img {
    width: 400px;
    height: auto;
  }

  .save-recipe-btn {
    background-color: $primary-color;
    color: $light-color;
  }
}

.recipe-info {
  .rating {
    color: $primary-color !important;
  }
}
</style>