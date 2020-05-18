<template>
  <div class="c-boardList">
    <div class="c-boardList__header">
      <h2 class="c-boardList__title">メッセージ</h2>
    </div>

    <div class="c-boardList__tab">
      <p class="c-boardList__type" :class="{isActive: listType === 1}" @click="listType = 1">依頼した案件</p>
      <p class="c-boardList__type" :class="{isActive: listType === 2}" @click="listType = 2">応募中の案件</p>
    </div>

    <Loader v-if="isLoading" />

    <template v-if="listType === 1">
      <Board v-for="board in requestedBoards" :key="board.id" :board="board" />
    </template>
    <template v-if="listType === 2">
      <Board v-for="board in appliedBoards" :key="board.id" :board="board" />
    </template>
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
      isLoading: false,
      requestedBoards: null,
      appliedBoards: null,
      listType: 1
    };
  },
  created() {
    this.getBoards();
  },
  methods: {
    // メッセージ表示のBoardを取得する
    async getBoards() {
      this.isLoading = true;
      const response = await axios.get("/api/boards").catch(error => {
        return error.response;
      });
      if (response.status !== 200) {
        alert("エラーが発生しました。再度やり直してください。");
        return false;
      }
      if (response.status === 200) {
        this.requestedBoards = response.data.requested_boards;
        this.appliedBoards = response.data.applied_boards;
      }
      this.isLoading = false;
    }
  }
};
</script>