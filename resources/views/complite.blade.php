@extends('/template.main')

@section('title','商品ページ')
@section('style')
<link rel="stylesheet" href="/css/style.css" media="screen" title="no title">
@endsection
@section('main')
<div class="text-center">
  <h2>注文完了しました!</h2>
  <p>お買い上げありがとうございます。</p>
  <p><a href="/">トップへ</a></p>
  <p><a href="/menu">商品ページへ</a></p>
</div>

@endsection
