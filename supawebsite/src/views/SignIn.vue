<template>
  <div class="text-center bg-dark">
    <form class="form-signup"  @submit="handleSubmit">
      <img class="mb-4" src="../assets/images/ZULUL.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal"><font color="white">SUPA Website</font></h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input v-model="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input v-model="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3"></div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <router-link class="btn btn-secondary btn-block" v-bind:to="{name: 'SignUp'}">Sign up</router-link>
      <p class="mt-5 mb-3 text-muted">Normans out</p>
    </form>
  </div>
</template>


<script>
import router from "../router";

export default {
  name: "SignIn",
  data() {
    return {
      username: '',
      password: '',
    }
  },
  methods: {
    handleSubmit: function (e) {
      e.preventDefault()
      const submissionData = {
        username: this.username,
        password: this.password,
      }
      this.$http.post('/user/login', submissionData)
          .then((response) => {
            localStorage.setItem('userData', JSON.stringify(response.data))
            router.push({ name: 'Home' })
          })
          .catch((error) => alert(error.response.data.statusText))
    }
  }
}
</script>

<style scoped>
.form-signup {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signup .checkbox {
  font-weight: 400;
}
.form-signup .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signup .form-control:focus {
  z-index: 2;
}
.form-signup input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signup input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.bg-dark {
  height: 100%;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}
</style>