@extends('/template.main')

@section('title','商品')

@section('style')

@endsection

@section('main')

    <h1>中身</h1>
    <div class=""> <!--商品が入ってるとき -->
      @if($items)
        <table>
          <thead>
            <tr>
              <th>商品名</th>
              <th>価格</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum = 0; ?>
            @foreach($items as $index=>$item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->price}}</td>
              <?php $sum += $item->price; ?>
              <td style="text-align: center;"><a href="/delete?index={{ $index }}">削除</a></td>
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
