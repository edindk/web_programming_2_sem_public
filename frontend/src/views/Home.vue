<template>
  <div>
    <v-container class="hero-section" fluid>
      <v-row class="section">
        <v-col cols="12" sm="12" md="2" offset-md="3">
          <div class="align-self-center">
            <span>Search for a recipe!</span>
            <v-autocomplete
                v-model="selected"
                :items="allRecipes"
                item-text="title"
                item-value="id"
                class="autocomplete"
                color="white"
                background-color="white"
                placeholder="Search..."
                append-icon="mdi-magnify"
                auto-select-first
                @change="showRecipe"
            >
            </v-autocomplete>
          </div>
          <a href="/#/recipes">Or explore all recipes
            <v-icon to="#" class="icon">mdi-arrow-right</v-icon>
          </a>
        </v-col>
        <v-col md="4" offset="1">
          <img :src="require(`../assets/images/hero-img.png`)"/>
        </v-col>
      </v-row>
    </v-container>
    <v-container fluid class="category-container">
      <v-col class="categories">
        <ul
            id="ulCategories"
            v-for="(category, index) in allCategories"
            :key="index"
        >
          <li>
            <a :href="`/#/recipes/${category.id}`">
              <img
                  :src="category.categoryImg"
                  width="85px"
                  height="85px"
              />
              <p>{{ category.categoryName }}</p>
            </a>
          </li>
        </ul>
      </v-col>
    </v-container>
    <v-container class="recent-container">
      <v-col>
        <v-row>
          <span class="recent-span">Recent recipes</span>
        </v-row>
        <v-row class="recipe-row">
          <RecipeCard
              :recipe="recipe"
              v-for="(recipe, index) in recentRecipes"
              :key="index"
          />
        </v-row>
      </v-col>
    </v-container>
  </div>
</template>

<script>
import RecipeCard from "../components/RecipeCard.vue";

export default {
  name: "Home",
  components: {
    RecipeCard,
  },
  data() {
    return {
      selected: null,
    };
  },
  computed: {
    recentRecipes() {
      return this.$store.getters.recentRecipes;
    },
    allRecipes() {
      return this.$store.getters.allRecipes;
    },
    allCategories() {
      return this.$store.getters.allCategories;
    }
  },
  methods: {
    showRecipe() {
      this.$router.push({name: "Recipe", params: {id: this.selected}});
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../styles/_variables.scss";
@import "../styles/_styling.scss";

@mixin spanStyle {
  font-weight: bold;
  font-size: 35px;
}

.hero-section {
  background: $linear-gradient;
  max-height: 480px;
  height: 480px;
  box-shadow: 0 10px 50px 0 rgb(32 76 136 / 15%);

  .section {
    align-items: center;
    display: flex;

    .autocomplete {
      margin-bottom: -14px;
    }

    a {
      text-decoration: none;
      color: $light-color;
      size: 3rem;
    }
  }

  .icon {
    color: $light-color;
  }

  span {
    @include spanStyle();
    color: $light-color;
  }

  img {
    max-height: 480px;
    width: auto;
  }

  @media screen and (max-width: 959px) {
    img {
      display: none;
    }
  }
}

.recent-container {
  .recent-span {
    @include spanStyle();
    color: $primary-color;
    margin-top: 8px;
  }

  .recipe-row {
    margin-top: -30px;
  }
}

.category-container {
  @include sub-section();

  ul {
    max-width: 1080px;
    padding-bottom: 15px;
    display: inline-block;
    list-style-type: none;

    li {
      display: inline-block;
      margin-right: 15px;
    }
  }

  .categories {
    a {
      text-decoration: none;
    }

    p {
      color: $primary-color;
    }
  }
}
</style>