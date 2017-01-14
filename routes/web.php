<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get("/session",function(Request $req){
  $count = $req->session()->get("count",0);
  $count++;
  $req->session()->put("count",$count);
  return "this time count is $count";
});

Route::get('/',function () {
  return view ('index');
});

Route::get('/menu',function (Request $request) {
  $platform = $request->get("platform");
  $games = DB::table('games')->get();
  if (!empty($platform)){
    $games = DB::table('games')->where('platform', $platform)->get();
  }
  $gameList = DB::table('games')->select('platform')->groupBy('platform')->get();
  //重複して入れる
  return view('menu',[
  "games" => $games,
  "game_list" => $gameList
  ]);
});

Route::get('/detail', function(Request $request){
    $id = $request->get("id");
    $games = DB::table('games')->where('id', $id)->first();
    return view('detail', [
        "games" => $games
    ]);
});

// カートに入れる
Route::post('/cart', function(Request $request){
    $id = $request->get("id"); //idを取得
    //個数の処理
    $num = 0;   //0で初期化
    $num = $request->get("num");  //個数を取得
    $cart = new \App\Service\CartService();
    $cart->addItem($id,$num);
    return redirect("/cart"); //カートのページへリダイレクト
});//->middleware("auth");

// カートの中を一覧表示
Route::get('/cart', function(){
    $cart = new \App\Service\CartService();
    list($items,$itemCount,$itemMap,$totalSum) = $cart->showCart(); //list(変数名,変数名) = 配列とかにすると、配列の中身を受け渡すことができる
    return view("cart", [ //データを渡してビューを表示
        //"items" => $cart->getItems()
        "items" => $items ,
        "count" => $itemCount ,
        "itemMap" => $itemMap ,
        "sum" => $totalSum
    ]);
});
// 商品を削除
Route::get('/delete', function(Request $request){
    //$index = $request->get("index"); //削除した商品のindexを取得
    $itemId = $request->get("id"); //削除した商品のidを取得。 delete?id=Xの値が入る
    $cart = new \App\Service\CartService();
    //$cart->removeItem($index);
    $cart->removeItem($itemId);
    return redirect("/cart");
});
// カートを空にする
Route::get('/delete/all', function(){
    $cart = new \App\Service\CartService();
    $cart->clear();
    return redirect("/cart"); //カートのページへリダイレクト
});

// 会計内容
Route::post('/check', function(){
  $cart = new \App\Service\CartService();
  list($items,$itemCount,$itemMap,$totalSum) = $cart->showCart(); //list(変数名,変数名) = 配列とかにすると、配列の中身を受け渡すことができる
  return view("check", [ //データを渡してビューを表示
    //"items" => $cart->getItems()
    "items" => $items ,
    "count" => $itemCount ,
    "itemMap" => $itemMap ,
    "sum" => $totalSum
    ]);
});

//会計完了
Route::post('/complite', function(){

})->middleware("auth");



Route::get('/end',function () {
  $games = DB::table('games')->get();
  return view('end',[
  "games" => $games
  ]);
});


Route::get('/forLogout',function () {
  Auth::logout();
  return redirect('/');
});
//
// Route::get('/forLogin',function () {
//   Auth::login();
// });



// Route::auth();

Auth::routes();

Route::get('/home', 'HomeController@index');
