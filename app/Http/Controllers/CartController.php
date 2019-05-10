<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function index(){
    $token = session('_token');
    $items = Cart::where('token',$token)->get();
    $categories = Category::all();
    return view('carts.index', ['items' => $items, 'categories' => $categories]);
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


  public function order(){
    $items = Item::all();
    $categories = Category::all();
    return view('carts.order', ['items' => $items, 'categories' => $categories]);
  }

  public function finish(){
    $items = Item::all();
    $categories = Category::all();
    return view('carts.finish', ['items' => $items, 'categories' => $categories]);
  }

}
