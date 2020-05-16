<nav class="navbar navbar-expand navbar-dark blue-gradient">

  <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>Memo</a>

  <ul class="navbar-nav ml-auto">

    @guest {{--@guestから@endguestに囲まれた部分は、ユーザーがまだログインしていない状態の時のみ処理される--}}
    <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    {{--route関数を使って、ユーザー登録画面への遷移を可能にしている--}}
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a> {{--この行を編集--}}
    </li>
    @endguest

    @auth {{--@authから@endauthに囲まれた部分は、ユーザーがログイン済みの状態の時のみ処理--}}
    <li class="nav-item">
      <a class="nav-link" href=""><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>
    @endauth

    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href=''">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
        {{--ログアウトルーティング、ルートにはlogoutという名前(Name)が付いているのでroute関数を使える--}}
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
    {{--HTTPメソッドはPOSTである必要があるので、aタグではなくbuttonタグとformタグを使う--}}
      @csrf
    </form>
    <!-- Dropdown -->
    @endauth

  </ul>

</nav>