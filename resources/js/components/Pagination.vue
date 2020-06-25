<template>
  <ul class="c-pagination">
    <li v-if="!isFirst" class="c-pagination__item" @click="movePage(currentPage -1)">前へ</li>
    <li
      v-for="page in frontPageRnage"
      :key="page"
      @click="movePage(page)"
      class="c-pagination__item"
      :class="{'isActive': isCurrent(page)}"
    >{{ page }}</li>
    <li v-show="frontDot" class="c-pagination__item disabled">...</li>
    <li
      v-for="page in middlePageRange"
      :key="page"
      @click="movePage(page)"
      class="c-pagination__item"
      :class="{'isActive': isCurrent(page)}"
    >{{ page }}</li>
    <li v-show="frontDot" class="c-pagination__item disabled">...</li>
    <li
      v-for="page in endPageRange"
      :key="page"
      @click="movePage(page)"
      class="c-pagination__item"
      :class="{'isActive': isCurrent(page)}"
    >{{ page }}</li>
    <li v-if="!isLast" class="c-pagination__item" @click="movePage(currentPage+1)">次へ</li>
  </ul>
</template>

<script>
export default {
  props: {
    currentPage: Number,
    lastPage: Number
  },
  data() {
    return {
      range: 3,
      frontDot: false,
      endDot: false,
      size: 9
    };
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
    frontPageRnage() {
      if (!this.sizeCheck) {
        return this.calPage(1, this.lastPage);
      }
      return this.calPage(1, 2);
    },
    middlePageRange() {
      if (!this.sizeCheck) {
        return [];
      }
      let start = "";
      let end = "";
      if (this.currentPage <= this.range) {
        start = 3;
        end = this.range + 2;
        this.frontDot = false;
        this.endDot = true;
      } else if (this.currentPage > this.lastPage - this.range) {
        start = this.lastPage - this.range - 1;
        end = this.lastPage - 2;
        this.frontDot = true;
        this.endDot = false;
      } else {
        start = this.currentPage - Math.floor(this.range / 2);
        end = this.currentPage + Math.floor(this.range / 2);
        this.frontDot = true;
        this.endDot = true;
      }
      return this.calPage(start, end);
    },
    endPageRange() {
      if (!this.sizeCheck) {
        return [];
      }
      return this.calPage(this.lastPage - 1, this.lastPage);
    },
    sizeCheck() {
      if (this.lastPage < this.size) {
        return false;
      }
      return true;
    }
  },
  methods: {
    // ページ配列を作成する
    calPage(start, end) {
      const pages = [];
      for (let i = start; i <= end; i++) {
        pages.push(i);
      }
      return pages;
    },
    // 現在ページであるか判定する
    isCurrent(page) {
      return page === this.currentPage;
    },
    // 現在ページ以外のリンクの場合、move-pageを通知する
    movePage(page) {
      if (page !== this.currentPage) {
        this.$emit("move-page", page);
      }
    }
  }
};
</script>