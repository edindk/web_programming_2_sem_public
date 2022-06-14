<template>
  <v-container>
    <span class="title">Profile</span>
    <v-col md="6" offset-md="3">
      <v-alert type="error" v-show="errorMsg" dismissible>
        {{ errorMsg }}
      </v-alert>
      <v-alert type="success" v-show="msg" dismissible>
        {{ msg }}
      </v-alert>
      <div style="text-align: center;">
        <v-avatar v-if="this.name" class="avatar ml-3" color="red" size="76"><span
            class="white--text text-h5">{{ this.name[0] }}</span>
        </v-avatar>
      </div>
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
        <v-btn class="updateBtn"
               @click="updateUser"
        >
          Save changes
        </v-btn>
      </v-form>
    </v-col>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Profile",
  data() {
    return {
      errorMsg: "",
      msg: "",
      id: "",
      name: "",
      email: "",
      password: "",
      confirmPassword: ""
    }
  },
  async created() {
    let user = await this.$store.dispatch("getUser");
    this.id = user.id;
    this.name = user.name;
    this.email = user.email;
  },
  methods: {
    updateUser() {
      const token = localStorage.getItem('token');

      if (this.name !== "" && this.email !== "" && this.password !== "" && this.confirmPassword !== "" && this.password === this.confirmPassword) {
        return new Promise((resolve, reject) => {
          axios.patch('/user', {
            id: this.id,
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.confirmPassword,
          }, {
            headers: {Authorization: `Bearer ${token}`}
          }).then(response => {
            this.msg = "The information were successfully updated!"
            setTimeout(() => this.msg = null, 10000);
            resolve(response)
          }).catch(error => {
            reject(error)
          });
        });
      }
      this.errorMsg = "Please fill out all the fields!";
      setTimeout(() => this.errorMsg = null, 10000);
    },
  }
}
</script>

<style lang="scss" scoped>
@import "../styles/_variables.scss";
@import "../styles/_styling.scss";

.updateBtn {
  background-color: $primary-color !important;
  color: $light-color;
}

.title {
  @include spanStyle();
  color: $primary-color;
  margin-top: 15px;
  margin-bottom: 15px;
}

.avatar {
  background-color: $primary-color !important;
}
</style>