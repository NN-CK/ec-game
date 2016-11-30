@extends('/template.main')

@section('title','商品ページ')
@section('style')
<link rel="stylesheet" href="/css/style.css" media="screen" title="no title">
@endsection
@section('main')
    <a href="/">TOPへ</a>
//Main
<div class="user">
  @if(Auth::check())
    UserName - {{Auth::user()->name}}
    <a href="/forLogout">ログアウト</a>
  @endif

  @if(!Auth::check())
    <a href="/login">ログイン</a>
  @endif
</div>
    <div class="games_dit">
    <div class="item_img">
      <img src="{{ $games->img }}" alt=""/>
    </div>
    <div class="">
      <h1>{{ $games->name }}</h1>
    </div>
    <div class="">
      <h1>￥{{ $games->price }}</h1>
    </div>
    <!-- <form class="" action="/cart?id={{$games->id}}" method="post">
    <div class="">
    <select class="" name="number">
      <?php for ($i=1; $i <=20 ; $i++) { ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
      <?php }?>
    </select>
    <input type="submit" name="name" value="買う">
    </div>
    </form> -->
    <form class="" action="cart?id={{$games->id}}" method="post">
       {{ csrf_field() }}
      <input type="submit" name="name" value="買う">
    </form>
    <table class="item_dit" border="1">
      <tr><th>対応ハード</th><td>{{$games->platform}}</td></tr>
      <tr><th>開発</th><td>{{$games->maker}}</td></tr>
      <tr><th>詳細</th><td>{{$games->description}}</td></tr>
    </table>
  </div>
@endsection
