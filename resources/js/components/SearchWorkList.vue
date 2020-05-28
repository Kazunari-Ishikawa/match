<template>
  <div class="c-workList">
    <div class="c-workList__header">
      <h2 class="c-workList__title">案件一覧</h2>
      <p class="c-workList__info">
        {{ totalNum }}件中
        <span>{{ fromNum }}</span> -
        <span>{{ toNum }}</span>件表示
      </p>
    </div>

    <!-- 検索ボックス -->
    <SearchComponent :category="category" :type="type" @click-search="searchWorks" />

    <Loader v-if="isLoading" />

    <template v-if="!isLoading">
      <Work v-for="work in works" :key="work.id" :work="work" @bookmark="clickBookmark" />
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
      pageNum: 1,
      currentPage: 0,
      lastPage: 0,
      totalNum: 0,
      fromNum: 0,
      toNum: 0
    };
  },
  created() {
    if (this.category) {
      this.form.category = this.category;
    }
    if (this.type) {
      this.form.type = this.type;
    }
    this.searchWorks();
  },
  methods: {
    // Workを検索する
    async searchWorks(form) {
      this.isLoading = true;
      // フォーム入力がある場合
      if (form) {
        this.pageNum = 1;
        this.form = form;
      }
      const response = await axios
        .post(`/api/works/search?page=${this.pageNum}`, {
          form: this.form
        })
        .catch(error => {
          return error.response;
        });
      if (response.status !== 200) {
        alert("エラーが発生しました。再度やり直してください。");
        return false;
      }
      if (response.status === 200) {
        this.works = response.data.data;
        this.currentPage = response.data.current_page;
        this.lastPage = response.data.last_page;
        this.totalNum = response.data.total;
        this.fromNum = response.data.from;
        this.toNum = response.data.to;
      }
      this.isLoading = false;
    },
    // ページを遷移する
    movePage(page) {
      this.pageNum = page;
      this.searchWorks();
    },
    // Bookmarkへの追加または削除を判定する
    clickBookmark({ id, bookmarked }) {
      if (bookmarked) {
        this.deleteBookmark(id);
      } else {
        this.addBookmark(id);
      }
    },
    // Bookmarkへ追加する
    async addBookmark(id) {
      const response = await axios
        .post(`/api/bookmarks/${id}/add`)
        .catch(error => {
          return error.response;
        });
      if (response.status === 401) {
        alert("気になる機能を使うにはログインしてください。");
        return false;
      }
      if (response.status === 403) {
        alert("自分が登録した案件には気になる機能は使えません。");
        return false;
      }
      if (response.status === 200) {
        this.works = this.works.map(work => {
          if (work.id === response.data) {
            work.bookmarked = true;
          }
          return work;
        });
      }
    },
    // Bookmarkから削除する
    async deleteBookmark(id) {
      const response = await axios
        .post(`/api/bookmarks/${id}/delete`)
        .catch(error => {
          return error.response;
        });
      if (response.status === 401) {
        alert("気になる機能を使うにはログインしてください。");
        return false;
      }
      if (response.status === 200) {
        this.works = this.works.map(work => {
          if (work.id === response.data) {
            work.bookmarked = false;
          }
          return work;
        });
      }
    }
  }
};
</script>