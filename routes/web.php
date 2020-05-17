<?php

Auth::routes();
Route::get('/', 'ArticleController@index')->name('articles.index'); //-- この行を編集
Route::resource('/articles', 'ArticleController')->except(['index']); //-- この行を編集