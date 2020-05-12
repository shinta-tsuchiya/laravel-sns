<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            // $table->カラムの属性('カラム名'); カラムを定義
            // このマイグレーションファイルが使用されこのカラムを持ったarticlesテーブルが作成される
            $table->bigIncrements('id');
            // id 整数 記事を識別するID
            $table->string('title');
            // title 最大255文字の文字列 記事のタイトル
            $table->text('body');
            // body 制限なしの文字列 記事の本文
            $table->bigInteger('user_id');
            // user_id 整数 記事を投稿したユーザーのID
            $table->foreign('user_id')->references('id')->on('users');
            // 外部キー制約をつける "user_idカラムはusersテーブルのidカラムを参照する"制約
            // articleテーブルのuser_idカラムにはusersテーブルに存在するidと同じ値しか入れられなくなる
            $table->timestamps();
            // created_at updated_at の2つのカラムに対応 日付と時刻 作成・更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
