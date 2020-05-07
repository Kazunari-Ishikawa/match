@extends('layouts.app')

@section('content')

<section id="hero" class="l-hero">
  <div class="p-hero">
    <p class="p-hero__text">IT系の仕事、大手のクラウドソーシングは分かりにくい…</p>
    <p class="p-hero__text"></p>
    <p class="p-hero__text p-hero__text--em">matchなら<span>3</span>ステップで<br class="p-hero__br">繋ぎます！</p>
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
    <p class="p-band__text">登録はかんたん無料で可能！</p>
    <a class="c-btn c-btn--band" href="{{ route('register') }}">登録する</a>
  </div>
</section>

<section id="cardList" class="l-container">
  <div class="l-container__header">
    <h2 class="l-container__title">案件を探す</h2>
  </div>

  <div class="l-container__body">

    <div id="typeList" class="c-cardList">
      <div class="c-cardList__header">
        <h3 class="c-cardList__title">種類から探す</h3>
      </div>

      <div class="c-cardList__body c-cardList__body--lg">
        <div class="c-card c-card--lg">
          <div class="c-card__body">
            <h4 class="c-card__title c-card__title--lg">単発案件</h4>
            <p class="c-card__text">単発案件とは、「仕事一件当たり◯◯円」という形で報酬が支払われます。</p>
            <p class="c-card__text">要求スキルが易しいものから高レベルのものまで、<span>豊富な案件から選ぶ</span>ことができます。</p>
          </div>
        </div>
        <div class="c-card c-card--lg">
          <div class="c-card__body">
            <h4 class="c-card__title c-card__title--lg">レベニューシェア</h4>
            <p class="c-card__text">レベニューシェアとは、開発したサービスの収益をあらかじめ決めておいた配分で分け合う方式です。</p>
            <p class="c-card__text">依頼者にとっては<span>初期費用を抑える</span>ことができ、請負者にとっては<span>継続的に収益を得る</span>ことができます。</p>
          </div>
        </div>
      </div>

    </div>

    <div id="categoryList" class="c-cardList">
      <div class="c-cardList__header">
        <h3 class="c-cardList__title">カテゴリから探す</h3>
      </div>

      <div class="c-cardList__body">
        <div class="c-card">
          <div class="c-card__body">
            <img src="{{asset('/images/category_1.png')}}" alt="カテゴリ1" class="c-card__img">
            <h4 class="c-card__title">ホームページ制作</h4>
          </div>
        </div>
        <div class="c-card">
          <div class="c-card__body">
            <img src="{{asset('/images/category_2.png')}}" alt="カテゴリ2" class="c-card__img">
            <h4 class="c-card__title">WEBシステム開発</h4>
          </div>
        </div>
        <div class="c-card">
          <div class="c-card__body">
            <img src="{{asset('/images/category_3.png')}}" alt="カテゴリ3" class="c-card__img">
            <h4 class="c-card__title">業務システム開発</h4>
          </div>
        </div>
        <div class="c-card">
          <div class="c-card__body">
            <img src="{{asset('/images/category_4.png')}}" alt="カテゴリ4" class="c-card__img">
            <h4 class="c-card__title">アプリ開発</h4>
          </div>
        </div>
        <div class="c-card">
          <div class="c-card__body">
            <img src="{{asset('/images/category_5.png')}}" alt="カテゴリ5" class="c-card__img">
            <h4 class="c-card__title">ECサイト制作</h4>
          </div>
        </div>
        <div class="c-card">
          <div class="c-card__body">
            <img src="{{asset('/images/category_6.png')}}" alt="カテゴリ6" class="c-card__img">
            <h4 class="c-card__title">サーバー・クラウド</h4>
          </div>
        </div>
        <div class="c-card">
          <div class="c-card__body">
            <img src="{{asset('/images/category_7.png')}}" alt="カテゴリ7" class="c-card__img">
            <h4 class="c-card__title">WEBマーケティング</h4>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

@endsection
