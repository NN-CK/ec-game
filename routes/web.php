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
  $start = new \App\Service\PlatformService();
  list($games,$gameList) = $start->Platform($platform);
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
    $id = $request->get("id");
    $num = 0;
    $num = $request->get("num");
    $cart = new \App\Service\CartService();
    $cart->addItem($id,$num);
    return redirect("/cart");
});//->middleware("auth");

// カートの中を一覧表示
Route::get('/cart', function(){
    $cart = new \App\Service\CartService();
    list($items,$itemCount,$itemMap,$totalSum) = $cart->showCart();
    return view("cart", [
        "items" => $items ,
        "count" => $itemCount ,
        "itemMap" => $itemMap ,
        "sum" => $totalSum
    ]);
});
// 商品を削除
Route::get('/delete', function(Request $request){
    $itemId = $request->get("id");
    $cart = new \App\Service\CartService();
    $cart->removeItem($itemId);
    return redirect("/cart");
});
// カートを空にする
Route::get('/delete/all', function(){
    $cart = new \App\Service\CartService();
    $cart->clear();
    return redirect("/cart");
});

// 会計内容
Route::post('/check', function(){
  $cart = new \App\Service\CartService();
  list($items,$itemCount,$itemMap,$totalSum) = $cart->showCart();
  return view("check", [
    "items" => $items ,
    "count" => $itemCount ,
    "itemMap" => $itemMap ,
    "sum" => $totalSum
    ]);
});

//会計完了
Route::post('/complite', function(){
  session()->flush();
  return view("/complite");
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
