<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index() // ArticleController@indexのindex部分がindexアクションメソッドに対応
    {
        $articles = Article::all()->sortByDesc('created_at');
        // allメソッド モデルがもつクラスメソッド
        // モデルの全セータをコレクションで返す
        // コレクションのメソッド、sortRyDescメソッドで、created_atを降順で並び替え
        // 投稿日時が新しい順に
        // Articleモデルの全データが最新の投稿日時順に並び替えられた上で$articlesに代入

        return view('articles.index', ['articles' => $articles]); // viewメソッドの結果をアクセス元に返す
    }
}