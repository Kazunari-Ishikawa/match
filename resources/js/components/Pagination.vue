<template>
  <ul class="c-pagination">
    <li v-if="!isFirst" class="c-pagination__item">
      <a href class="c-pagination__link" @click.prevent="movePage(data.current_page-1)">前へ</a>
    </li>
    <li
      v-for="page in pages"
      :key="page.id"
      class="c-pagination__item"
      :class="{'isActive': page === data.current_page}"
      @click.prevent="movePage(page)"
    >
      <a href class="c-pagination__link">{{ page }}</a>
    </li>
    <li v-if="!isLast" class="c-pagination__item">
      <a href class="c-pagination__link" @click.prevent="movePage(data.current_page+1)">次へ</a>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    data: Object
  },
  computed: {
    // 最初のページであるか判定
    isFirst() {
      return this.data.prev_page_url !== null;
    },
    // 最後のページであるか判定
    isLast() {
      return this.data.next_page_url !== null;
    },
    // ページ数のオブジェクトを生成
    pages() {
      let pages = [];
      for (let i = 1; i <= this.data.last_page; i++) {
        pages.id = i;
        pages.num = i;
      }
      return pages;
    }
  },
  methods: {
    // 現在ページ以外のリンクの場合、move-pageを通知する
    movePage(page) {
      if (page !== this.data.current_page) {
        this.$emit("move-page", page);
      }
    }
  }
};
</script>