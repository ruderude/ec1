<?php

namespace App\Http\Controllers;

use App\Item;
use App\Cart;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function category(Request $request){
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
      $items = Item::orderBy('id', 'desc')->get();
      $categories = Category::all();
      return view('category', ['items' => $items, 'categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
    }

    public function show(Request $request){
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

      $items = Item::find($request->id);
      $categories = Category::all();
      return view('show', ['items' => $items, 'categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
    }

    public function keyword(Request $request){

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

      //キーワードを取得
      $keyword = $request->input('keyword');
      // dd($keyword);
      if(!empty($keyword)){
        $items = Item::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc')
          ->paginate(12);
        // dd($items);
      } else {
        $items = Item::orderBy('id', 'desc')->get();
        // dd($items);
      }

      $categories = Category::all();
      return view('search', ['items' => $items, 'categories' => $categories, 'counts' => $counts, 'allPrice' => $allPrice]);
    }

    public function search(Request $request){

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

      $items = Item::where('category_id', $request->id)->orderBy('id', 'desc')->get();
      $category = Category::where('id', $request->id)->first();
      $categoryName = $category->category_name;
      // $childCategory = Category::where('parent_id', $request->id)->orderBy('id', 'desc')->get();
      // $childCategory = $category->children;
      $childCategory = Category::find($request->id)->children;
      $categories = Category::all();
      return view('search', ['items' => $items, 'categories' => $categories, 'childCategory' => $childCategory, 'categoryName' => $categoryName, 'counts' => $counts, 'allPrice' => $allPrice]);

    }


}
