<template>
  <div class="comment">
    <button
        v-if="userData && comment.user_id === userData.id"
        class="btn btn-danger cssClass='e-small'"
        size="sm"
        @click.prevent="deleteComment(comment.id)"
    />
    <div class="text overflow-wrap: break-word"><strong>{{ user.username }}:</strong> {{ comment.comment }}</div>
  </div>
</template>

<script>
export default {
  name: "Comment",
  props: [
    'comment',
    'user',
    'userData'
  ],
  methods: {
    deleteComment(id) {
      this.$emit('delete-comment', id)
    }
  }
}
</script>

<style scoped>
  .comment{
    display: flex;
    align-items: center;
    max-width: 450px;

  }
</style>