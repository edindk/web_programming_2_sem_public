<template>
  <v-container>
    <span class="title">Saved Recipes</span>
    <v-col md="6" offset-md="3">
      <v-alert type="success" v-show="msg" dismissible>
        {{ msg }}
      </v-alert>
      <h3 v-if="savedRecipes.length <= 0">No saved recipes yet!</h3>
      <v-list-item v-for="(savedRecipe, index) in savedRecipes" :key="index">
        <v-list-item-content>
          <div class="d-flex">
            <v-list-item-title>
              <v-row align="center">
                <a :href="'#/recipe/'+savedRecipe.recipe.id"><img :src="savedRecipe.recipe.imageFile"
                                                                  style="height: 150px; width: 150px"/></a>
                <div class="ml-5">
                  <h4>{{ savedRecipe.recipe.title }}</h4>
                  <p>Description: {{ savedRecipe.recipe.description.slice(0, 50) }}...</p>
                </div>
              </v-row>
            </v-list-item-title>
            <v-icon color="red" class="icon" @click="deleteSavedRecipe(`${savedRecipe.id}`)">mdi-close-circle
            </v-icon>
          </div>
          <v-divider class="mt-3"></v-divider>
        </v-list-item-content>
      </v-list-item>

    </v-col>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: 'SavedRecipes',
  data() {
    return {
      msg: '',
      savedRecipes: [],
    }
  },
  mounted() {
    this.getSavedRecipes();
  },
  methods: {
    deleteSavedRecipe(id) {
      const token = localStorage.getItem('token');

      return new Promise((resolve, reject) => {
        axios.delete('/saved-recipes/' + id, {
          headers: {Authorization: `Bearer ${token}`}
        }).then(response => {
          console.log(response);
          this.getSavedRecipes();
          resolve(response);
          this.msg = 'Sucessfully removed!'
          setTimeout(() => this.msg = null, 10000);
        }).catch(error => {
          reject(error);
        })
      });
    },
    getSavedRecipes() {
      const token = localStorage.getItem('token');
      const defaultUrlStatic = process.env.VUE_APP_DEFAULT_URL_STATIC;

      return new Promise((resolve, reject) => {
        axios.get('/saved-recipes', {
          headers: {Authorization: `Bearer ${token}`}
        }).then(response => {
          console.log(response.data);
          this.savedRecipes = response.data;
          this.savedRecipes.forEach((savedRecipe, index) => savedRecipe.recipe.imageFile = defaultUrlStatic + savedRecipe.recipe.imageFile)
          resolve(response);
        }).catch(error => {
          reject(error);
        });
      });
    },
    showRecipe(id) {
      this.$router.push({name: "Recipe", params: {id: id}});
    },
  }
}
</script>

<style lang="scss" scoped>
@import "../styles/variables.scss";
@import "../styles/styling.scss";

.title {
  @include spanStyle();
  color: $primary-color;
  margin-top: 15px;
  margin-bottom: 15px;
}

.icon::after {
  background-color: transparent !important;
}
</style>