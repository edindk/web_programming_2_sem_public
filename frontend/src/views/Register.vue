<template>
  <v-container>
    <span class="title">Register</span>
    <v-col md="6" offset-md="3">
      <v-alert type="error" v-show="errorMsg" id="errorMsg">
        {{ this.errorMsg }}
      </v-alert>
      <v-form
          ref="form"
          lazy-validation>
        <v-text-field
            v-model="name"
            color="green"
            label="Name"
            required
        ></v-text-field>
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
        <v-text-field
            v-model="confirmPassword"
            color="green"
            label="Confirm password"
            type="password"
            required
        ></v-text-field>
        <v-btn class="registerBtn"
               @click="register"
        >
          Register
        </v-btn>
      </v-form>
    </v-col>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Register",
  data() {
    return {
      name: "",
      email: "",
      password: "",
      confirmPassword: "",
      errorMsg: "",
    }
  },
  methods: {
    register() {
      if (this.name !== "" && this.email !== "" && this.password !== "" && this.confirmPassword !== "" && this.password === this.confirmPassword) {
        return new Promise((resolve, reject) => {
          axios.post('/register', {
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.confirmPassword
          }).then(response => {
            this.$router.push({ name: "Home" });
            resolve(response);
          }).catch(error => {
            reject(error);
          });
        });
      }
      this.errorMsg = "Please fill out all the fields!";
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../styles/_variables.scss";
@import "../styles/_styling.scss";

.registerBtn {
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