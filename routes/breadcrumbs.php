<?php

// ホーム
Breadcrumbs::for('home', function($trail) {
  $trail->push('ホーム',url('index'));
});

// 案件一覧
Breadcrumbs::for('works', function($trail) {
  $trail->push('案件一覧', route('works.index'));
});

// 案件一覧 > 案件詳細
Breadcrumbs::for('showWork', function($trail, $work) {
  $trail->parent('works');
  $trail->push('案件詳細', route('works.show', $work->id));
});

// 案件一覧 > 案件詳細 > 編集
Breadcrumbs::for('editWork', function($trail, $work) {
  $trail->parent('showWork', $work);
  $trail->push('案件編集', route('works.edit', $work->id));
});

// マイページ
Breadcrumbs:: for('mypage', function($trail) {
  $trail->push('マイページ', route('users.mypage'));
});

// マイページ > プロフィール編集
Breadcrumbs:: for('editProfile', function($trail) {
  $trail->parent('mypage');
  $trail->push('プロフィール編集', route('users.edit'));
});
