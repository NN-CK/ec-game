@extends('/template.main')

@section('title','カート')

@section('style')

@endsection

@section('main')

    <h1>購入内容</h1>
    <div class=""> <!--商品が入ってるとき -->
      <form class="" action="/check" method="post">
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
                <?php  $id = $item->id;  ?>
                <?php echo $count[$item->id] ?>
              </td>
              <td><a href="/delete?id={{ $itemId }}">削除</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        合計:￥<?php echo $sum; ?>
        <p><input type="submit" name="name" value="購入手続きへ"></p>
        @else
        <a href="/">商品は入ってません</a>
        @endif
        <p><a href="/"><input type="button" name="name" value="トップへ戻る"></a></p>
        <p><a href="/delete/all" class=""><input type="button" name="name" value="内容をすべて消す"></a></p>
        </form>
    </div>
  @endsection
