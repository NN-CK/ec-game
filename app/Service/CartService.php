<?php
namespace App\Service;
use Illuminate\Support\Facades\DB;
/**
 * カートの中身を保持するクラス
 */
class CartService
{
    /**
     * カートの中にデータを入れる
     * @param $id
     */
     public function showCart(){
         $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
         $itemCount = []; // id => num
         $itemMap = []; // id => $item
         $totalSum = 0;  //合計金額
         //多分、商品情報を、itemMapに入れて、totalSumに合計金額を格納する処理
         foreach ($items as  $item) {
             if(isset($itemCount[$item->id])){
                 $itemCount[$item->id] = $itemCount[$item->id] + 1;  //カウントを追加
             }else{
                 $itemCount[$item->id] = 1;
                 $itemMap[$item->id] = $item; //多分、商品情報を入れる。
             }
             //合計金額をtotalSumに格納
             $totalSum = $totalSum + $item->price;
         }
         //変数を返す。　受け取り先で、list(変数名,変数名)=X.showCart()で展開する。
         return [$items,$itemCount,$itemMap,$totalSum];
     }

    public function addItem($id,$num){
        $item = DB::table('games')->where('id', $id)->first(); //idが一致するものをvegetableテーブルから検索、取得
        $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
        //$items[] = $item; // 取得したデータにオブジェクトを保存
        //個数の処理
            if($num > 0){
                for($i=0;$i<$num;$i++){
                    $items[] = $item; // 取得したデータにオブジェクトを保存
                }
            }
        session()->put("items", $items); //取得したデータをsessionに保存。 $_SESSION["items"] に保存するのと同じ
    }
    public function clear(){
        session()->flush(); //sessionの全データを削除
    }
    // public function removeItem($index){
    //     session()->forget("items.$index"); //sessionから選んだ商品を削除。例えば$items[0]の削除は items.0 と指定できる。
    // }
    public function removeItem($itemId){
        $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
        foreach ($items as $index => $item) {
            if($item->id == $itemId){
                session()->forget("items.$index"); //sessionから選んだ商品を削除。例えば$items[0]の削除は items.0 と指定できる。
            }
        }
    }
    // public function getItems(){
    //     $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
    //     return $items;
    // }
}
