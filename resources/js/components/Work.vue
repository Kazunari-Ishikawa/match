<template>
  <div class="c-work">
    <div class="c-work__main">
      <div class="c-work__left">
        <a :href="`/works/${work.id}`" class="c-work__title">
          <h3>{{work.title}}</h3>
        </a>
        <div class="c-work__category">{{work.category.name}}</div>
      </div>
      <div class="c-work__center">
        <p class="c-work__type">{{work.type}}</p>
        <p class="c-work__price">
          <template v-if="work.type === 'レベニューシェア'">金額は依頼者との相談</template>
          <template v-else>
            <span class="c-work__price--min">{{work.min_price}}</span>~
            <span class="c-work__price--max">{{work.max_price}}</span>円
          </template>
        </p>
        <p class="c-work__count">
          <span>{{work.counts}}</span>人が応募中です
        </p>
        <a :href="`/works/${work.id}`" class="c-work__link">詳細をみる</a>
      </div>
      <div class="c-work__right">
        <div class="c-btn__container">
          <div
            class="c-flatBtn c-flatBtn--bookmark"
            :class="{ 'c-flatBtn--isBookmarked': work.bookmarked }"
            @click="bookmark"
          >
            <i class="far fa-bookmark fa-lg fa-fw u-icon"></i>気になる
          </div>
        </div>
        <div class="c-btn__container">
          <a
            class="twitter-share-button c-flatBtn c-flatBtn--twitter"
            :href="`https://twitter.com/intent/tweet?url=https://matchwork.herokuapp.com/works/${this.work.id}`"
          >
            <i class="fab fa-twitter fa-lg fa-fw u-icon"></i>でシェア
          </a>
        </div>
      </div>
    </div>
    <div class="c-work__sub">
      <a :href="`/users/${work.user_id}`" class="c-work__name">依頼者:{{work.user.name}}</a>
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
    // 最新Commentを取得する
    async getLatestComment() {
      const response = await axios
        .get(`/api/works/${this.work.id}/comments/latest`)
        .catch(error => {
          return error.response;
        });
      if (response.status !== 200) {
        alert("エラーが発生しました。再度やり直してください。");
        return false;
      }
      if (response.status === 200) {
        this.comment = response.data;
        this.getCommentFinished = true;
      }
    },
    // Bookmarkが押されたことを通知する
    async bookmark() {
      this.$emit("bookmark", {
        id: this.work.id,
        bookmarked: this.work.bookmarked
      });
    }
  }
};
</script>
