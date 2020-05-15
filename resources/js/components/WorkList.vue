<template>
  <div class="c-workList">
    <div class="c-workList__header">
      <h2 class="c-workList__title">{{ listTitle }}</h2>
      <p class="c-workList__info">
        {{ totalNum }}件中
        <span>{{ fromNum }}</span> -
        <span>{{ toNum }}</span>件表示
      </p>
    </div>

    <Loader v-if="isLoading" />

    <template v-if="!isLoading">
      <Work
        v-for="work in works"
        :key="work.id"
        :work="work"
        :with-comment="withComment"
        @bookmark="clickBookmark"
      />
    </template>

    <Pagination
      v-if="!isLoading"
      :current-page="currentPage"
      :last-page="lastPage"
      @move-page="movePage"
    />
  </div>
</template>

<script>
import Work from "./Work";
import Loader from "./Loader";
import Pagination from "./Pagination";

export default {
  components: {
    Work,
    Loader,
    Pagination
  },
  props: {
    listTitle: String,
    withComment: Boolean
  },
  data() {
    return {
      listUrl: null,
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
    this.selectList();
  },
  methods: {
    selectList() {
      switch (this.listTitle) {
        case "依頼した案件":
          this.listUrl = "registered";
          break;
        case "成約済み案件":
          this.listUrl = "closed";
          break;
        case "応募中の案件":
          this.listUrl = "applied";
          break;
        case "気になる案件":
          this.listUrl = "bookmarks";
          break;
        case "コメントした案件":
          this.listUrl = "commented";
          break;
        default:
          this.listUrl = "";
          break;
      }
      this.getWorks();
    },
    async getWorks() {
      this.isLoading = true;
      const response = await axios
        .get(`/api/works/${this.listUrl}?page=${this.pageNum}`)
        .catch();
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
      this.getWorks();
    },
    clickBookmark({ id, bookmarked }) {
      if (bookmarked) {
        this.deleteBookmark(id);
      } else {
        this.addBookmark(id);
      }
    },
    async addBookmark(id) {
      const response = await axios
        .post(`/api/bookmarks/${id}/add`)
        .catch(error => {
          console.log(error);
          if (error.response.status === 401) {
            alert("気になる機能を使うにはログインしてください。");
            // return error.response;
            return false;
          }
        });
      console.log(response);

      // if (response.status === 401) {
      //   return false;
      // }
      if (response.status === 200) {
        this.works = this.works.map(work => {
          if (work.id === response.data) {
            work.bookmarked = true;
          }
          return work;
        });
      }
    },
    async deleteBookmark(id) {
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
        this.getWorks();
      }
    }
  }
};
</script>