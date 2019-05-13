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
  public function index(){
    $token = session('_token');
    $items = Cart::where('token',$token)->get();
    $allPrice = null;

    foreach($items as $item){
      $allPrice += $item->total_price;
    }

    $categories = Category::all();
    return view('carts.index', ['items' => $items, 'categories' => $categories, 'allPrice' => $allPrice, 'token' => $token]);
  }

  public function in(Request $request){

    $categories = Category::all();

    $item = Item::find($request->id);
    $token = session('_token');
    $itemName = $item->name;

    $cartItems = Cart::where('token',$token)->where('name', $itemName)->first();

    if (is_null($cartItems)){

      $totalPrice = $item->sale_price * $request->input('count');

      $cart = new Cart;
      $cart->token = $token;
      $cart->name = $item->name;
      $cart->item_id = $item->id;
      $cart->item_code = $item->item_code;
      $cart->manufacturer = $item->manufacturer;
      $cart->counts = $request->input('count');
      $cart->list_price = $item->list_price;
      $cart->sale_price = $item->sale_price;
      $cart->total_price = $totalPrice;
      $cart->category_id = $item->category_id;
      $cart->image_url1 = $item->image_url1;
      $cart->save();

    } else {

      $count = $cartItems->counts + $request->input('count');
      $totalPrice = $cartItems->sale_price * $count;



      $cartItems->counts += $request->input('count');
      $cartItems->total_price = $totalPrice;
      $cartItems->save();

    }

    $items = Cart::all();

    return redirect('/cart')->with('my_status', __('商品をカートに入れました。'));
  }


  public function update(Request $request){
    $items = Cart::find($request->id);

    $price = $items->sale_price;
    $totalPrice = $price * $request->counts;

    $items->counts = $request->counts;
    $items->total_price = $totalPrice;
    $items->save();

    return redirect('/cart')->with('my_status', __('個数を変更しました。'));
  }

  public function del(Request $request){
    $item = Cart::find($request->id);
    $item->delete();
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
