<template>
  <div>
    <v-container>
      <span class="title">Create recipe</span>
      <v-col md="4" offset="3">
        <v-alert type="error" v-show="errorMsg" dismissible>
          {{ errorMsg }}
        </v-alert>
        <v-alert type="success" v-show="msg" dismissible>
          {{ msg }} <a :href="url" style="color: white;">Click here and see your newly added recipe!</a>
        </v-alert>
      </v-col>
      <v-row>
        <v-col class="mt-10" md="2">
          <h3>Serves, cook time, prep time, difficulty</h3>
          <v-text-field v-model="serves" label="Serves" color="green"></v-text-field>
          <v-text-field v-model="cookTime" label="Cook time" color="green"></v-text-field>
          <v-text-field v-model="prepTime" label="Prep time" color="green"></v-text-field>
          <v-text-field v-model="difficulty" label="difficulty" color="green"></v-text-field>
          <h3 class="mb-5 mt-5">Description</h3>
          <v-row>
            <v-textarea v-model="description"
                        color="green"
                        outlined
                        name="input-7-4"
                        label="Description"
                        value=""
            ></v-textarea>
          </v-row>
          <div>
            <h3>Category</h3>
            <v-autocomplete
                v-model="category"
                :items="categories"
                item-text="categoryName"
                item-value="id"
                class="autocomplete"
                color="green"
                background-color="white"
                placeholder="Pick a category"
                auto-select-first
            >
            </v-autocomplete>
          </div>
          <h3 class="mb-1">Ingredients</h3>
          <v-form @submit.prevent="addIngredient">
            <div class="d-flex">
              <v-text-field v-model="ingredient" label="Ingredient" color="green"></v-text-field>
              <v-btn class="addiIngredientBtn ml-2 mt-3" @click="addIngredient">Add +</v-btn>
            </div>
          </v-form>
          <v-row>
            <v-list-item v-for="(ingredient, index) in ingredients" :key="index">
              <v-list-item-content>
                <div class="d-flex">
                  <v-list-item-title>{{ ingredient.ingredient }}</v-list-item-title>
                  <v-icon color="orange" @click="removeIngredient(index)">mdi-close-circle</v-icon>
                </div>
                <v-divider class="mt-3"></v-divider>
              </v-list-item-content>
            </v-list-item>
          </v-row>
        </v-col>
        <v-col md="8">
          <div class="container">
            <div class="d-flex">
              <v-col>
                <v-row>
                  <v-text-field v-model="title" label="Recipe title" color="green"></v-text-field>
                </v-row>
              </v-col>
              <v-col>
                <v-row class="offset-4">
                  <v-file-input v-model="imageFile"
                                color="green"
                                label="Upload Photo"
                                filled
                                prepend-icon="mdi-camera"
                  ></v-file-input>
                </v-row>
              </v-col>
            </div>
            <div>
              <vue-editor class="editor" v-model="recipeHTML"/>
            </div>
            <div>
              <v-btn class="publishBtn" @click="publishRecipe">Publish recipe!</v-btn>
            </div>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import axios from 'axios'
import {VueEditor} from "vue2-editor";

export default {
  name: "CreateRecipe",
  components: {
    VueEditor
  },
  data() {
    return {
      serves: null,
      prepTime: null,
      cookTime: null,
      difficulty: null,
      category: null,
      description: null,
      ingredient: null,
      ingredients: [],
      recipeHTML: null,
      title: null,
      imageFile: null,
      errorMsg: null,
      msg: null,
      url: null,
    }
  },
  computed: {
    categories() {
      return this.$store.getters.allCategories;
    }
  },
  methods: {
    publishRecipe() {
      let formData = new FormData();
      formData.append("categoryId", this.category);
      formData.append("title", this.title);
      formData.append("recipeHTML", this.recipeHTML);
      formData.append("imageFile", this.imageFile);
      formData.append("description", this.description);
      formData.append("serves", this.serves);
      formData.append("cookTime", this.cookTime);
      formData.append("prepTime", this.prepTime);
      formData.append("difficulty", this.difficulty);
      formData.append("ingredients", JSON.stringify(this.ingredients));

      const token = localStorage.getItem('token');

      axios.post('/recipe', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
          Authorization: `Bearer ${token}`
        }
      }).then(response => {
        this.msg = "Recipe successfully added!";
        setTimeout(() => this.msg = null, 5000);

        this.url = "#/recipe/"+response.data.id;
        this.$store.dispatch("getRecipes");
      }).catch(error => {
        this.errorMsg = "Something went wrong!";
        setTimeout(() => this.errorMsg = null, 5000);
      });
    },
    removeIngredient(index) {
      this.ingredients.splice(index, 1);
    },
    addIngredient() {
      this.ingredients.push({ingredient: this.ingredient});
    }
  }
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

.addiIngredientBtn {
  background-color: $primary-color !important;
  color: $light-color;
}

.editor {
  height: 350px;
}

.publishBtn {
  margin-top: 86px;
  background-color: $primary-color !important;
  color: $light-color;
}
</style>