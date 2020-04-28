<template>
  <div class="c-comment__list">
    <Comment v-for="comment in comments" :key="comment.id" :comment="comment" />

    <!-- コメント入力フォーム -->
    <form action class="c-form--comment">
      <div class="c-form__group">
        <textarea class="c-form__textarea"></textarea>
      </div>
      <div class="c-btn__container">
        <input class="c-btn c-btn--em" value="コメントする" />
      </div>
    </form>
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
      comments: null
    };
  },
  mounted() {
    this.getComments();
  },
  methods: {
    async getComments() {
      console.log("OK");
      // const response = await axios.get(`/api/works/{this.id}/comments`);
      // this.comments = response.data;
      // console.log(this.comments);
    }
  }
};
</script>