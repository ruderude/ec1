<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request){
      $items = Item::all();
      $categories = Category::all();
      return view('list', ['items' => $items, 'categories' => $categories]);
    }

    public function show(Request $request){
      $items = Item::find($request->id);
      $categories = Category::all();
      return view('show', ['items' => $items, 'categories' => $categories]);
    }

    public function keyword(Request $request){
      //キーワードを取得
      $keyword = $request->input('keyword');

      if(!empty($keyword)){

        $items = Item::where('name', 'like', '%'.$keyword.'%')
          ->paginate(9);

      } else {
        $items = Item::all();
      }
      
      $categories = Category::all();
      return view('search', ['items' => $items, 'categories' => $categories]);
    }

    public function search(Request $request){
      $items = Item::where('category_id', $request->id)->get();
      $categories = Category::all();
      return view('search', ['items' => $items, 'categories' => $categories]);
    }
}
