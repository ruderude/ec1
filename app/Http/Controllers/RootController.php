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

  public function store(Request $request)
  {
      $name = str_shuffle(time()).$request->file('image_url1')->getClientOriginalName() . '.' . $request->file('image_url1')->getClientOriginalExtension();
      $request->file('image_url1')->storeAs('images', $name);

      return view('rootitems');
  }


}
