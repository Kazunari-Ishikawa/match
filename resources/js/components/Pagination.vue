<template>
  <ul class="c-pagination">
    <li v-if="!isFirst" class="c-pagination__item">
      <a href class="c-pagination__link" @click.prevent="movePage(currentPage-1)">前へ</a>
    </li>
    <li
      v-for="(page, index) in pages"
      :key="index"
      class="c-pagination__item"
      :class="{'isActive': page === currentPage}"
      @click.prevent="movePage(page)"
    >
      <a href class="c-pagination__link">{{ page }}</a>
    </li>
    <li v-if="!isLast" class="c-pagination__item">
      <a href class="c-pagination__link" @click.prevent="movePage(currentPage+1)">次へ</a>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    currentPage: Number,
    lastPage: Number
  },
  computed: {
    // 最初のページであるか判定
    isFirst() {
      return this.currentPage === 1;
    },
    // 最後のページであるか判定
    isLast() {
      return this.currentPage === this.lastPage;
    },
    // ページ数のオブジェクトを生成
    pages() {
      let pages = [];
      for (let i = 1; i <= this.lastPage; i++) {
        // pages.id = i;
        // pages.num = i;
        pages.push(i);
      }
      return pages;
    }
  },
  methods: {
    // 現在ページ以外のリンクの場合、move-pageを通知する
    movePage(page) {
      if (page !== this.currentPage) {
        this.$emit("move-page", page);
      }
    }
  }
};
</script>