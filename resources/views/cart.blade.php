@extends('/template.main')

@section('title','商品')

@section('style')

@endsection

@section('main')

    <h1>購入内容</h1>
    <div class=""> <!--商品が入ってるとき -->
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
                <form class="" action="#" method="post">
                  <select class="cart-num-4js" name="">
                    <option value="<?php echo $count[$id] ?>"
                      selected><?php echo $count[$id] ?></option>
                      <?php for($i = $count[$id]; $i > 0; $i--){ ?>
                    <option value="<?php echo $i - 1; ?>"><?php echo $i - 1; ?></option>
                    <?php } ?>
                  </select>
                </form>
              </td>
              <td><a href="/delete?id={{ $itemId }}">削除</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        合計:￥<?php echo $sum; ?>
        <p><a href="/end"><input type="button" name="name" value="購入手続きへ"></a></p>
        @else
        <a href="/">商品は入ってません</a>
        @endif
        <p><a href="/"><input type="button" name="name" value="トップへ戻る"></a></p>
        <p><a href="/delete/all" class=""><input type="button" name="name" value="内容をすべて消す"></a></p>
    </div>
  @endsection
