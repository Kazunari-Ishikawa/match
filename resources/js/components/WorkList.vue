<template>
  <div class="c-workList">
    <Loader v-if="isLoading" />
    <Work v-for="work in works" :key="work.id" :work="work" />
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
    isRegistered: Boolean
  },
  data() {
    return {
      works: null,
      isLoading: false
    };
  },
  mounted() {
    this.selectList();
  },
  methods: {
    selectList() {
      if (this.isRegistered) {
        this.getRegisteredWorks();
      } else {
        this.getWorks();
      }
    },
    async getWorks() {
      this.isLoading = true;
      const response = await axios.post("/api/works");
      this.works = response.data;
      this.isLoading = false;
    },
    async getRegisteredWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works/registered");
      this.works = response.data;
      this.isLoading = false;
    }
  }
};
</script>