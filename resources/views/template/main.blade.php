<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/common/bootstrap.min.css" media="screen" title="no title">
    <script src="/css/common/admin.css" rel="stylesheet"></script>
    @yield('style')

  </head>
  <body>
    <div class="main">
      @yield('main')
    </div>
  </body>
</html>
