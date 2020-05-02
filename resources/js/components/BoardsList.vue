<template>
  <div class="c-messageBoard__list">
    <Board v-for="board in boards" :key="board.id" :board="board" @click-delete="deleteBoard" />
  </div>
</template>

<script>
import Board from "./Board";
export default {
  components: {
    Board
  },
  data() {
    return {
      boards: null
    };
  },
  created() {
    this.getBoards();
  },
  methods: {
    async getBoards() {
      const response = await axios.get("/api/boards");
      console.log(response);
      this.boards = response.data;
    },
    async deleteBoard(id) {
      if (confirm("削除します。よろしいですか？")) {
        const response = await axios.post(`/api/boards/${id}/delete`);
        console.log(response);

        if (response.status === 200) {
          alert("削除しました。");
          this.getBoards();
        }
      }
    }
  }
};
</script>