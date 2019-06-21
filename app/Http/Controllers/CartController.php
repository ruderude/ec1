<?php

namespace App\Http\Controllers;

use App\Mail\Thank;
use App\Item;
use App\Category;
use App\Cart;
use App\Sale;
use App\Fee;
use App\Order;
use App\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
  public function index(Request $request){
    // $items = $request->session()->all();
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

        $array += array('count' => $count);
        $array += array('total_price' => $price);
        array_push($items, $array);
      }
    }

    // dd($items);

    $categories = Category::all();
    return view('carts.index', ['items' => $items, 'categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
  }

  public function check(Request $request){
    $carts = $request->session()->get('cart');
    // dd($carts);

    if(empty($carts)){
      return redirect('/cart')->with('my_status', __('買い物かごが空です。'));
    }
    // dd($carts);

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

        $array += array('count' => $count);
        $array += array('total_price' => $price);
        array_push($items, $array);
      }
    }

    $fees = Fee::all();
    // dd($fees->toArray());
    // dd($fees['0']['underprice']);
    switch ($allPrice){
      case $allPrice >= $fees['0']['underprice'] && $allPrice <= $fees['0']['overprice']:
        $fee = $fees['0']['fee'];
        break;
      case $allPrice >= $fees['1']['underprice'] && $allPrice <= $fees['1']['overprice']:
        $fee = $fees['1']['fee'];
      break;
      case $allPrice >= $fees['2']['underprice'] && $allPrice <= $fees['2']['overprice']:
        $fee = $fees['2']['fee'];
      break;
      case $allPrice >= $fees['3']['underprice'] && $allPrice <= $fees['3']['overprice']:
        $fee = $fees['3']['fee'];
      break;
      default:
        $fee = 1000;
    }
    // dd($fee);

    $categories = Category::all();
    return view('carts.check', ['items' => $items, 'categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice, 'fee' => $fee]);
    }

  public function in(Request $request){

    $request->session()->put('cart.' . $request->id, $request->count);
    // $data = $request->session()->all();
    // dd($data);

    return redirect('/cart')->with('my_status', __('商品をカートに入れました。'));
  }


  public function update(Request $request){

    $request->session()->put('cart.' . $request->id, $request->count);
    // $data = $request->session()->all();
    // dd($data);

    return redirect('/cart')->with('my_status', __('個数を変更しました。'));
  }

  public function del(Request $request){
    // $data = $request->session()->all();
    // dd($data);
    // dd($request->id);
    $request->session()->forget('cart.' . $request->id);

    return redirect('/cart')->with('my_status', __('削除しました。'));
  }


  public function order(Request $request){
    $carts = $request->session()->get('cart');
    // dd($carts);

    if(empty($carts)){
      return redirect('/cart')->with('my_status', __('買い物かごが空です。'));
    }
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

        $array += array('count' => $count);
        $array += array('total_price' => $price);
        array_push($items, $array);
      }
    }

    $fees = Fee::all();
    // dd($fees->toArray());
    // dd($fees['0']['underprice']);
    switch ($allPrice){
      case $allPrice >= $fees['0']['underprice'] && $allPrice <= $fees['0']['overprice']:
        $fee = $fees['0']['fee'];
        break;
      case $allPrice >= $fees['1']['underprice'] && $allPrice <= $fees['1']['overprice']:
        $fee = $fees['1']['fee'];
      break;
      case $allPrice >= $fees['2']['underprice'] && $allPrice <= $fees['2']['overprice']:
        $fee = $fees['2']['fee'];
      break;
      case $allPrice >= $fees['3']['underprice'] && $allPrice <= $fees['3']['overprice']:
        $fee = $fees['3']['fee'];
      break;
      default:
        $fee = 1000;
    }
    // dd($fee);


    $customer = $request->all();
    $categories = Category::all();
    return view('carts.order', ['customer' => $customer, 'items' => $items, 'counts' => $counts, 'categories' => $categories, 'allPrice' => $allPrice, 'fee' => $fee]);
  }

  public function finish(Request $request){
    $user = Auth::user();
    // dd($user['id']);

    $sales = new Order;

    $sales->name_kanji = $request->name_kanji;
    $sales->name_kana = $request->name_kana;
    $sales->email = $request->email;
    $sales->user_id = $user['id'];
    $sales->payment_id = $request->payment;
    $sales->sale_price = $request->sale_price;
    $sales->fee = $request->fee;
    $sales->send_postal = $request->send_postal;
    $sales->send_prefectures = $request->send_prefectures;
    $sales->send_address1 = $request->send_address1;
    $sales->send_address2 = $request->send_address2;
    $sales->description = $request->description;
    $sales->save();

    // dd($sales['id']);

    $items =  $request->session()->get('cart');

    foreach($items as $key => $i){
      $item = Item::find($key);
      $orderItem = new Order_item;

      $orderItem->order_id = $sales['id'];
      $orderItem->name = $item->name;
      $orderItem->counts = $i;
      $orderItem->sale_price = $item->sale_price * $i;
      $orderItem->save();
    }

    $categories = Category::all();

    // dd($sales);

    // メール送信
    Mail::to($request->email)->send( new Thank($sales) );

    $request->session()->flush();

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

        $array += array('count' => $count);
        $array += array('total_price' => $price);
        array_push($items, $array);
      }
    }

    return view('carts.finish', ['categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
  }

}
