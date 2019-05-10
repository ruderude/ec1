<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;
use App\Item;
use App\Category;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(Request $request){

      // if (session('_token') === null){
      //   $rundom = str_random(32);
      //   $time = date("YmdHis");
      //   $data = $rundom . $time;
      //   session(['_token' => $data]);
      // }

      // $data = Session::all();

      $items = Item::orderBy('id', 'desc')->get();
      $categories = Category::all();
      return view('top', ['items' => $items, 'categories' => $categories]);
    }
}
