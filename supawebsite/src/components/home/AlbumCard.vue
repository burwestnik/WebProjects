<template>
  <div class="col-md-3" >
    <div class="card mb-3 shadow-sm" >
      <img class="bd-placeholder-img card-img-top" src="~@/assets/images/Okayga.png" width="100%" height="225" role="img" aria-label="Placeholder: Image">
      <div class="card-body">
        <p class="card-text">Okayga</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#viewModal">View</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#editModal">Edit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
name: "AlbumCard"
}
</script>

<style scoped>

</style>