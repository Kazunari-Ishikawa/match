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
  data() {
    return {
      works: null
    };
  },
  mounted() {
    this.getWorks();
  },
  methods: {
    async getWorks() {
      const response = await axios.post("/api/works");
      this.works = response.data;
    }
  }
};
</script>