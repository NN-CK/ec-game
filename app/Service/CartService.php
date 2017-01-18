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
         $items = session()->get("items",[]);
         $itemCount = [];
         $itemMap = [];
         $totalSum = 0;
         foreach ($items as  $item) {
             if(isset($itemCount[$item->id])){
                 $itemCount[$item->id] = $itemCount[$item->id] + 1;
             }else{
                 $itemCount[$item->id] = 1;
                 $itemMap[$item->id] = $item;
             }
             $totalSum = $totalSum + $item->price;
         }
         return [$items,$itemCount,$itemMap,$totalSum];
     }

    public function addItem($id,$num){
        $item = DB::table('games')->where('id', $id)->first();
        $items = session()->get("items",[]);
            if($num > 0){
                for($i=0;$i<$num;$i++){
                    $items[] = $item;
                }
            }
        session()->put("items", $items);
    }
    public function clear(){
        session()->flush();
    }
    public function removeItem($itemId){
        $items = session()->get("items",[]);
        foreach ($items as $index => $item) {
            if($item->id == $itemId){
                session()->forget("items.$index");
            }
        }
    }
}
