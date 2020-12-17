<template>
  <div class="home">
    <HomeHeader/>
    <HomeText/>
    <AlbumCards
        v-bind:emotes="emotes"
        @create-emote="createEmote"
        @edit-emote="editEmote"
        @delete-emote="deleteEmote"
        @post-comment="postComment"
        @delete-comment="deleteComment"
    />
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
    this.$http.get('/emote/all').then((response) => {
      console.log(response.data)
      this.emotes = [...response.data]
    })
  },
  methods: {
    createEmote(submissionData) {
      const userData = JSON.parse(localStorage.getItem('userData'));
      this.$http.post('/emote/create', submissionData, {params: {accessToken: userData.accessToken}}).then(() => {
        this.$http.get('/emote/all').then((response) => this.emotes = [...response.data])
      }).catch((error) => alert(error.response.data.statusText))
    },
    deleteEmote(emoteID){
      const userData = JSON.parse(localStorage.getItem('userData'));
      this.$http.delete('/emote/delete', { params: { emoteID, accessToken: userData.accessToken } }).then(() => {
        this.$http.get('/emote/all').then((response) => this.emotes = [...response.data])
      }).catch((error) => alert(error.response.data.statusText))
    },
    editEmote(emoteID, submissionData){
      const userData = JSON.parse(localStorage.getItem('userData'));
      this.$http.post('/emote/update', submissionData, { params: { emoteID, accessToken: userData.accessToken } }).then(() => {
        this.$http.get('/emote/all').then((response) => this.emotes = [...response.data])
      }).catch((error) => alert(error.response.data.statusText))
    }
  }
}
</script>

<style>

</style>
