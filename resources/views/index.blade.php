<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>商品</title>
    <link rel="stylesheet" href="/css/style.css" media="screen" title="no title">
  </head>
  <body>
    <div class="">
      <h2>私のECサイト(仮)</h2>
    </div>

      <ul>
        <div class="list">
          <h1>PS4</h1>
        @foreach($games as $games)
        <li>
        <div class="list_item">
        <div class="list_img">
                  <a href="/detail?id={{ $games->id }}">
                        <img src="{{ $games->img }}" alt=""/>
                    </div>
                    <div class="list_name">
                        <h2>{{ $games->name }}</h2>
                    </div>
                    </a>
                <div>
              </li>
              @endforeach
              </div>
            </ul>


  </body>
</html>
