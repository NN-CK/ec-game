@extends('/template.main')

@section('title','商品ページ')
@section('style')
<link rel="stylesheet" href="/css/style.css" media="screen" title="no title">
@endsection
@section('main')

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
      <div>
        <form class="" action="/cart?id={{$games->id}}" method="post">
          {!! csrf_field() !!}
          <select class="" name="num">
            <?php for ($i=1; $i <=10 ; $i++) { ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php }?>
          </select>
          <input type="submit" name="add" value="購入">
        </form>
    <table class="item_dit" border="1">
      <tr><th>対応ハード</th><td>{{$games->platform}}</td></tr>
      <tr><th>開発</th><td>{{$games->maker}}</td></tr>
      <tr><th>詳細</th><td>{{$games->description}}</td></tr>
    </table>
  </div>
@endsection
