@extends('/template.main')

@section('title','会計')

@section('style')
<link rel="stylesheet" href="/css/style.css" media="screen" title="no title">
@endsection

@section('main')
<div class="check_main">
<form class="" action="/complite" method="post">
  <h2>住所を入力してください。</h2>
  <textarea type="text" rows="4" cols="40" name="addless" value=""></textarea>

  <h1>以下の内容でよろしいですか?</h1>
  <p>お名前:{{Auth::user()->name}}</p>
  <p>メールアドレス:{{Auth::user()->email}}</p>
  <!-- ユーザーデータ保存 -->
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

  <h2>購入内容</h2>
  @if($itemMap)
    <table>
      <thead>
        <tr>
          <th>商品名</th>
          <th>価格</th>
          <th>個数</th>
        </tr>
      </thead>
      <tbody>
        <?php $sum = 0; ?>
        @foreach($itemMap as $itemId=>$item)
        <tr>
          <td>{{$item->name}}</td>
          <td>￥{{$item->price}}</td>
          <?php $sum += $item->price; ?>
          <td><!-- 個数 -->
            <?php echo $count[$item->id] ?>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <h2>会計:￥<?php echo $sum; ?></h2>
    @endif
    <input type="submit" class="fit" name="" value="購入する">
</form>

</div>



@endsection
