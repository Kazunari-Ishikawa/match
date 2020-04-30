<template>
  <div class="c-messageBoard__list">
    <Board v-for="board in boards" :key="board.id" :board="board" />
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
    }
  }
};
</script>