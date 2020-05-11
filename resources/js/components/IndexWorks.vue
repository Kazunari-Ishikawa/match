<template>
  <div class="l-container l-container--withSide">
    <!-- サイドバー -->
    <SearchComponent @click-search="searchWorks" />

    <!-- メインコンテンツ -->
    <section class="l-container__body--withSide">
      <div class="c-workList__header">
        <h2 class="c-workList__title">案件一覧</h2>
        <p class="c-workList__info">
          20件中
          <span>1</span> -
          <span>10</span>件表示
        </p>
      </div>

      <div class="c-workList">
        <Loader v-if="isLoading" />
        <Work v-for="work in works" :key="work.id" :work="work" />
      </div>
      <Pagination :current-page="currentPage" :last-page="lastPage" @move-page="movePage" />
    </section>
  </div>
</template>

<script>
import SearchComponent from "./SearchComponent";
import Work from "./Work";
import Loader from "./Loader";
import Pagination from "./Pagination";

export default {
  components: {
    SearchComponent,
    Work,
    Loader,
    Pagination
  },
  data() {
    return {
      form: {
        type: 0,
        category: 0,
        minPrice: 0,
        maxPrice: 0
      },
      works: null,
      isLoading: false,
      pageNum: 1,
      currentPage: 0,
      lastPage: 0
    };
  },
  created() {
    this.getWorks();
  },
  methods: {
    async getWorks() {
      this.isLoading = true;
      const response = await axios.get(`/api/works?page=${this.pageNum}`);
      console.log(response);
      this.works = response.data.data;
      this.currentPage = response.data.current_page;
      this.lastPage = response.data.last_page;
      this.isLoading = false;
    },
    async searchWorks(form) {
      console.log(form);
      const response = await axios.post("/api/works/search", {
        form
      });
      console.log(response);
    },
    movePage(page) {
      this.pageNum = page;
      this.getWorks();
    }
  }
};
</script>