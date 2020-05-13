<template>
  <div class="c-comment__list">
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
    async getComments() {
      const response = await axios.get(`/api/works/${this.workId}/comments`);
      this.comments = response.data;
      console.log(this.comments);
    },
    async deleteComment(id) {
      if (confirm("削除します。よろしいですか？")) {
        const response = await axios
          .post(`/api/comments/${id}/delete`)
          .catch(error => {
            console.log(error);
            console.log("ERROR!");
            alert("あなたのコメントではないので削除できません。");
            return error.response;
          });

        console.log(response);
        if (response.status === 200) {
          alert("削除しました。");
          this.getComments();
        }
      }
    }
  }
};
</script>