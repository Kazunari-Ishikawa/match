<template>
  <div class="c-work">
    <div class="c-work__header">
      <h3 class="c-work__title">{{ work.title }}</h3>
      <p class="c-work__date">登録日:{{ work.created_at }}</p>
    </div>
    <div class="c-work__body">
      <div class="c-work__info">
        <p class="c-work__type">{{ work.type }}</p>
        <p class="c-work__category">{{ work.category }}</p>
        <p class="c-work__price">
          <span class="c-work__price--lower">{{ work.min_price }}</span> ~
          <span class="c-work__price--upper">{{ work.max_price }}</span>円
        </p>
      </div>
      <p class="c-work__content">{{work.content}}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    work: Object
  }
};
</script>
