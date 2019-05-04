<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(Request $request){
      $items = Item::orderBy('id', 'desc')->get();
      $categories = Category::all();
      return view('top', ['items' => $items, 'categories' => $categories]);
    }
}
