@if ($errors->any())
{{--MessageBagクラスのanyメソッドを使っている エラーメッセージの有無を返す--}}
  <div class="card-text text-left alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      {{--エラーメッセージが1件以上ある場合は、MessageBagクラスのallメソッドで全エラーメッセージの配列を取得--}}
      {{--@foreachで繰り返し表示を行う--}}

    </ul>
  </div>
@endif