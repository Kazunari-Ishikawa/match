<template>
  <div class="c-comment__list">
    <Comment v-for="comment in comments" :key="comment.id" :comment="comment" />
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
      const response = await axios.get(`/api/works/${this.workId}/comments`);
      this.comments = response.data;
      console.log(this.comments);
    }
  }
};
</script>