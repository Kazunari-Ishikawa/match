<template>
  <a :href="`/messages/${board.id}`" class="c-board">
    <div class="c-board__header">
      <div class="c-board__title">
        <h3 class>{{ board.work.title }}</h3>
      </div>
      <p class="c-board__subtitle">{{board.from_user.name}}の応募</p>
    </div>
    <template v-if="getMessageFinished && message !== '' ">
      <div class="c-board__body">
        <img
          :src="message.user.icon ? `/storage/img/icons/${message.user.icon}` :'/images/icon_sample.png'"
          alt="アイコン"
          class="c-board__icon"
        />
        <div class="c-board__main">
          <p class="c-board__name">{{ message.user.name }}</p>
          <p class="c-board__content">{{ message.content }}</p>
        </div>
        <p class="c-board__date">{{ message.created_at }}</p>
      </div>
    </template>
    <template v-else>
      <div class="c-board__body">
        <div class="c-board__main">
          <p class="c-board__content">まだコメントがありません</p>
        </div>
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