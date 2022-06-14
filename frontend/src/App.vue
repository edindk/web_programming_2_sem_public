<template>
  <v-app>
    <Navigation v-if="!mobile"/>
    <MobileNavigation v-if="mobile" />
    <v-main>
      <router-view/>
    </v-main>
    <Footer/>
  </v-app>
</template>

<script>
import Navigation from './components/Navigation.vue';
import MobileNavigation from './components/MobileNavigation.vue';
import Footer from './components/Footer.vue';

export default {
  name: 'App',
  components: {
    Navigation,
    Footer,
    MobileNavigation
  },
  data() {
    return {
      mobile: null,
    }
  },
  created() {
    window.addEventListener("resize", this.checkScreen);
    this.checkScreen();
    if (localStorage.getItem('token')) {
      this.$store.dispatch("getUser");
    }
    this.$store.dispatch("getRecipes");
    this.$store.dispatch("getCategories");
  },
  methods: {
    checkScreen() {
      this.windowWidth = window.innerWidth;
      if (this.windowWidth <= 750) {
        this.mobile = true;
        return;
      }
      this.mobile = false;
      return;
    }
  }
};
</script>
