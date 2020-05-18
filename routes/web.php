<?php

Auth::routes();
Route::get('/', 'ArticleController@index')->name('articles.index'); //-- この行を編集
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth'); //-- exceptメソッドの引数を変更
Route::resource('/articles', 'ArticleController')->only(['show']); //-- この行を追加