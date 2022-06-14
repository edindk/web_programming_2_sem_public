<template>
      <v-app-bar app color="white">
        <v-spacer/>
        <div class="d-flex align-center">
          <router-link class="link title" :to="{ name: 'Home' }" col="12">
            Cooking application
          </router-link
          >
        </div>
        <v-spacer/>
        <v-btn class="nav-item" text>
          <router-link class="link" :to="{ name: 'Home' }">
            <v-icon class="icon mr-2">mdi-home</v-icon>
            Home
          </router-link>
        </v-btn>
        <v-btn class="nav-item" text>
          <router-link class="link" :to="{ name: 'Recipes' }">
            <v-icon class="icon mr-2">mdi-note-multiple-outline</v-icon>
            Recipes
          </router-link>
        </v-btn>
        <v-btn class="nav-item" text v-if="user != null && user.role === 'Admin'">
          <router-link class="link" :to="{ name: 'CreateRecipe' }">
            <v-icon class="icon mr-2">mdi-pencil</v-icon>
            Create recipe
          </router-link>
        </v-btn>
        <v-btn v-if="!user" class="nav-item" text>
          <router-link class="link" :to="{ name: 'Register' }">
            <v-icon class="icon mr-2">mdi-pencil</v-icon>
            Register
          </router-link>
        </v-btn>
        <v-btn v-if="!user" class="nav-item" text>
          <router-link class="link" :to="{ name: 'Login' }">
            <v-icon class="icon mr-2">mdi-login-variant</v-icon>
            Login
          </router-link>
        </v-btn>
        <v-menu offset-y v-if="user">
          <template v-slot:activator="{ attrs, on }">
            <v-avatar v-bind="attrs" v-on="on" class="avatar ml-3" size="56"><span
                class="white--text text-h5">{{ user.name[0] }}</span>
            </v-avatar>
          </template>
          <v-list>
            <v-list-item>
              <v-list-item-title>{{ user.name }}</v-list-item-title>
            </v-list-item>
            <v-list-item>
              <v-list-item-title>{{ user.email }}</v-list-item-title>
            </v-list-item>
            <v-divider></v-divider>
            <router-link class="link" :to="{name: 'Profile'}">
              <v-list-item @click="">
                <v-list-item-title>
                  <v-icon class="icon mr-2">mdi-account</v-icon>
                  Profile
                </v-list-item-title>
              </v-list-item>
            </router-link>
            <router-link class="link" :to="{name: 'MyRecipes'}" v-if="user != null && user.role === 'Admin'">
              <v-list-item @click="">
                <v-list-item-title>
                  <v-icon class="icon mr-2">mdi-file-outline</v-icon>
                  My Recipes
                </v-list-item-title>
              </v-list-item>
            </router-link>
            <router-link class="link" :to="{name: 'SavedRecipes'}">
              <v-list-item @click="">
                <v-list-item-title>
                  <v-icon class="icon mr-2">mdi-content-save-all-outline</v-icon>
                  Saved recipes
                </v-list-item-title>
              </v-list-item>
            </router-link>
            <v-list-item @click="signOut">
              <v-list-item-title>
                <v-icon class="icon mr-2">mdi-logout</v-icon>
                Sign out
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
        <v-spacer/>
      </v-app-bar>
</template>

<script>
import axios from "axios";

export default {
  name: "Navigation",
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