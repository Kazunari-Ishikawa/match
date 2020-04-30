<template>
  <div class="c-comment">
    <div class="c-comment__account">
      <img alt="アイコン" class="c-comment__icon" />
      <div class="c-comment__accountName">
        <p class="c-comment__name">{{ comment.user.name }}</p>
        <div class="c-comment__tag"></div>
      </div>
    </div>
    <div class="c-comment__body">
      <p class="c-comment__content">{{ comment.content }}</p>
      <p class="c-comment__date">{{ comment.created_at }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    comment: {
      type: Object,
      default: null
    }
  },
  created() {
    console.log("Comment created.");
  }
};
</script>