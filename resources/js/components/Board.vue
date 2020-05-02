<template>
  <div class="c-messageBoard">
    <div class="c-messageBoard__header">
      <a :href="`/messages/${board.id}`" class="c-messageBoard__title">
        <h3 class>{{ board.work.title }}</h3>
      </a>
      <i class="far fa-trash-alt fa-lg u-icon" @click="clickDelete"></i>
    </div>
    <template v-if="getMessageFinished && message !== '' ">
      <div class="c-messageBoard__body">
        <img alt="アイコン" class="c-messageBoard__icon" />
        <div class="c-messageBoard__main">
          <p class="c-messageBoard__name">{{ message.user.name }}</p>
          <p class="c-messageBoard__content">{{ message.content }}</p>
        </div>
        <p class="c-messageBoard__date">{{ message.created_at }}</p>
      </div>
    </template>
    <template v-else>
      <div class="c-messageBoard__body">
        <div class="c-messageBoard__main">
          <p class="c-messageBoard__content">まだコメントがありません</p>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
export default {
  props: {
    board: Object
  },
  data() {
    return {
      message: null,
      getMessageFinished: false
    };
  },
  created() {
    this.getLatestMessage();
  },
  methods: {
    async getLatestMessage() {
      const response = await axios.get(
        `/api/boards/${this.board.id}/messages/latest`
      );
      console.log(response);
      this.message = response.data;
      this.getMessageFinished = true;
    },
    clickDelete() {
      this.$emit('click-delete', this.board.id)
    }
  }
};
</script>