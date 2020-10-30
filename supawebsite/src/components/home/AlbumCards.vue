<template>
  <div class="album py-5 bg-dark">
    <div class="container">
      <center>
        <h2 align="text-center"><font color="white">Twitch emotes</font></h2>
      </center>
      <div class="row">
        <AlbumCard v-bind:key="emotesData.id" v-bind:emotes-data="emotesData" v-for="emotesData in emotes" />
      </div>
    </div>
    <p class="text-center">
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addModal">Add new image</button>
    </p>
  </div>
</template>

<script>
import AlbumCard from "@/components/home/AlbumCard";
export default {
name: "AlbumCards",
  components: {
    AlbumCard
  },
  props: [
    'emotes'
  ]

}
</script>

<style scoped>

</style>