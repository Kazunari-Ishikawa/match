<template>
  <div class="c-work">
    <div class="c-work__main">
      <div class="c-work__left">
        <a :href="`/works/${work.id}`" class="c-work__title">
          <h3>{{work.title}}</h3>
        </a>
        <a class="c-work__category">{{work.category_id}}</a>
      </div>
      <div class="c-work__center">
        <p class="c-work__type">{{work.type}}</p>
        <p class="c-work__price">
          <span class="c-work__price--min">{{work.min_price}}</span>~
          <span class="c-work__price--max">{{work.max_price}}</span>円
        </p>
        <p class="c-work__count">
          <span>3</span>人が応募中です
        </p>
      </div>
      <div class="c-work__right">
        <div class="c-work__right--inner">
          <a :href="`/works/${work.id}`" class="c-work__tag c-work__tag--more">くわしく!</a>
          <a class="c-work__tag c-work__tag--like">気になる!</a>
          <a class="c-work__tag c-work__tag--twitter">シェア</a>
        </div>
      </div>
    </div>
    <div class="c-work__sub">
      <p class="c-work__name">依頼者:{{work.user.name}}</p>
      <p class="c-work__date">登録日:{{work.created_at}}</p>
    </div>

    <template v-if="getCommentFinished">
      <p class="c-work__comment">最新コメント</p>

      <Comment :comment="comment" />
    </template>
  </div>
</template>

<script>
import Comment from "./Comment";

export default {
  components: {
    Comment
  },
  props: {
    work: Object,
    withComment: Boolean
  },
  data() {
    return {
      comment: null,
      getCommentFinished: false
    };
  },
  created() {
    if (this.withComment) {
      this.getLatestComment();
    }
  },
  methods: {
    async getLatestComment() {
      const response = await axios.get(
        `/api/works/${this.work.id}/comments/latest`
      );
      console.log(response);
      this.comment = response.data;
      this.getCommentFinished = true;
    }
  }
};
</script>
