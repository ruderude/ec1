<?php

namespace App\Http\Controllers;

use App\Item;
use App\Fee;
use App\Category;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index(Request $request){
        $fees = Fee::all();
        $categories = Category::all();
        return view('root.fee', ['fees' => $fees, 'categories' => $categories]);
    }

    public function create(Request $request){
        $fees = Fee::all();
        $categories = Category::all();
        return view('root.feecreate', ['fees' => $fees, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
      // DBへ保存
      $this->validate($request, Fee::$rules);
      $fee = new Fee;

      $form = $request->all();
      unset($form['_token']);

      $fee->fill($form)->save();
      return redirect('admin/fee')->with('my_status', __('アップロードが完了しました。'));

    }

    public function edit(Request $request){
        $fees = Fee::all();
        $fee = Fee::find($request->id);
        $categories = Category::all();
        return view('root.feeedit', ['fees' => $fees, 'fee' => $fee, 'categories' => $categories]);
    }

    public function update(Request $request){
        $this->validate($request, Fee::$rules);
        $fee = Fee::find($request->id);
        $form = $request->all();
        unset($form['_token']);

        $fee->fill($form)->save();
        return redirect('admin/fee')->with('my_status', __('編集が完了しました。'));

    }

    public function del(Request $request){
        Fee::find($request->id)->delete();
        return redirect('admin/fee')->with('my_status', __('削除しました。'));
    }

}
