<template>
  <div class="p-messageDetail">
    <div class="p-messageDetail__header">
      <h2 class="p-messageDetail__title">
        {{ this.sendUserName }}
        <span>さん</span>
      </h2>
    </div>

    <div id="messageBox" class="p-messageDetail__body">
      <Message
        v-for="message in messages"
        :key="message.id"
        :message="message"
        :request-user-id="requestUserId"
        @click-delete="deleteMessage"
      />
    </div>

    <div class="p-messageDetail__send">
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
    requestUserId: Number,
    sendUserName: String
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
  updated() {
    this.scroll();
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
    },
    async deleteMessage(id) {
      if (confirm("削除します。よろしいですか？")) {
        const response = await axios
          .post(`/api/messages/${id}/delete`)
          .catch(error => {
            console.log(error);
            return error.response;
          });

        console.log(response);
        if (response.status !== 200) {
          alert("あなたのメッセージではないので削除できません。");
        }
        if (response.status === 200) {
          alert("削除しました。");
          this.getMessages();
        }
      }
    },
    scroll() {
      const meesageBox = document.getElementById("messageBox");
      messageBox.scrollTop = messageBox.scrollHeight;
    }
  }
};
</script>