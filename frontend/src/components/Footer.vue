<template>
  <v-footer color="#80b700" padless>
    <v-row justify="center" no-gutters>
      <v-btn
        v-for="link in links"
        :key="link"
        color="white"
        text
        rounded
        class="my-2"
      >
        <router-link class="link" :to="{ name: `${link}` }">{{
          link
        }}</router-link>
      </v-btn>
      <v-col class="py-4 text-center white--text" cols="12">
        {{ new Date().getFullYear() }} — <strong>Cooking application</strong>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {
      links: ["Home", "Recipes", "Register", "Login"],
    };
  },
};
</script>

<style lang="scss" scoped>
@import "../styles/_variables.scss";

.link {
  text-decoration: none;
  color: $light-color;
}
</style>