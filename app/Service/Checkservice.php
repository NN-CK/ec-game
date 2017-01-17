<?php
namespace App\Service;
use Illuminate\Support\Facades\DB;

class CheckService
{
  public function insert($user_id,$Checkaddless){
    Order::create([
      'user_id' => $user_id,
      'addless' => $Checkaddless,
        ]);
  }
}
?>
