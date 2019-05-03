<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(Request $request){
      $items = Item::all();
      $categories = Category::all();
      return view('top', ['items' => $items, 'categories' => $categories]);
    }
}
