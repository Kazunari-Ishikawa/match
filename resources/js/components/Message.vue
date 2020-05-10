<template>
  <div
    class="c-message"
    :class="[requestUserId == message.user_id ? 'c-message--myself' : 'c-message--other']"
  >
    <p
      class="c-message__content"
      :class="[requestUserId == message.user_id ? 'c-message__content--myself' : 'c-message__content--other']"
      @click="clickDelete"
    >{{ message.content }}</p>
    <p
      class="c-message__date"
      :class="[requestUserId == message.user_id ? 'c-message__date--myself' : 'c-message__date--other']"
    >{{ message.created_at }}</p>
  </div>
</template>

<script>
export default {
  props: {
    message: Object,
    requestUserId: Number
  },
  methods: {
    clickDelete() {
      if (confirm("このメッセージを削除しますか？")) {
        this.$emit("click-delete", this.message.id);
      }
    }
  }
};
</script>