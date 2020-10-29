<template>
  <div class="album py-5 bg-dark">
    <div class="container">
      <center>
        <h2 align="text-center"><font color="white">Twitch emotes</font></h2>
      </center>
      <div class="row">
        <!--Render component for each picture-->
        <AlbumCard/>
      </div>
    </div>
  </div>
</template>

<script>
import AlbumCard from "@/components/home/AlbumCard";
export default {
name: "AlbumCards",
  components: {AlbumCard}
}
</script>

<style scoped>

</style>