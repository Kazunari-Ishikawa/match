<template>
  <div class="c-workList">
    <Loader v-if="isLoading" />
    <Work
      v-for="work in works"
      :key="work.id"
      :work="work"
      :with-comment="withComment"
      @bookmarks="clickBookmarks"
    />
  </div>
</template>

<script>
import Work from "./Work";
import Loader from "./Loader";

export default {
  components: {
    Work,
    Loader
  },
  props: {
    isRegistered: Boolean,
    isApplied: Boolean,
    withComment: Boolean,
    isClosed: Boolean,
    isBookmarked: Boolean,
    isSearched: Boolean,
    searchForm: Object
  },
  data() {
    return {
      works: null,
      isLoading: false
    };
  },
  created() {
    this.selectList();
  },
  beforeUpdate() {
    console.log("before update.");
    if (this.isSearched) {
      console.log(this.searchForm);
    }
  },
  methods: {
    selectList() {
      if (this.isClosed) {
        this.getClosedWorks();
      } else if (this.isBookmarked) {
        this.getBookmarksWorks();
      } else if (this.withComment) {
        this.getCommentedWorks();
      } else if (this.isApplied) {
        this.getAppliedWorks();
      } else if (this.isRegistered) {
        this.getRegisteredWorks();
      } else {
        this.getWorks();
      }
    },
    async getWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works");
      console.log(response);
      this.works = response.data;
      this.isLoading = false;
    },
    async getRegisteredWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works/registered");
      console.log(response);
      this.works = response.data.works;

      const len = response.data.works.length;
      for (let i = 0; i < len; i++) {
        this.works[i].apply = response.data.counts[i];
        this.works[i].isBookmarked = response.data.is_bookmarked[i];
      }
      this.isLoading = false;
    },
    async getCommentedWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works/commented");
      console.log(response);
      this.works = response.data.works;

      const len = response.data.works.length;
      for (let i = 0; i < len; i++) {
        this.works[i].apply = response.data.counts[i];
        this.works[i].isBookmarked = response.data.is_bookmarked[i];
      }
      this.isLoading = false;
    },
    async getAppliedWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works/applied");
      console.log(response);
      this.works = response.data.works;

      const len = response.data.works.length;
      for (let i = 0; i < len; i++) {
        this.works[i].apply = response.data.counts[i];
        this.works[i].isBookmarked = response.data.is_bookmarked[i];
      }
      this.isLoading = false;
    },
    async getClosedWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works/closed");
      console.log(response);
      this.works = response.data.works;

      const len = response.data.works.length;
      for (let i = 0; i < len; i++) {
        this.works[i].apply = response.data.counts[i];
        this.works[i].isBookmarked = response.data.is_bookmarked[i];
      }
      this.isLoading = false;
    },
    async getBookmarksWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works/bookmarks");
      console.log(response);
      this.works = response.data;

      this.isLoading = false;
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
      console.log(location.pathname);
      if (location.pathname === "/works/bookmarks") {
        this.getBookmarksWorks();
      }
    }
  }
};
</script>