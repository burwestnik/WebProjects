<template>
  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">VI VON ZULUL</h4>
            <p class="text-muted">If you understand this communique, then you have been defeated and now you must post identical communique in Forsen's chatroom. ZULUL</p>
            <a href="https://www.twitch.tv/forsen" class="btn btn-secondary my-2">Post it ZULUL</a>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <h3>Twitch cancer emotes album</h3>
        </a>
        <p>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <router-link class="btn btn-secondary my-2" v-bind:to="{name: 'SignIn'}">Sign out</router-link>
        </p>
      </div>
    </div>
  </header>
</template>

<script>
export default {
name: "HomeHeader"
}
</script>

<style scoped>
</style>