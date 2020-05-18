@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav') {{--この行を追加--}}
  <div class="container">
    @foreach($articles as $article) {{--この行を追加--}} 
    @include('articles.card') {{-- この行を追加 --}}    
    @endforeach {{--この行を追加--}}
  </div>
@endsection