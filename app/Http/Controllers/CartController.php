<?php

namespace App\Http\Controllers;

use App\Mail\Thank;
use App\Item;
use App\Category;
use App\Cart;
use App\Sale;
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
    $counts = array();
    $allPrice = null;


    if ($carts !== null){
      foreach($carts as $key => $count){
        $item = Item::find($key);
        $array = $item->toArray();

        $price = $item->sale_price * $count;
        $allPrice += $price;

        $array += array('count' => $count);
        $array += array('total_price' => $price);
        array_push($items, $array);
      }
    }

    // dd($items);

    $categories = Category::all();
    return view('carts.index', ['items' => $items, 'counts' => $counts, 'categories' => $categories, 'allPrice' => $allPrice]);
  }

  public function check(Request $request){
    $carts = $request->session()->get('cart');
    // dd($carts);

    if(empty($carts)){
      return redirect('/cart')->with('my_status', __('買い物かごが空です。'));
    }
    // dd($carts);

    $item = array();
    $items = array();
    $counts = array();
    $allPrice = null;

    foreach($carts as $key => $count){
      $item = Item::find($key);
      $array = $item->toArray();

      $price = $item->sale_price * $count;
      $allPrice += $price;

      $array += array('count' => $count);
      $array += array('total_price' => $price);
      array_push($items, $array);
    }
    // dd($items);

    $categories = Category::all();
    return view('carts.check', ['items' => $items, 'categories' => $categories, 'allPrice' => $allPrice]);
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

    $this->validate($request, Sale::$rules);

    $check = Cart::where('token',$request->_token)->exists();
    if ($check){
      $items = Cart::where('token',$request->_token)->get();
    } else {
      return redirect('/cart')->with('my_status', __('商品が入っていません。'));
    }


    $salePrice = null;

    // dd($items);

    foreach($items as $item){
      $salePrice += $item->total_price;
    }

    $sales = $request->all();
    unset($sales['_token']);

    $sales += ['sale_price' => $salePrice];

    // dd($sales);

    $categories = Category::all();
    return view('carts.order', ['items' => $items, 'categories' => $categories, 'sales' => $sales]);
  }

  public function finish(Request $request){

        $items = Cart::where('token',$request->_token)->get();
        $itemName = null;
        $itemCode = null;
        // $userId = null;
        $salePrice = null;

        // dd($items);

        foreach($items as $item){
          $itemName = $itemName . $item->name . "," . $item->counts . "個,";
          $itemCode = $itemCode . $item->item_code . "," . $item->counts . "個,";
          $salePrice += $item->total_price;
        }

        $sales = new Sale;

        $sales->name_kanji = $request->name_kanji;
        $sales->name_kana = $request->name_kana;
        $sales->email = $request->email;
        $sales->item_name = $itemName;
        $sales->item_code = $itemCode;
        // $sales->user_id = $request->counts;
        $sales->sale_price = $salePrice;
        $sales->payment = $request->payment;
        $sales->send_postal = $request->send_postal;
        $sales->send_prefectures = $request->send_prefectures;
        $sales->send_address1 = $request->send_address1;
        $sales->send_address2 = $request->send_address2;
        $sales->description = $request->description;
        $sales->save();

        Cart::where('token',$request->_token)->delete();

        $categories = Category::all();

        // dd($sales);

        // メール送信
        Mail::to($request->email)->send( new Thank($sales) );

        return view('carts.finish', ['items' => $items, 'categories' => $categories]);
  }

}
