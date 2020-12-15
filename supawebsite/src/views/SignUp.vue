<template>
  <div class="text-center bg-dark">
    <form
        class="form-signin"
        @submit="handleSubmit">
      <img
          class="mb-4"
          src="../assets/images/ZULUL.png"
          alt=""
          width="72"
          height="72">
      <h1 class="h3 mb-3 font-weight-normal">
        <font color="white">
          SUPA Website
        </font>
      </h1>
      <h3 class="h5 mb-3 font-weight-normal">
        <font color="white">
          So you want to become a baj...
        </font>
      </h3>
      <label
          for="inputUsername"
          class="sr-only">
        Enter sername
      </label>
      <input
          v-model="username"
          type="text"
          id="inputUsername"
          class="form-control"
          placeholder="Username"
          required autofocus>
      <label
          for="inputPassword"
          class="sr-only">
        Create password
      </label>
      <input
          v-model="password"
          type="password"
          id="inputPassword"
          class="form-control"
          placeholder="Password"
          required>
      <div class="checkbox mb-3"/>
      <button
          class="btn btn-lg btn-primary btn-block"
          type="submit">
        Sign up
      </button>
      <router-link
          class="btn btn-secondary
          btn-block"
          v-bind:to="{name: 'SignIn'}">
        Back
      </router-link>
      <p class="mt-5 mb-3 text-muted">
        FeelsOkayMan
      </p>
    </form>
  </div>
</template>

<script>
  import router from "../router";

  export default {
    name: "SignUp",
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
        this.$http.post('/user/register', submissionData).then((response) => {
          localStorage.setItem('userData', JSON.stringify(response.data))
          router.push({ name: 'SignIn' })
        }).catch((error) => alert(error.response.data.statusText))
      }
    }
  }
</script>

<style scoped>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
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