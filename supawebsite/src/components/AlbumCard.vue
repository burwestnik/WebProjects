<template>
  <div class="col-md-3">
    <div class="card mb-3 shadow-sm" >
      <img
          v-bind:src="emotesData.image"
          class="bd-placeholder-img card-img-top"
          width="100%" height="225" role="img"
          aria-label="Placeholder:
          Image" alt="...">
      <div class="card-body">
        <p class="card-text">
          {{emotesData.name}}
        </p>
        <div
            class="d-flex
            justify-content-between
            align-items-center">
          <b-btn-group>
            <b-button
                variant="outline-secondary"
                class="mt-3"
                id="view-btn"
                block @click="viewModal">
              View
            </b-button>
            <b-modal
                ref="viewModal"
                centered
                no-close-on-backdrop
                hide-backdrop
                hide-footer>
              <template #modal-title>
                <div class="d-block text-center">
                  <h3>
                    {{emotesData.name}}
                  </h3>
                </div>
              </template>
              <img
                  v-bind:src="emotesData.image"
                  class="bd-placeholder-img card-img-top"
                  width="100%"
                  height="450"
                  role="img"
                  aria-label="Placeholder: Image"
                  alt="...">
              <p></p>
              <p class="lead text">
                {{emotesData.description}}
              </p>
              <div class="d-block text">
                <h5>
                  Comments:
                </h5>
              </div>
              <div class="mt-3">
                <div v-if="comments.length === 0">
                  --
                </div>

                <ul v-else class="mb-0 pl-3">
                  <Comment
                      v-bind:key="comment.id"
                      v-bind:comment="comment"
                      v-bind:userData="userData"
                      v-bind:user="users.find(user => user.id === comment.user_id)"
                      @delete-comment="deleteComment"
                      v-for="comment in comments"
                  />
                </ul>
              </div>
              <form
                  ref="commentForm"
                  @submit.stop.prevent="submitComment">
                <b-form-group
                    label="Enter your comment"
                    label-for="text-input"
                    invalid-feedback="Type something FeelsWeirdMan">
                  <b-form-input
                      id="text-input"
                      v-model="newComment"
                      required
                      @keyup.enter="submitComment">
                  </b-form-input>
                </b-form-group>
              </form>
            </b-modal>
            <b-button
                variant="outline-secondary"
                class="mt-3" id="edit-btn"
                block @click="editModal">
              Edit
            </b-button>
            <b-modal
                ref="editModal"
                centered
                scrollable
                hide-backdrop
                no-close-on-backdrop>
              <template #modal-title>
                <div class="d-block text-center">
                  <h5>
                    Edit emote {{emotesData.name}}
                  </h5>
                </div>
              </template>
              <form
                  ref="commentForm"
                  @submit.stop.prevent="saveModal">
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
                      variant="outline-danger"
                      class="mt-3"
                      id="delete-edit-btn"
                      block @click="deleteModal(emotesData.id)">
                    Delete emote
                  </b-button>
                  <b-button
                      variant="outline-success"
                      class="mt-3"
                      id="save-edit-btn"
                      block @click="saveModal">
                    Edit emote
                  </b-button>
                </b-btn-group>
              </template>
            </b-modal>
          </b-btn-group>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Comment from "./Comment";
  export default {
    name: "AlbumCard",
    data(){
      return{
        comments: [],
        users: [],
        emote: null,
        userData: null,
        newComment: '',
        url: '',
        name: '',
        description: ''
      }
    },
    components: {
      Comment
    },
    props: [
      'emotesData'
    ],
    created(){
      this.emote = this.emotesData
      this.$http.get('/comment/emoteid', { params: { emote_id: this.emote.id } })
          .then((response) => this.comments = [...response.data])
      this.$http.get('/user/all')
          .then((response) => this.users = [...response.data])
      if (localStorage.getItem('userData') === null) {
        return
      }
      const userData = JSON.parse(localStorage.getItem('userData'));
      this.userData = { ...userData }
    },
    methods: {
      viewModal() {
        this.$refs['viewModal'].show()
      },
      editModal() {
        this.$refs['editModal'].show()
      },
      saveModal() {
        if (localStorage.getItem('userData') === null) {
          alert('User not authorised.')
          return
        }
        const submissionData = {
          name: this.name,
          description: this.description,
          image: this.url
        }
        this.$emit('edit-emote', this.emotesData.id, submissionData)
        this.name = ''
        this.description = ''
        this.url = ''
        this.$refs['editModal'].hide()
      },
      deleteModal(emoteID) {
        if (localStorage.getItem('userData') === null) {
          alert('User not authorised.')
          return
        }
        this.$emit('delete-emote', emoteID)
        this.$refs['editModal'].hide()
      },
      submitComment(){
        if (this.newComment !== '') {
          if (localStorage.getItem('userData') === null) {
            alert('User not authorised.')
            return
          }
          const userData = JSON.parse(localStorage.getItem('userData'));
          const submissionData = {
            comment: this.newComment,
            user_id: userData.id,
            emote_id: this.emote.id
          }
          console.log(submissionData)
          console.log(userData.accessToken)
          this.$http.post('/comment/create', submissionData, { params: { accessToken: userData.accessToken } }).then(() => {
            this.$http.get('/comment/emoteid', { params: { emote_id: this.emote.id } }).then((response) => this.comments = [...response.data])
          }).catch((error) => alert(error.response.data.statusText))
        }
        this.newComment = ''
      },
      deleteComment(id){
        if (localStorage.getItem('userData') === null) {
          alert('User not authorised.')
          return
        }
        const userData = JSON.parse(localStorage.getItem('userData'));
        console.log(id)
        console.log(userData.accessToken)
        this.$http.delete('/comment/delete', { params: { id, accessToken: userData.accessToken } }).then(() => {
          this.$http.get('/comment/emoteid', { params: { emote_id: this.emote.id } }).then((response) => this.comments = [...response.data])
        }).catch((error) => alert(error.response.data.statusText))
      }
    }
  }
</script>

<style scoped>
</style>