@extends('app')

@section('title', 'ユーザー登録')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center"><a class="text-dark" href="/">memo</a></h1>
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>

            <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block btn-danger">
              <i class="fab fa-google mr-1"></i>Googleで登録
            </a>
            
            @include('error_card_list') 

            <div class="card-text">
              {{--ここから--}}
              <form method="POST" action="{{ route('register') }}">
                {{--Laravelのroute関数 与えられた名前付きルートのURLを返す--}}
                {{--BladeはHTMLに変換されてクライアントにレスポンスされる--}}
                {{--→<form method="POST" action="http://localhost/register">--}}
                {{--formタグのmethod属性ではPOSTと定義してあるので、リクエストはPOSTメソッドとなり、Laravelではユーザー登録処理を行ってくれる--}}
                @csrf
                {{--BladeがHTMLに変換されると--}}
                {{--<input type="hidden" name="_token" value="xwwDXDKEEnPoCZMF2xMWDtCbpeQgCSNNVIINugCA">(valueの値は毎回変わる)--}}
                {{--CSRF脆弱性からWebサービスを守るためのトークン情報--}}
                {{--POSTメソッドであるリクエストにこのトークン情報がないと、Laravelではエラーをレスポンスする--}}
                <div class="md-form">
                  <label for="name">ユーザー名</label>
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                  {{--old関数 引数にパラメータ名を渡すと、直前のリクエストのパラメータを返す--}}
                  {{--ユーザー登録処理でバリデーションエラーになると再びユーザー登録画面が表示されるが、何もしないと全ての項目が空で表示され、入力をやり直すことになる--}}
                  {{--old関数を使うことで、入力した内容が保持された状態になる--}}
                  {{--ただし、passwordとpassword_confirmationはold関数を使ってもnullが返るので、これらの入力項目でold関数を使うのはNG--}}
                  <small>英数字3〜16文字(登録後の変更はできません)</small>
                </div>
                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                </div>
                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="md-form">
                  <label for="password_confirmation">パスワード(確認)</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">ユーザー登録</button>
                {{--type属性がsubmit(送信)であるbuttonタグ 押されるとformタグのaction属性のURLに対して、指定されたメソッドここではPOSTにてサーバーへリクエスト(要求)される--}}
              </form>
                  {{--ここまで--}}

              <div class="mt-0">
                <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection