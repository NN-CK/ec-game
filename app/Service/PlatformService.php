<?php
namespace App\Service;
use Illuminate\Support\Facades\DB;
/**
 * カートの中身を保持するクラス
 */
class PlatformService{
  /**
   * カートの中にデータを入れる
   * @param $id
   */
  public function Platform(){
    $games = DB::table('games')->get();
    if (!empty($platform)){
      $games = DB::table('games')->where('platform', $platform)->get();
    }
    $gameList = DB::table('games')->select('platform')->groupBy('platform')->get();
    //重複して入れる
    return [$games,$gameList];
  }
}
