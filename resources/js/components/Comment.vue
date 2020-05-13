<template>
  <div class="c-comment">
    <div class="c-comment__header">
      <a :href="`/users/${comment.user_id}`" class="c-comment__name">{{ comment.user.name }}</a>
      <i class="far fa-trash-alt fa-lg u-icon" @click="clickDelete"></i>
    </div>
    <div class="c-comment__body">
      <div class="c-comment__icon">
        <img
          :src="comment.user.icon ? `/storage/img/icons/${comment.user.icon}` :'/images/icon_sample.png'"
          alt
          class="c-comment__img"
        />
        <div v-show="comment.user_id === comment.work.user_id" class="c-comment__tag">依頼者</div>
      </div>
      <div class="c-comment__main">
        <p class="c-comment__content">{{ comment.content }}</p>
        <p class="c-comment__date">{{ comment.created_at }}</p>
      </div>
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
  methods: {
    clickDelete() {
      this.$emit("click-delete", this.comment.id);
    }
  }
};
</script>