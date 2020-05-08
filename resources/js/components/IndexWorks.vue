<template>
  <div class="l-container l-container--withSide">
    <!-- サイドバー -->
    <section class="l-sidebar">
      <form action class="c-form--side" @submit.prevent="searchWorks">
        <div class="c-form__group">
          <p class="c-form__label">案件種別</p>
          <label for="type1" class="c-form__label--radio">
            <input
              type="radio"
              name="type"
              id="type1"
              value="1"
              class="c-form__radio"
              v-model="form.type"
            />単発
          </label>
          <label for="type2" class="c-form__label--radio">
            <input
              type="radio"
              name="type"
              id="type2"
              value="2"
              class="c-form__radio"
              v-model="form.type"
            />レベニューシェア
          </label>
        </div>
        <div class="c-form__group">
          <label for="category" class="c-form__label">カテゴリ</label>
          <select name="category" id="category" class="c-form__select" v-model="form.category">
            <option value="0">指定しない</option>
            <option value="1">ホームページ制作</option>
            <option value="2">WEBシステム開発</option>
            <option value="3">業務システム開発</option>
            <option value="4">アプリ開発</option>
            <option value="5">ECサイト構築</option>
            <option value="6">サーバー・クラウド</option>
            <option value="7">WEBマーケティング</option>
          </select>
        </div>
        <div class="c-form__group">
          <p class="c-form__label">金額</p>
          <select
            name="lower"
            id="lower"
            class="c-form__select c-form__select--price"
            v-model="form.minPrice"
          >
            <option value="0">指定しない</option>
            <option value="1">1,000</option>
            <option value="2">3,000</option>
            <option value="3">5,000</option>
            <option value="4">10,000</option>
            <option value="5">50,000</option>
            <option value="6">100,000</option>
            <option value="7">500,000</option>
            <option value="8">1,000,000</option>
          </select>
          <p class="c-form__label--back">円以上〜</p>
          <select
            name="upper"
            id="uppper"
            class="c-form__select c-form__select--price"
            v-model="form.maxPrice"
          >
            <option value="0">指定しない</option>
            <option value="1">1,000</option>
            <option value="2">3,000</option>
            <option value="3">5,000</option>
            <option value="4">10,000</option>
            <option value="5">50,000</option>
            <option value="6">100,000</option>
            <option value="7">500,000</option>
            <option value="8">1,000,000</option>
          </select>
          <p class="c-form__label--back">円以下</p>
        </div>
        <input type="submit" class="c-btn c-btn--full" value="絞り込み" />
      </form>
    </section>

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
    </section>
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
  data() {
    return {
      form: {
        type: 0,
        category: 0,
        minPrice: 0,
        maxPrice: 0
      },
      works: null,
      isLoading: false
    };
  },
  created() {
    this.getWorks();
  },
  methods: {
    async getWorks() {
      this.isLoading = true;
      const response = await axios.get("/api/works");
      console.log(response);
      this.works = response.data;
      this.isLoading = false;
    },
    async searchWorks() {
      console.log(this.form);
      const response = await axios.post("/api/works/search", {
        form: this.form
      });
      console.log(response);
    }
  }
};
</script>