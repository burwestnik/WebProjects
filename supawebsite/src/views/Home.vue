<template>
  <div class="home">
    <HomeHeader/>
    <HomeText/>
    <AlbumCards/>
  </div>
</template>

<script>
// @ is an alias to /src
import HomeHeader from '@/components/home/HomeHeader.vue'
import HomeText from "@/components/home/HomeText";
import AlbumCards from "@/components/home/AlbumCards";

export default {
  name: 'Home',
  components: {
    AlbumCards,
    HomeText,
    HomeHeader
  }
}
</script>

<style>

</style>
