<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/common/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/common/main.css" media="screen" title="no title">
    <script src="/css/common/bootstrap.min.js" rel="stylesheet"></script>
    @yield('style')
    <nav class="header_main">
      <ul>
        <li><a href="/">TOPへ</a></li>
        <li><a href="/cart">カートを見る</a></li>
      </ul>
      <ul>
        <div class="user">
        @if(Auth::check())
          UserName - {{Auth::user()->name}}
          <li><a href="/forLogout">ログアウト</a></li>
        @endif

        @if(!Auth::check())
          <li><a href="/login">ログイン</a></li>
        @endif
      </div>
      </ul>
    </nav>

  </head>
  <body>
    <div class="main">
      @yield('main')
    </div>
  </body>
</html>
