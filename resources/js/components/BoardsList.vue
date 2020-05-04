<template>
  <div class="c-messageBoard__list">
    <Loader v-if="isLoading" />
    <Board v-for="board in boards" :key="board.id" :board="board" />
  </div>
</template>

<script>
import Board from "./Board";
import Loader from "./Loader";
export default {
  components: {
    Board,
    Loader
  },
  data() {
    return {
      boards: null,
      isLoading: Boolean
    };
  },
  created() {
    this.getBoards();
  },
  methods: {
    async getBoards() {
      this.isLoading = true;
      const response = await axios.get("/api/boards");
      console.log(response);
      this.boards = response.data;
      this.isLoading = false;
    }
  }
};
</script>