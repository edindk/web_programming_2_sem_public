<template>
  <v-app-bar app color="white">
    <div>
      <router-link class="link title" :to="{ name: 'Home' }" col="12">
        Cooking application
      </router-link
      >
    </div>
    <v-row justify="end">
      <v-menu offset-y>
        <template v-slot:activator="{ attrs, on }">
          <v-icon v-bind="attrs" v-on="on" large color="green">mdi-menu</v-icon>
        </template>
        <v-list>
          <v-list-item>
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'Home' }">
                <v-icon class="icon mr-2">mdi-home</v-icon>
                Home
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item>
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'Recipes' }">
                <v-icon class="icon mr-2">mdi-note-multiple-outline</v-icon>
                Recipes
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item v-if="user != null && user.role === 'Admin'">
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'CreateRecipe' }">
                <v-icon class="icon mr-2">mdi-pencil</v-icon>
                Create recipe
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item v-if="!user">
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'Register' }">
                <v-icon class="icon mr-2">mdi-pencil</v-icon>
                Register
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item v-if="!user">
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'Login' }">
                <v-icon class="icon mr-2">mdi-login-variant</v-icon>
                Login
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item v-if="user">
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'Profile' }">
                <v-icon class="icon mr-2">mdi-account</v-icon>
                Profile
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item v-if="user != null && user.role === 'Admin'">
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'MyRecipes' }">
                <v-icon class="icon mr-2">mdi-file-outline</v-icon>
                My recipes
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item v-if="user">
            <v-btn class="nav-item" text>
              <router-link class="link" :to="{ name: 'SavedRecipes' }">
                <v-icon class="icon mr-2">mdi-content-save-all-outline</v-icon>
                Saved recipes
              </router-link>
            </v-btn>
          </v-list-item>
          <v-list-item v-if="user">
            <v-btn class="nav-item" text @click="signOut()">
              <router-link class="link" :to="{ name: 'Home' }">
                <v-icon class="icon mr-2">mdi-logout</v-icon>
                Sign out
              </router-link>
            </v-btn>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-row>
  </v-app-bar>
</template>

<script>
import axios from "axios";

export default {
  name: "MobileNavigation",
  data() {
    return {};
  },
  computed: {
    user() {
      return this.$store.state.user;
    }
  },
  methods: {
    signOut() {
      const token = localStorage.getItem('token');

      return new Promise((resolve, reject) => {
        axios.post('/logout', {}, {
          headers: {Authorization: `Bearer ${token}`}
        }).then(response => {
          localStorage.removeItem('token');
          this.$store.commit("setUser", '');
          if (this.$route.name !== "Home") {
            this.$router.push({name: "Home"});
          }
        }).catch(error => {
          reject(error)
        });
      });
    },
  }
};
</script>

<style lang="scss" scoped>
@import "../styles/variables.scss";
@import "../styles/styling.scss";

.link {
  text-decoration: none;
  color: $primary-color;
}

.icon {
  color: $primary-color !important;
}

.avatar {
  background-color: $primary-color !important;
}
</style>>