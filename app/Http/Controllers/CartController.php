<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function index(){
    $items = Item::all();
    $categories = Category::all();
    return view('carts.index', ['items' => $items, 'categories' => $categories]);
  }

  public function show(Request $request){
    $items = Item::find($request->id);
    $categories = Category::all();
    return view('show', ['items' => $items, 'categories' => $categories]);
  }

}
