<template>
  <div class="col-md-3" >
    <div class="card mb-3 shadow-sm" >
      <img v-bind:src="emotesData.image" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Image" alt="...">
      <div class="card-body">
        <p class="card-text">{{emotesData.name}}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#viewModal">View</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#editModal">Edit</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit image</h5>
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
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#confirmDeleteModal">Delete image</button>
            <button type="button" class="btn btn-primary">Save image</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p class="card-text">{{emotesData.name}}</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img v-bind:src="emotesData.image" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Image" alt="...">
            <p class="lead text">{{emotesData.description}}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body bg-dark">
            <p class="lead text"><font color="white">Are you sure you want to delete this image?</font></p>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import router from "../router";

export default {
name: "AlbumCard",
  props: [
    'emotesData'
  ],
  methods: {
    emoteOpen(emoteId) {
      router.push({ name: 'Emote', params: { emoteId } })
    }
  }
}
</script>

<style scoped>

</style>