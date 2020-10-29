<template>
  <div class="text-center bg-dark">
    <form class="form-signup">
      <img class="mb-4" src="../assets/images/ZULUL.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal"><font color="white">SUPA Website</font></h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3"></div>
      <router-link class="btn btn-lg btn-primary btn-block" v-bind:to="{name: 'Home'}">Sign in</router-link>
      <router-link class="btn btn-secondary btn-block" v-bind:to="{name: 'SignUp'}">Sign up</router-link>
      <p class="mt-5 mb-3 text-muted">Normans out</p>
    </form>
  </div>
</template>

<script>
export default {
  name: "SignIn"
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