@extends('/template.main')

@section('title','商品')

@section('style')
    <link rel="stylesheet" href="/css/style.css" media="screen" title="no title">

@endsection

@section('main')

    <div class="">
      <h3>ハードでの絞り込みはこちら</h3>
      <form action="/menu" method="get">
      <select class="" name="platform">
        <option value="">全て</option>
        @foreach($game_list as $value)
        <option value="{{$value->platform}}">{{$value->platform}}</option>
        @endforeach
      </select>
      <input type="submit" class="fit" name="" value="絞り込み">
      </form>
    </div>
        <div class="mainlist">
          @foreach($games as $games)
          <div class="mainlist_item">
            <a href="/detail?id={{ $games->id }}">
              <div class="mainlist_img">
                <img src="{{ $games->img }}" alt=""/>
              </div>
              <div class="mainlist_name">
                <h2>{{ $games->name }}</h2>
              </div>
            </a>
          </div>
          @endforeach
        </div>
@endsection
