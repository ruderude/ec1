<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Admin;
use App\User;
use App\Item;
use App\Form;
use App\Category;
use Illuminate\Http\Request;

class InfoController extends Controller
{
  public function company(){
    $categories = Category::all();
    return view('info.company', ['categories' => $categories]);
  }

  public function info(){
    $categories = Category::all();
    return view('info.info', ['categories' => $categories]);
  }

  public function form(){
    $categories = Category::all();
    return view('info.form', ['categories' => $categories]);
  }

  public function send(Request $request){
    // DBへ保存
    $this->validate($request, Form::$rules);
    $item = new Form;
    $form = $request->all();
    unset($form['_token']);
    $item->fill($form)->save();

    // メール送信
    $name = $request->name;
    $text = $request->text;
    $to = $request->email;
    Mail::to($request->email)->send( new Admin($name, $text) );

    return redirect('form')->with('my_status', __('問い合わせを送信しました。お客様にも確認メールが送られます。'));
  }


}
