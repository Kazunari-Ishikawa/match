<template>
  <div class="c-messageBoard__list">
    <Loader v-if="isLoading" />
    <div v-if="!isLoading" class="c-messageBoard__type">依頼した案件</div>
    <Board v-for="board in boards" :key="board.id" :board="board" />

    <div v-if="!isLoading" class="c-messageBoard__type">応募した案件</div>
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
      userId: 0,
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
      this.boards = response.data.boards;
      this.userId = response.data.user_id;
      this.isLoading = false;
    }
  }
};
</script>