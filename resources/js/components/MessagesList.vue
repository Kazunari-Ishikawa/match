<template>
  <div class="p-messageDetail">
    <div class="p-messageDetail__header">
      <h2 class="p-messageDetail__title">
        かず
        <span>さん</span>
      </h2>
    </div>

    <div class="p-messageDetail__body">
      <Message
        v-for="message in messages"
        :key="message.id"
        :message="message"
        :request-user-id="requestUserId"
      />
    </div>

    <div class="p-messageDetail__post">
      <form @submit.prevent="sendMessage">
        <div class="c-form__group--sm">
          <textarea class="c-form__textarea c-form__textarea--message" v-model="messageText"></textarea>
        </div>
        <div class="c-btn__container">
          <input type="submit" class="c-btn c-btn--em" value="送信する" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Message from "./Message";
export default {
  components: {
    Message
  },
  props: {
    boardId: Number,
    requestUserId: Number
  },
  data() {
    return {
      messages: null,
      messageText: ""
    };
  },
  created() {
    this.getMessages();
  },
  methods: {
    reset() {
      this.messageText = "";
    },
    async getMessages() {
      const response = await axios.get(`/api/messages/${this.boardId}`);
      console.log(response);
      this.messages = response.data;
    },
    async sendMessage() {
      const response = await axios.post(`/api/messages/${this.boardId}/`, {
        board_id: this.boardId,
        user_id: this.requestUserId,
        content: this.messageText
      });
      console.log(response);
      this.reset();
      this.getMessages();
    }
  }
};
</script>