<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Admin;
use App\Mail\Forms;
use App\User;
use App\Cart;
use App\Item;
use App\Form;
use App\Category;
use Illuminate\Http\Request;

class InfoController extends Controller
{
  public function company(Request $request){
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
    $categories = Category::all();
    return view('info.company', ['categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
  }

  public function info(Request $request){
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
    $categories = Category::all();
    return view('info.info', ['categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
  }

  public function info2(Request $request){
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
    $categories = Category::all();
    return view('info.info2', ['categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
  }

  public function form(Request $request){
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
    $categories = Category::all();
    return view('info.form', ['categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
  }

  public function send(Request $request){
    // DBへ保存
    $this->validate($request, Form::$rules);
    $item = new Form;
    $form = $request->all();
    unset($form['_token']);
    $item->fill($form)->save();

    // dd($form);

    // メール送信
    Mail::to($form['email'])->send( new Forms($form) );

    return redirect('form')->with('my_status', __('問い合わせを送信しました。お客様にも確認メールが送られます。'));
  }


}
