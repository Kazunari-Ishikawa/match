<template>
  <div class="p-workDetail">
    <h2 class="p-workDetail__title">{{ work.title }}</h2>
    <div class="p-workDetail__body">
      <table class="p-workDetail__table">
        <tr class="p-workDetail__row">
          <th class="p-workDetail__head">登録日</th>
          <td class="p-workDetail__data">{{ work.created_at }}</td>
        </tr>
        <tr class="p-workDetail__row">
          <th class="p-workDetail__head">依頼者</th>
          <td class="p-workDetail__data">
            <a :href="`/users/${work.user_id}`">{{ work.user.name}}</a>
          </td>
        </tr>
        <tr class="p-workDetail__row">
          <th class="p-workDetail__head">カテゴリ</th>
          <td class="p-workDetail__data">{{ work.category.name }}</td>
        </tr>
        <tr class="p-workDetail__row">
          <th class="p-workDetail__head">案件種別</th>
          <td class="p-workDetail__data">{{ work.type }}</td>
        </tr>
        <tr class="p-workDetail__row">
          <th class="p-workDetail__head">金額</th>
          <template v-if="work.type === 'レベニューシェア'">
            <td class="p-workDetail__data">依頼者との相談</td>
          </template>
          <template v-else>
            <td class="p-workDetail__data">{{ work.min_price }}〜{{ work.max_price }}円</td>
          </template>
        </tr>
        <tr class="p-workDetail__row">
          <th class="p-workDetail__head">応募者数</th>
          <td class="p-workDetail__data">{{ work.counts }}人が応募しています</td>
        </tr>
      </table>
      <div class="p-workDetail__action">
        <div class="c-btn__container">
          <div class="c-btn c-btn--reverse c-btn--sm">
            <i class="far fa-bookmark"></i>気になる
          </div>
        </div>
        <div class="c-btn__container">
          <div class="c-btn c-btn--sm c-btn--reverse c-btn--twitter">
            <i class="fab fa-twitter"></i>でシェア
          </div>
        </div>
      </div>
    </div>
    <p class="p-workDetail__content">{{ work.content }}</p>
  </div>
</template>

<script>
export default {
  props: {
    work: Object
  }
};
</script>