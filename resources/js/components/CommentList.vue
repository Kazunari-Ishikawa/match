<template>
  <div class="c-commentList">
    <Comment
      v-for="comment in comments"
      :key="comment.id"
      :comment="comment"
      @click-delete="deleteComment"
    />
  </div>
</template>

<script>
import Comment from "./Comment";
export default {
  components: {
    Comment
  },
  props: {
    workId: Number
  },
  data() {
    return {
      comments: null,
      commentId: null
    };
  },
  mounted() {
    this.getComments();
  },
  methods: {
    // Comment一覧を取得する
    async getComments() {
      const response = await axios
        .get(`/api/works/${this.workId}/comments`)
        .catch(error => {
          return error.response;
        });
      if (response.status !== 200) {
        alert("エラーが発生しました。再度やり直してください。");
        return false;
      }
      if (response.status === 200) {
        this.comments = response.data;
      }
    },
    // Commentを削除する
    async deleteComment(id) {
      if (confirm("削除します。よろしいですか？")) {
        const response = await axios
          .post(`/api/comments/${id}/delete`)
          .catch(error => {
            return error.response;
          });
        if (response.status === 401) {
          alert("あなたのコメントではないので削除できません。");
          return false;
        }
        if (response.status === 200) {
          alert("削除しました。");
          window.location.href = `/works/${this.workId}`;
        }
      }
    }
  }
};
</script>