# matchworks


## 概要

ITエンジニア向けマッチングサービス  
https://matchworks.site  


## 動作環境

PHP: 7.1.3  
MySQL: 5.7.x


## 使用言語、フレームワーク

PHP: Laravel 5.8.38  
JavaScript: Vue.js 2.5.17


## 背景

ランサーズやクラウドサービスなどのクラウドソーシングサイトは、オプションや入力項目が多く、複雑でわかりにくい。  
より簡単に仕事を依頼、応募できることで、気軽に仕事を発注できるようになり、初心者にとっても仕事を受けやすくなると考える。


## 目的

誰でも手軽に仕事を依頼、応募できる、ITエンジニア向けの仕事マッチングサービスを提供する。


## サービスの流れ

- 依頼する場合
  1. ユーザー登録をする
  2. 案件を登録する
  3. 登録した案件に応募があった場合、登録メールアドレスに通知が来る
  4. サービス上で、応募者と1:1で詳細のやりとりを行う
  5. 案件が成約した場合、案件を成約済みにする

- 応募する場合
  1. ユーザー登録をする
  2. 登録されている案件に応募する
  3. サービス上で、依頼者と1:1で詳細のやりとりを行う


## 機能一覧

- ユーザー登録
- 退会
- ログイン、ログアウト
- パスワードリマインダー
- ユーザー情報編集
- 案件の一覧表示
- 案件の登録
- 案件の編集
- 案件の削除
- 案件への応募
- 案件応募の通知機能
- 案件の状態変更（未成約から成約済みへ）
- 案件の気になる機能
- 案件をTwitterで共有
- 案件に対して、パブリックコメント機能
- 案件の依頼者との1:1のメッセージ機能


## 今後の課題

- ページングを全て表示するのではなく、一部「・・・」と省略表示できるようにする
- ユーザー詳細画面において、ユーザーが依頼している案件を見ることができるようにする
- ユーザーもお気に入り登録できるようにする

