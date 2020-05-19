<template>
  <section class="p-searchbox">
    <p class="c-accordion__btn c-accordion__btn--search" @click="openSearch">絞り込み条件</p>
    <SlideUpDown :active="active">
      <form class="p-searchbox__form" @submit.prevent="clickSearch">
        <div class="p-searchbox__group">
          <div class="p-searchbox__item">
            <p class="c-form__label">案件種別</p>
            <label for="type1" class="c-form__label--radio">
              <input
                type="radio"
                name="type"
                id="type1"
                value="1"
                class="c-form__radio"
                v-model="form.type"
              />単発案件
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
            <label for="type0" class="c-form__label--radio">
              <input
                type="radio"
                name="type"
                id="type0"
                value="0"
                class="c-form__radio"
                v-model="form.type"
              />指定しない
            </label>
          </div>
          <div class="p-searchbox__item">
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
        </div>

        <div class="p-searchbox__item--price">
          <p class="c-form__label">金額</p>
          <div class="c-form__group--price">
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
            <p class="c-form__select--price">円以上〜</p>
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
            <p class="c-form__select--price">円以下</p>
          </div>
        </div>

        <input type="submit" class="c-btn c-btn--full" value="絞り込み" />
      </form>
    </SlideUpDown>
  </section>
</template>

<script>
import SlideUpDown from "vue-slide-up-down";

export default {
  components: {
    SlideUpDown
  },
  props: {
    category: Number,
    type: Number
  },
  data() {
    return {
      active: false,
      form: {
        type: this.type,
        category: this.category,
        minPrice: 0,
        maxPrice: 0
      },
      message: ""
    };
  },
  methods: {
    // 検索フォームを開閉する
    openSearch() {
      this.active = !this.active;
    },
    // 検索を通知する
    clickSearch() {
      if (this.validSearch()) {
        this.$emit("click-search", this.form);
      } else {
        alert(this.message);
        this.message = "";
      }
    },
    // 検索フォームのバリデーションを行う
    validSearch() {
      if (this.form.type < 0 || 2 < this.form.type) {
        this.message = "不正な値です。やり直してください。";
        return false;
      } else if (this.form.category < 0 || 7 < this.form.category) {
        this.message = "不正な値です。やり直してください。";
        return false;
      } else if (
        this.form.minPrice > this.form.maxPrice &&
        this.form.maxPrice != 0
      ) {
        this.message = "最大金額は最小金額よりも大きくしてください。";
        return false;
      } else {
        return true;
      }
    }
  }
};
</script>
