<template>
  <div>
    <div class="album py-5 bg-dark">
      <div class="container">
        <center>
          <h2 align="text-center">
            <font
                color="white">
              Twitch emotes
            </font>
          </h2>
        </center>
        <div class="row">
          <AlbumCard
              v-bind:key="emotesData.id"
              v-bind:emotes-data="emotesData"
              @edit-emote="editEmote"
              @delete-emote="deleteEmote"
              v-for="emotesData in emotes"/>
        </div>
      </div>
      <p class="text-center">
        <b-btn-group>
          <b-button
              variant="secondary"
              class="mt-3"
              id="add-btn"
              block @click="addModal">
            Add new emote
          </b-button>
        </b-btn-group>
        <b-modal
            ref="addModal"
            centered
            scrollable
            hide-backdrop
            no-close-on-backdrop>
          <template #modal-title>
            <div class="d-block text-center">
              <h5>Add new emote</h5>
            </div>
          </template>
          <form
              ref="commentForm"
              @submit.stop.prevent="createModal">
            <label
                for="imageURL">
              URL
            </label>
            <input
                v-model="url"
                type="text"
                class="form-control"
                id="imageURL">
            <label
                for="imageName">
              Name
            </label>
            <input
                v-model="name"
                type="text"
                class="form-control"
                id="imageName">
            <label
                for="description">
              Description
            </label>
            <textarea
                v-model="description"
                type="text"
                class="form-control"
                id="description"
                rows="10">
            </textarea>
          </form>
          <template #modal-footer>
            <b-btn-group>
              <b-button
                  variant="outline-primary"
                  class="mt-3"
                  id="save-edit-btn"
                  block @click="createModal">
                Save changes
              </b-button>
            </b-btn-group>
          </template>
        </b-modal>
      </p>
    </div>
  </div>
</template>

<script>
  import AlbumCard from "@/components/AlbumCard";

  export default {
    name: "AlbumCards",
    components: {
      AlbumCard
    },
    data() {
      return {
        url: '',
        name: '',
        description: ''
      }
    },
    props: [
      'emotes'
    ],
    methods: {
      addModal() {
        this.$refs['addModal'].show()
      },
      createModal() {
        if (localStorage.getItem('userData') === null) {
          alert('Unauthorised user.')
          return
        }
        const submissionData = {
          name: this.name,
          description: this.description,
          image: this.url
        }
        this.$emit('create-emote', submissionData)
        this.name = ''
        this.description = ''
        this.url = ''
        this.$refs['addModal'].hide()
      },
      deleteEmote(emoteID){
        this.$emit('delete-emote', emoteID)
      },
      editEmote(emoteID, submissionData){
        this.$emit('edit-emote', emoteID, submissionData)
      }
    }
  }
</script>

<style scoped>
</style>