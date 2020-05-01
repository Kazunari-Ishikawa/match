<template>
  <a :href="`/messages/${board.id}`" class="c-messageBoard">
    <template v-if="getMessageFinished && message !== '' ">
      <img alt="アイコン" class="c-messageBoard__icon" />
      <div class="c-messageBoard__body">
        <p class="c-messageBoard__name">{{ message.user.name }}</p>
        <p class="c-messageBoard__content">{{ message.content }}</p>
      </div>
      <p class="c-messageBoard__date">{{ message.created_at }}</p>
    </template>
    <template v-else>
      <div class="c-messageBoard__body">
        <p class="c-messageBoard__content">コメントがありません</p>
      </div>
    </template>
  </a>
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
    }
  }
};
</script>