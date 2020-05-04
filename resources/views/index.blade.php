@extends('layouts.app')

@section('content')

<section id="hero" class="l-hero">
  <div class="p-hero">
    <p class="p-hero__text">もっと気軽にやり取りしたい…</p>
    <p class="p-hero__text">大手の案件サイトは分かりにくい…</p>
    <p class="p-hero__text p-hero__text--em">matchなら<span>3</span>ステップで<br class="p-hero__br">解決します！</p>
    <a class="c-btn c-btn--hero" href="{{ route('works.index') }}">案件を探す</a>
  </div>
</section>

<section class="l-band">
  <div class="p-band">
    <p class="p-band__text">登録はかんたん無料で可能！</p>
    <a class="c-btn c-btn--band" href="{{ route('register') }}">登録する</a>
  </div>
</section>

<!-- 説明 -->
<section id="description" class="l-container">
  <div class="l-container__header">
    <h2 class="l-container__title">matchの３ステップ</h2>
  </div>
  <div class="l-container__body">
    <div class="p-desc__container">
      <div class="p-desc">
        <img src="" alt="" class="p-desc__img">
        <div class="p-desc__body">
          <h3 class="p-desc__title">STEP.1</h3>
          <h4 class="p-desc__subtitle">まずは会員登録から</h4>
          <p class="p-desc__text">matchは無料で会員登録できます。メールアドレスのみの30秒かんたん登録！</p>
        </div>
      </div>
      <div class="p-desc">
        <img src="" alt="" class="p-desc__img">
        <div class="p-desc__body">
          <h3 class="p-desc__title">STEP.2</h3>
          <h4 class="p-desc__subtitle">依頼したいなら</h4>
          <p class="p-desc__text">依頼内容を記入して案件を登録。入力項目も少なく、お手軽に依頼できます。</p>
          <h4 class="p-desc__subtitle">応募したいなら</h4>
          <p class="p-desc__text">matchには単発案件、レベニューシェア案件が多数登録されています。興味のある案件に応募してみましょう。</p>
        </div>
      </div>
      <div class="p-desc">
        <img src="" alt="" class="p-desc__img">
        <div class="p-desc__body">
          <h3 class="p-desc__title">STEP.3</h3>
          <h4 class="p-desc__subtitle">依頼に応募があると</h4>
          <p class="p-desc__text">応募があると登録アドレスに通知がきます。メッセージ機能で詳細を詰めて依頼完了！ </p>
          <h4 class="p-desc__subtitle">案件に応募すると</h4>
          <p class="p-desc__text">メッセージ機能で依頼者と直接やり取りができます。詳細を詰めれば成約完了。
            早速案件に取り掛かりましょう！</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="l-band">
  <div class="p-band">
    <p class="p-band__text">まずは無料登録から！</p>
    <a class="c-btn c-btn--band" href="{{ route('register') }}">登録する</a>
  </div>
</section>

<section id="cardList" class="l-container">
  <div class="l-container__body">
    <div class="c-cardList">
      <div class="c-cardList__header">
        <h3 class="c-cardList__title">単発案件から探す</h3>
        <p class="c-cardList__link"><a href="">もっと見る&gt;</a></p>
      </div>
      <div class="c-cardList__body">
        <div class="c-card">
          <h4 class="c-card__title">タイトルタイイトルタイトルタイトルタイイトルタイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">ホームページ制作</p>
            <p class="c-card__price"><span class="c_card__price--lower">10,000</span> ~ <span class="c-card__price--upper">50,000</span>円</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>
        <div class="c-card">
          <h4 class="c-card__title">タイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">ホームページ制作</p>
            <p class="c-card__price"><span class="c_card__price--lower">10,000</span> ~ <span class="c-card__price--upper">50,000</span>円</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>
        <div class="c-card">
          <h4 class="c-card__title">タイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">ホームページ制作</p>
            <p class="c-card__price"><span class="c_card__price--lower">10,000</span> ~ <span class="c-card__price--upper">50,000</span>円</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>
        <div class="c-card">
          <h4 class="c-card__title">タイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">ホームページ制作</p>
            <p class="c-card__price"><span class="c_card__price--lower">10,000</span> ~ <span class="c-card__price--upper">50,000</span>円</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>
      </div>
    </div>

    <div class="c-cardList">
      <div class="c-cardList__header">
        <h3 class="c-cardList__title">レベニューシェア案件から探す</h3>
        <p class="c-cardList__link"><a href="">もっと見る&gt;</a></p>
      </div>
      <div class="c-cardList__body">
        <div class="c-card">
          <h4 class="c-card__title">タイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">ウェブシステム開発</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>
        <div class="c-card">
          <h4 class="c-card__title">タイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">業務システム開発</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>
        <div class="c-card">
          <h4 class="c-card__title">タイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">ウェブシステム開発</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>
        <div class="c-card">
          <h4 class="c-card__title">タイトル</h4>
          <div class="c-card__body">
            <p class="c-card__category">ウェブシステム開発</p>
            <p class="c-card__text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

@endsection
