<template>
  <v-container>
    <span class="title">Login</span>
    <v-col md="6" offset-md="3">
      <v-alert type="error" v-show="errorMsg" dismissible>
        {{ this.errorMsg }}
      </v-alert>
      <v-form
          ref="form"
          lazy-validation>
        <v-text-field
            v-model="email"
            color="green"
            label="E-mail"
            required
        ></v-text-field>
        <v-text-field
            v-model="password"
            color="green"
            label="Password"
            type="password"
            required
        ></v-text-field>
        <v-btn class="loginBtn"
               @click="login"
        >
          Login
        </v-btn>
      </v-form>
    </v-col>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      errorMsg: "",
    }
  },
  methods: {
    login() {
      if (this.email !== "" && this.password !== "") {
        return new Promise((resolve, reject) => {
          axios.post('/login', {
            email: this.email,
            password: this.password,
          }).then(response => {
            localStorage.setItem('token', response.data.token);
            this.$store.dispatch("getUser");
            this.$router.push({ name: "Home" });
          }).catch(error => {
            this.errorMsg = "Something went wrong!";
            setTimeout(() => this.errorMsg = null, 10000);
            reject(error)
          });
        });
      }
      this.errorMsg = "Please fill out all the fields!";
      setTimeout(() => this.errorMsg = null, 10000);
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../styles/_variables.scss";
@import "../styles/_styling.scss";

.loginBtn {
  background-color: $primary-color !important;
  color: $light-color;
}
.title {
  @include spanStyle();
  color: $primary-color;
  margin-top: 15px;
  margin-bottom: 15px;
}
</style>