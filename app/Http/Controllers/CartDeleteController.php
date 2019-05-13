<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartDeleteController extends Controller
{
  public function destroy(){
    $now = Carbon::now();
    $dt = $now->subDays(3);
    Cart::where('created_at','<',$dt)->delete();
  }
}
$destroy = new CartDeleteController();
$destroy->destroy();
