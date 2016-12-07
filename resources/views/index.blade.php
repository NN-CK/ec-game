@extends('/template.main')

@section('title','商品')

@section('style')
    <link rel="stylesheet" href="/css/style.css" media="screen" title="no title">

@endsection

@section('main')

    <div class="">
      <h2>私のECサイト(仮)</h2>
    </div>
    <div class="text-right">
      <p>ハードでの絞り込みはこちら</p>
      <form action="/" method="get">
      <select class="" name="platform">
        <option value="">全て</option>
        @foreach($game_list as $value)
        <option value="{{$value->platform}}">{{$value->platform}}</option>
        @endforeach
      </select>

      <input type="submit" name="" value="絞り込み">
      </form>
    </div>
        <div class="mainlist">
          @foreach($games as $games)
          <div class="mainlist_item">
            <div class="mainlist_img">
               <a href="/detail?id={{ $games->id }}">
                <img src="{{ $games->img }}" alt=""/>
            </div>
                    <div class="mainlist_name">
                        <h2>{{ $games->name }}</h2>
                        </a>
                    </div>
                  </div>
                  @endforeach
        </div>
@endsection
