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
<img width="811" alt="users" src="https://github.com/takanabu/Rese/assets/146699650/25e6ac14-e312-4d08-9336-ecb4e7c01a80">

<img width="822" alt="shop" src="https://github.com/takanabu/Rese/assets/146699650/5100c808-33de-4a38-a7b3-ad3a1cb1bdde">

<img width="813" alt="reservations" src="https://github.com/takanabu/Rese/assets/146699650/3b441813-0a9f-4325-803e-4012408cdcaf">

<img width="809" alt="favorites" src="https://github.com/takanabu/Rese/assets/146699650/dc109713-532d-4e9e-8166-5cda33a58188">



## ER図
![Rese](https://github.com/takanabu/Rese/assets/146699650/5dda52d3-dd72-4d2d-a92f-0089d91aa95e)



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

