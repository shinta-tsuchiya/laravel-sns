<?php

namespace App\Http\Controllers;

use App\Article;
//===========ここから追加==========
use App\Http\Requests\ArticleRequest;
//===========ここまで追加==========
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    //==========ここまで追加==========

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

    //==========ここから追加========== 
    public function create()
    {
        return view('articles.create');
    }
    //==========ここまで追加==========

    //==========ここから追加==========
    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all()); //-- この行を追加
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }
    //==========ここまで追加==========

    //==========ここから追加========== 
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);    
    }
    //==========ここまで追加==========

    //==========ここから追加==========
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }
    //==========ここまで追加==========

    //==========ここから追加==========
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
    //==========ここまで追加==========

    //-- ここから追加
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
    //-- ここまで追加

    //==========ここから追加==========
    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
    //==========ここまで追加==========
}