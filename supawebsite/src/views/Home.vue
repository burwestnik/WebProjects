<template>
  <div class="home">
    <HomeHeader/>
    <HomeText/>
    <AlbumCards v-bind:emotes="emotes"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HomeHeader from "@/components/home/HomeHeader";
import HomeText from "@/components/home/HomeText";
import AlbumCards from "@/components/home/AlbumCards";

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
          this.news = [...response.data]
        })
  }
}
</script>

<style>

</style>
