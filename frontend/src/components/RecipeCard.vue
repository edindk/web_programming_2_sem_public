<template>
  <v-card class="mx-auto my-12" max-width="374" @click="showRecipe(recipe.id)">
    <v-img
        height="250"
        :src="recipe.imageFile"
    ></v-img>
    <v-card-title>{{ recipe.title }}</v-card-title>
    <v-card-text class="card-text">
      <div>Prep: {{ recipe.prepTime }} • Cook: {{ recipe.cookTime }} • Difficulty: {{ recipe.difficulty }}</div>
    </v-card-text>
    <v-card-text>
      <v-row align="center" class="mx-0">
<!--        <v-rating-->
<!--            :value="4.5"-->
<!--            color="amber"-->
<!--            dense-->
<!--            half-increments-->
<!--            readonly-->
<!--            size="14"-->
<!--        ></v-rating>-->
<!--        <div class="grey&#45;&#45;text ms-4">4.5</div>-->
        <v-spacer></v-spacer>
        <v-btn class="see-recipe-btn" color="lighten-2" text @click="showRecipe(recipe.id)"> See recipe</v-btn>
      </v-row>
    </v-card-text>
  </v-card>
</template>
<script>
export default {
  name: "Recipe",
  props: ["recipe"],
  data() {
    return {
    };
  },
  methods: {
    showRecipe(id) {
      this.$router.push({name: "Recipe", params: {id: id}});
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../styles/variables.scss";

.card-text {
  div {
    margin-top: -15px;
  }
}

.see-recipe-btn {
  color: $primary-color !important;
}
</style>