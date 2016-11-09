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
Route::get('/',function () {
  $games = DB::table('games')->get();
  return view('index',[
  "games" => $games
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
    $item = DB::table('games')->where('id', $id)->first(); //idが一致するものをvegetableテーブルから検索、取得
    $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
    $items[] = $item; // 取得したデータにオブジェクトを保存
    session()->put("items", $items); //取得したデータをsessionに保存。 $_SESSION["items"] に保存するのと同じ
    return redirect("/cart"); //カートのページへリダイレクト
 });
// カートの中を一覧表示
Route::get('/cart', function(){
    $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
    return view("cart", [ //データを渡してビューを表示
         "items" => $items
    ]);
});

// 商品を削除
Route::get('/delete', function(Request $request){
    $index = $request->get("index"); //削除した商品のindexを取得
    session()->forget("items.$index"); //sessionから選んだ商品を削除。例えば$items[0]の削除は items.0 と指定できる。
    return redirect("/cart");
});

// カートを空にする
Route::get('/delete/all', function(){
    session()->flush(); //sessionの全データを削除
    return redirect("/cart"); //カートのページへリダイレクト
});

Route::get('/end',function () {
  $games = DB::table('games')->get();
  return view('end',[
  "games" => $games
  ]);
});
