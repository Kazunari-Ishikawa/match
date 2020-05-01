<template>
  <div class="c-workList">
    <Work v-for="work in works" :key="work.id" :work="work" :with-comment="withComment" />
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
    withComment: Boolean
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
  methods: {
    selectList() {
      if (this.withComment) {
        this.getCommentedWorks();
      } else if (this.isRegistered) {
        this.getRegisteredWorks();
      } else {
        this.getWorks();
      }
    },
    async getWorks() {
      this.isLoading = true;
      const response = await axios.post("/api/works");
      console.log(response);
      this.works = response.data;
      this.isLoading = false;
    },
    async getRegisteredWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works/registered");
      console.log(response);
      this.works = response.data;
    },
    async getCommentedWorks() {
      const response = await axios.get("/api/works/commented");
      console.log(response);
      this.works = response.data;
      this.isLoading = false;
    }
  }
};
</script>