<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request){
      $items = Item::all();
      return view('list', ['items' => $items]);
    }

    public function show(Request $request){
      $items = Item::find($request->id);
      return view('show', ['items' => $items]);
    }
}
