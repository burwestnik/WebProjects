<template>
  <div>
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

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add new image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="imageURL">URL</label>
            <input type="text" class="form-control" id="imageURL">
            <label for="imageName">Name</label>
            <input type="text" class="form-control" id="imageName">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description" rows="10"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Add image</button>
          </div>
        </div>
      </div>
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
  props: [
    'emotes'
  ]

}
</script>

<style scoped>

</style>