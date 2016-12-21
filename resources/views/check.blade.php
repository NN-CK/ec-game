@extends('/template.main')

@section('title','会計')

@section('style')

@endsection

@section('main')
<form class="" action="#" method="post">
  <h2>住所を入力してください。</h2>
  <input type="text" name="" value="">

  <h1>以下の内容でよろしいですか?</h1>
  <p>お名前:{{Auth::user()->name}}</p>
  <p>メールアドレス:{{Auth::user()->email}}</p>

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
    @endif
    <input type="submit" name="" value="">
</form>





@endsection
