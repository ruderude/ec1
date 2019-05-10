<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function category(Request $request){
      $items = Item::orderBy('id', 'desc')->get();
      $categories = Category::all();
      return view('category', ['items' => $items, 'categories' => $categories]);
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

        $items = Item::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc')
          ->paginate(12);

      } else {
        $items = Item::orderBy('id', 'desc')->get();
      }

      $categories = Category::all();
      return view('search', ['items' => $items, 'categories' => $categories]);
    }

    public function search(Request $request){

      $items = Item::where('category_id', $request->id)->orderBy('id', 'desc')->get();
      $category = Category::where('id', $request->id)->first();
      $categoryName = $category->category_name;
      // $childCategory = Category::where('parent_id', $request->id)->orderBy('id', 'desc')->get();
      // $childCategory = $category->children;
      $childCategory = Category::find($request->id)->children;
      $categories = Category::all();
      return view('search', ['items' => $items, 'categories' => $categories, 'childCategory' => $childCategory, 'categoryName' => $categoryName]);

    }


}
