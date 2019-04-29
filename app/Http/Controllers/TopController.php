<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(Request $request){
      $items = Item::all();
      return view('top', ['items' => $items]);
    }
}
