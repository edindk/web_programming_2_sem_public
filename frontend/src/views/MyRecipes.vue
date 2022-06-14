<template>
  <v-container>
    <span class="title">My Recipes</span>
    <v-col md="6" offset-md="3">
      <v-alert type="error" v-show="errorMsg" dismissible>
        {{ errorMsg }}
      </v-alert>
      <v-alert type="success" v-show="msg" dismissible>
        {{ msg }}
      </v-alert>
      <h3 v-if="recipes.length <= 0">No recipes added yet!</h3>
      <v-list-item v-for="(recipe, index) in recipes" :key="index">
        <v-list-item-content>
          <div class="d-flex">
            <v-list-item-title>
              <v-row align="center">
                <a :href="'#/recipe/'+recipe.id"><img :src="recipe.imageFile"
                                                                  style="height: 150px; width: 150px"/></a>
                <div class="ml-5">
                  <h4>{{ recipe.title }}</h4>
                  <p>Created date: {{ recipe.createdDate }}</p>
                </div>
              </v-row>
            </v-list-item-title>
            <v-icon color="green" class="icon mr-5" @click="editRecipe(`${recipe.id}`)">mdi-pencil-outline</v-icon>
            <v-icon color="red" class="icon" @click="deleteRecipe(`${recipe.id}`)">mdi-close-circle</v-icon>
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
  name: 'MyRecipe',
  data() {
    return {
      msg: '',
      errorMsg: '',
      recipes: [],
    }
  },
  mounted() {
    this.getRecipesByUserId();
  },
  methods: {
    deleteRecipe(id) {
      const token = localStorage.getItem('token');

      return new Promise((resolve, reject) => {
        axios.delete('/recipe/' + id, {
          headers: {Authorization: `Bearer ${token}`}
        }).then(response => {
          this.msg = 'Recipe successfully deleted!'
          setTimeout(() => this.msg = null, 10000);
          this.getRecipesByUserId();
          resolve(response);
        }).catch(error => {
          console.log(error);
          reject(error);
        })
      });
    },
    async getRecipesByUserId() {
      let user = await this.$store.dispatch("getUser");
      let recipes = await this.$store.dispatch("getRecipes");

      this.recipes = recipes.filter((recipe) => {
        return recipe.userId === parseInt(user.id);
      });
    },
    editRecipe(id){
      this.$router.push({ name: "EditRecipe", params: { id: id }});
    }
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