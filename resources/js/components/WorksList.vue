<template>
  <div class="c-workList">
    <Work v-for="work in works" :key="work.id" :work="work" />
  </div>
</template>

<script>
import Work from "./Work";
export default {
  components: {
    Work
  },
  props: {
    isRegistered: Boolean
  },
  data() {
    return {
      works: null
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
      const response = await axios.post("/api/works");
      this.works = response.data;
    },
    async getRegisteredWorks() {
      const response = await axios.get("/api/works/registered");
      console.log(response);
      this.works = response.data;
    }
  }
};
</script>