<template>
  <div class="p-workDetail">
    <h2 class="p-workDetail__title">{{ work.title }}</h2>
    <div class="p-workDetail__meta">
      <a :href="`/users/${work.user.id}`" class="p-workDetail__name">{{ work.user.name}}</a>
      <div class="p-workDetail__date">登録日:{{ work.created_at }}</div>
    </div>

    <div class="p-workDetail__body">
      <table class="p-workDetail__table">
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
          <template v-if="work.type == 'レベニューシェア'">
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
        <div class="p-workDetail__tag--container">
          <div class="p-workDetail__tag p-workDetail__tag--like">気になる!</div>
          <div class="p-workDetail__tag p-workDetail__tag--twitter">シェア!</div>
        </div>

        <div class="c-btn__container">
          @if ($is_registered)
          <a href="{{ route('works.edit', $work->id) }}" class="c-btn">編集する</a>
          @elseif($is_applied)
          <form action="{{ route('works.cancel', $work->id) }}" method="POST">
            @csrf
            <input type="submit" class="c-btn c-btn--em" id="js-cancel-apply" value="応募を取り消す" />
          </form>@else
          <form action="{{ route('works.apply', $work->id) }}" method="POST">
            @csrf
            <input type="submit" class="c-btn c-btn--em" value="応募する" />
          </form>@endif
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