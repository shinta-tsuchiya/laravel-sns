<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 整数 ユーザーを識別するID
            $table->string('name')->unique();
            // 最大255文字の文字列 ユニーク制約 ユーザー名
            // uniqueメソッド このテーブル内で他のレコードと同じ値を重複させない
            // この教材では name を twitterでいう @ から始まるユーザー名のように使用
            $table->string('email')->unique();
            // 最大255文字の文字列 ユニーク制約 メアド
            $table->timestamp('email_verified_at')->nullable();
            // 日付と時刻 この教材では未使用
            $table->string('password')->nullable();
            // 最大255文字の文字列 null許容 パスワード
            // nullablメソッド nullの許容
            // 本教材ではGoogleアカウントを使ったユーザー登録の際に
            //password設定不要にしているのでnullを許容
            $table->rememberToken();
            // 最大100文字の文字列 null許容 このカラムに値があると時間が経っても自動的にログアウトされない
            $table->timestamps();
            // created_at updated_at 日付と時刻 作成日時 更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
