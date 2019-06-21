<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;
use App\Cart;
use App\Item;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(Request $request){
      // カートテーブルから個数と合計額を取得
      $carts = $request->session()->get('cart');
      // dd($carts);
      $item = array();
      $items = array();
      $counts = null;
      $allPrice = null;

      if ($carts !== null){
        foreach($carts as $key => $count){
          $item = Item::find($key);
          $array = $item->toArray();

          $price = $item->sale_price * $count;
          $counts += $count;
          $allPrice += $price;
        }
      }

      $items = Item::orderBy('id', 'desc')->paginate(15);
      $categories = Category::all();
      return view('top', ['items' => $items, 'categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
    }

}
