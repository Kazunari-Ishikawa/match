<template>
  <a :href="`/messages/${board.id}`" class="c-messageBoard">
    <img alt="アイコン" class="c-messageBoard__icon" />
    <div class="c-messageBoard__body">
      <p class="c-messageBoard__name">
        Username
        <span>さん</span>
      </p>
      <p class="c-messageBoard__content">コメントコメントコメントコメントコメント</p>
    </div>
    <p class="c-messageBoard__date">4/22 19:14</p>
  </a>
</template>

<script>
export default {
  props: {
    board: Object
  },
  data() {
    return {
      message: null
    };
  },
  created() {
    // this.getLatestMessage();
  },
  methods: {
    async getLatestMessage() {
      const response = await axios.get(
        `/api/boards/${this.board.id}/messages/latest`
      );
      console.log(response);
      this.message = response.data;
    }
  }
};
</script>