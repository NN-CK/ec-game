@extends('/template.main')

@section('title','商品')

@section('style')
    <link rel="stylesheet" href="/css/style.css" media="screen" title="no title">

@endsection

@section('main')

    <div class="">
      <h2>私のECサイト(仮)</h2>
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
