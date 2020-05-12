<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    //==========ここから追加==========
    public function index() // ArticleController@indexのindex部分がindexアクションメソッドに対応
    {
        // ダミーデータ 
        $articles = [ //変数 $articles
            (object) [ // (object) 型キャスト 配列の手前に記述 配列がobject型に変換される
                'id' => 1,
                'title' => 'タイトル1',
                'body' => '本文1',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
            (object) [
                'id' => 2,
                'title' => 'タイトル2',
                'body' => '本文2',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 2,
                    'name' => 'ユーザー名2',
                ],
            ],
            (object) [
                'id' => 3,
                'title' => 'タイトル3',
                'body' => '本文3',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 3,
                    'name' => 'ユーザー名3',
                ],
            ],
        ];

        return view('articles.index', ['articles' => $articles]); // viewメソッドの結果をアクセス元に返す
    }
    //==========ここまで追加==========
}