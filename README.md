# アプリケーション名
Rese（リーズ）

## アプリ概要
ある企業のグループ会社の飲食店予約サービス

アプリのトップページ画像
<img width="1437" alt="shop_all" src="https://github.com/takanabu/Rese/assets/146699650/6f2ec6a3-49b2-4340-86ed-99f006813aa3">



## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## アプリケーションURL
- 開発環境：http://localhost/
- phpMyAdmin:http://localhost:8080/

※会員登録ページでユーザー登録を行いログインページでログインして使用します。

## 機能一覧
- 会員登録機能
- ログイン・ログアウト機能
- ユーザー情報取得、ユーザー飲食店お気に入り一覧取得、ユーザー飲食店予約情報取得
- 飲食店一覧取得、飲食店詳細取得
- 飲食店お気に入り追加、飲食店お気に入り削除
- 飲食店予約情報追加、飲食店予約情報削除
- エリアで検索する、ジャンルで検索する、店名で検索する

## 使用技術(実行環境)
- php 8.0
- HTML
- CSS
- laravel 10.0
- MySQL 8.0
- docker-compose

## テーブル設計
<img width="570" alt="userテーブル" src="https://github.com/takanabu/Atte/assets/146699650/06288416-26cb-470c-807a-d667de9e6073">

<img width="584" alt="attendanceテーブル" src="https://github.com/takanabu/Atte/assets/146699650/6c816a84-3897-4171-9d6d-6e5c481ec085">

<img width="571" alt="breakテーブル" src="https://github.com/takanabu/Atte/assets/146699650/674ab712-fe7d-4917-b346-01b489ae817b">





## ER図
![er2-4](https://github.com/takanabu/Atte/assets/146699650/a96217e9-dd2b-4ab5-8014-4d9011918579)


## 環境構築
Dockerビルド
1. docker-compose up -d -build  
※ MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db

