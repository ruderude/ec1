<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class RootController extends Controller
{
  public function index(Request $request){
    return view('root');
  }

  public function items(Request $request){
    return view('rootitems');
  }


}
