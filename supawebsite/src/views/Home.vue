<template>
  <div class="home">
    <HomeHeader/>
    <HomeText/>
    <AlbumCards v-bind:emotes="emotes"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HomeHeader from "@/components/HomeHeader";
import HomeText from "@/components/HomeText";
import AlbumCards from "@/components/AlbumCards";

export default {
  name: 'Home',
  components: {
    AlbumCards,
    HomeText,
    HomeHeader
  },
  data(){
    return {
      emotes: []
    }
  },
  created() {
    this.$http.get('/emote/all')
        .then((response) => {
          console.log(response.data)
          this.emotes = [...response.data]
        })
  }
}
</script>

<style>

</style>
