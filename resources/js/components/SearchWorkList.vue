<template>
  <div class="l-container l-container--withSide">
    <!-- 検索バー -->
    <SearchComponent @click-search="searchWorks" />

    <!-- メインコンテンツ -->
    <section class="l-container__body--withSide">
      <div class="c-workList__header">
        <h2 class="c-workList__title">案件一覧</h2>
        <p class="c-workList__info">
          {{ totalNum }}件中
          <span>{{fromNum}}</span> -
          <span>{{toNum}}</span>件表示
        </p>
      </div>

      <Loader v-if="isLoading" />

      <div v-if="!isLoading" class="c-workList">
        <Work v-for="work in works" :key="work.id" :work="work" @bookmarks="clickBookmarks" />
      </div>
      <Pagination
        v-if="!isLoading"
        :current-page="currentPage"
        :last-page="lastPage"
        @move-page="movePage"
      />
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
  props: {
    category: Number,
    type: Number
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
      lastPage: 0,
      totalNum: 0,
      fromNum: 0,
      toNum: 0
    };
  },
  created() {
    this.searchWorks();
  },
  methods: {
    async searchWorks(form) {
      this.isLoading = true;
      console.log(form);
      if (this.category) {
        console.log("category set.");
        this.form.category = this.category;
      }
      if (this.type) {
        console.log("type set.");
        this.form.type = this.type;
      }
      if (form) {
        console.log("form OK.");
        this.form = form;
      }
      const response = await axios.post(
        `/api/works/search?page=${this.pageNum}`,
        {
          form: this.form
        }
      );
      console.log(response);
      this.works = response.data.data;
      this.currentPage = response.data.current_page;
      this.lastPage = response.data.last_page;
      this.totalNum = response.data.total;
      this.fromNum = response.data.from;
      this.toNum = response.data.to;
      this.isLoading = false;
    },
    movePage(page) {
      this.pageNum = page;
      this.searchWorks();
    },
    clickBookmarks({ id, bookmarked }) {
      if (bookmarked) {
        this.deleteBookmarks(id);
      } else {
        this.addBookmarks(id);
      }
    },
    async addBookmarks(id) {
      const response = await axios.post(`/api/bookmarks/${id}/add`).catch();
      console.log(response);
      if (response.status === 200) {
        this.works = this.works.map(work => {
          if (work.id === response.data) {
            work.bookmarked = true;
          }
          return work;
        });
      }
    },
    async deleteBookmarks(id) {
      const response = await axios.post(`/api/bookmarks/${id}/delete`).catch();
      console.log(response);
      if (response.status === 200) {
        this.works = this.works.map(work => {
          if (work.id === response.data) {
            work.bookmarked = false;
          }
          return work;
        });
      }
      if (location.pathname === "/works/bookmarks") {
        this.getBookmarksWorks();
      }
    }
  }
};
</script>