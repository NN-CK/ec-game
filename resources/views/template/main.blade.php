<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    <title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/common/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/common/main.css" media="screen" title="no title">
    <script src="/css/common/bootstrap.min.js" rel="stylesheet"></script>
		<link rel="stylesheet" href="assets/css/main.css" />
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
    @yield('style')
  </head>
  <body>
    <!-- Wrapper -->
      <div id="wrapper">
        <!-- Header -->
          <header id="header">
            <div class="inner">

              <!-- Logo -->
                <a href="/" class="logo">
                  <span class="symbol"><img src="assets/images/logo.svg" alt="" /></span>
                  <span class="title">私のECサイト（仮）</span>
                </a>

              <!-- Nav -->
              <nav>
                <ul>
                  <li><a href="#menu">Menu</a></li>
                </ul>
              </nav>

            </div>
          </header>
        <!-- Menu -->
        <nav id="menu">
          <h2>ナビメニュー</h2>
          <ul>
            @if(Auth::check())
            <li>{{Auth::user()->name}}様</li>
            @endif
            <li><a href="/">ホーム</a></li>
            <li><a href="/menu">メニュー</a></li>
            <li><a href="/cart">カート</a></li>
            @if(!Auth::check())
            <li><a href="/login">ログイン</a></li>
            <li><a href="/register">新規登録</a></li>
            @endif
            @if(Auth::check())
            <li><a href="/forLogout">ログアウト</a></li>
            @endif
          </ul>
        </nav>
      @yield('main')
  </body>
</html>
