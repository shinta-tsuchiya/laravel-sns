<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//==========ここから追加==========
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
//==========ここまで追加==========

class Article extends Model // Articleモデルは Modelクラスを継承している
{
    //==========ここから追加==========
    protected $fillable = [
        'title',
        'body',
    ];
    //==========ここまで追加==========

    public function user(): BelongsTo
    // :BelongsTo メソッドの戻り値の型を宣言
    // PHP7では関数・メソッドの戻り値の型宣言が使える
    // 型:整数、文字列、配列、オブジェクト、クラスなど
    // ここではuserメソッドの戻り値が BelongsTo クラスであることを宣言
    // もし他の型を返そうとした時点でTypeError 例外が発生して処理を終了する
    {
        return $this->belongsTo('App\User');
        // $thisはArticleクラスのインスタンス自身を指す
        // $this->メソッド名() インスタンスが持つメソッドが実行され、
        // $this->プロパティ名 インスタンスが持つプロパティを参照する
        // リレーション
    }
    //==========ここから追加==========
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
    //==========ここまで追加==========

    //===========ここから追加===========
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }
    //===========ここまで追加===========

    //===========ここから追加===========
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
    //===========ここまで追加===========
}
