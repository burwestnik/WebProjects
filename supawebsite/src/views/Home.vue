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
      emotes: [
        {
          id: 0,
          name: 'Okayga',
          description: 'FeelsOkayMan + Pepega.',
          image: require('@/assets/images/Okayga.png'),
        },
        {
          id: 1,
          name: 'PeepoClown',
          description: 'Because twitch viewers are often clowns.',
          image: require('@/assets/images/PeepoClown.png'),
        },
        {
          id: 2,
          name: 'forsenCD',
          description: 'D OMEGALUL C emote.',
          image: require('@/assets/images/forsenCD.jpg'),
        },
        {
          id: 3,
          name: 'FeelsAmazingMan',
          description: 'When you are totally happy.',
          image: require('@/assets/images/FeelsAmazingMan.png'),
        },
        {
          id: 4,
          name: 'Pepega',
          description: 'Absolute retardness.',
          image: require('@/assets/images/Pepega.png'),
        },
        {
          id: 5,
          name: 'forsenE',
          description: 'The face of Twitch.',
          image: require('@/assets/images/forsenE.jpg'),
        },
        {
          id: 6,
          name: 'KKomrade',
          description: 'Fellow russians emote',
          image: require('@/assets/images/KKomrade.png'),
        },
        {
          id: 7,
          name: '5Head',
          description: 'Intellectual.',
          image: require('@/assets/images/5Head.png'),
        },
      ]
    }
  }
}
</script>

<style>

</style>
