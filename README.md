10-3-5: 認可機能 - ハンズオン演習

このハンズオンについて
Chapter 3で学んだ認可機能を実際に手を動かして確認します。ポリシーを使って、投稿の作成者のみが編集・削除できるアクセス制御を実装

演習課題
この演習で作るもの
ポリシーを使って、投稿の作成者のみが編集・削除できる「投稿管理機能」を作成します。

このハンズオンでは、認可機能の実装に集中できるよう、認証やモデルなどの前提部分が用意されたスターターキットを使用します。

実装するもの
PostPolicy: 認可ロジックを定義するポリシークラス
コントローラー: $this->authorize() を追加
Blade: @can ディレクティブを追加

要件
自分の投稿のみ編集できる
自分の投稿のみ削除できる
他人の投稿には編集・削除ボタンが表示されない
他人の投稿を直接URL指定で編集・削除しようとすると403エラーになる

 動作確認: http://localhost にアクセスしてログイン

 実装タスク
PostPolicyを作成する
update/deleteメソッドを実装する
PostControllerで$this->authorize()を追加する
Bladeで@canディレクティブを追加する

セットアップ

# プロジェクトディレクトリに移動
cd authorization-app-practice

# パッケージをインストール
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install

# 環境ファイルを作成
cp .env.example .env

# Sailを起動
./vendor/bin/sail up -d

# アプリケーションキーを生成
./vendor/bin/sail artisan key:generate

# データベースのマイグレーションとシーダーを実行
./vendor/bin/sail artisan migrate --seed

動作確認
ブラウザで http://localhost にアクセス
「ログイン」をクリック
usera@example.com / password でログイン
投稿一覧が表示されることを確認（現時点では全ての投稿に編集・削除ボタンが表示される）