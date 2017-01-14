@extends('/template.main')

@section('title','トップ')

@section('style')
<link rel="stylesheet" href="/css/style.css" media="screen" title="no title">

@endsection

@section('main')
				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1>私のECサイト（仮）へようこそ‼</h1>
                @if(Auth::check())
                <h3>{{Auth::user()->name}}様、お帰りなさい!</h3>
                @endif
								<p>私のECサイト（仮）ではゲームソフトを販売しています。あなたの欲しかったゲームはここに‼</p>
							</header>
							<section class="tiles">
								<article class="style1">
									<span class="image">
										<img src="assets/images/pic01.jpg" alt="" />
									</span>
									<a href="/menu">
										<h2>メニュー</h2>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="assets/images/pic02.jpg" alt="" />
									</span>
									<a href="/cart">
										<h2>カート</h2>
									</a>
								</article>
                @if(!Auth::check())
								<article class="style3">
									<span class="image">
										<img src="assets/images/pic03.jpg" alt="" />
									</span>
									<a href="/login">
										<h2>ログイン</h2>
									</a>
								</article>
								<article class="style4">
									<span class="image">
										<img src="assets/images/pic04.jpg" alt="" />
									</span>
									<a href="/register">
										<h2>新規作成</h2>
                  </a>
								</article>
                @endif
							</section>
						</div>
					</div>
@endsection
