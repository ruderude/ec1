<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class RootController extends Controller
{
  public function index(Request $request){
    $items = Item::orderBy('id', 'desc')->get();
    $categories = Category::all();
    return view('root.root', ['items' => $items, 'categories' => $categories]);
  }

  public function items(Request $request){
    $categories = Category::all();
    return view('root.rootitems', ['categories' => $categories]);
  }

  public function show(Request $request){
    $items = Item::find($request->id);
    $categories = Category::all();
    return view('root.rootshow', ['items' => $items, 'categories' => $categories]);
  }

  public function store(Request $request)
  {
    // DBへ保存
    $this->validate($request, Item::$rules);
    $item = new Item;

    $form = $request->all();
    unset($form['_token']);

    // 画像をstorage/app/public/imagesに保存
    if( null !== $request->file('image_url1')) {
    $name = str_shuffle(time()) . date( "YmdHis" ) . '.' . $request->file('image_url1')->getClientOriginalExtension();
    $request->file('image_url1')->storeAs('images', $name, 'public');
    $form['image_url1'] = $name;
    }
    if( null !== $request->file('image_url2')) {
    $name2 = str_shuffle(time()) . date( "YmdHis" ) . '.' . $request->file('image_url2')->getClientOriginalExtension();
    $request->file('image_url2')->storeAs('images', $name2, 'public');
    $form['image_url2'] = $name2;
    }
    if( null !== $request->file('image_url3')) {
    $name3 = str_shuffle(time()) . date( "YmdHis" ) . '.' . $request->file('image_url3')->getClientOriginalExtension();
    $request->file('image_url3')->storeAs('images', $name3, 'public');
    $form['image_url3'] = $name3;
    }

    $item->fill($form)->save();
    return redirect('admin/items')->with('my_status', __('アップロードが完了しました。'));

  }

  public function edit(Request $request){
    $items = Item::find($request->id);
    $categories = Category::all();
    return view('root.rootedit', ['items' => $items, 'categories' => $categories]);
  }

  public function update(Request $request){
    $this->validate($request, Item::$rules);
    $items = Item::find($request->id);
    $form = $request->all();
    unset($form['_token']);

    // 画像をstorage/app/public/imagesに保存
    if( null !== $request->file('image_url1')) {
    $name = str_shuffle(time()) . date( "YmdHis" ) . '.' . $request->file('image_url1')->getClientOriginalExtension();
    $request->file('image_url1')->storeAs('images', $name, 'public');
    $form['image_url1'] = $name;
    }
    if( null !== $request->file('image_url2')) {
    $name2 = str_shuffle(time()) . date( "YmdHis" ) . '.' . $request->file('image_url2')->getClientOriginalExtension();
    $request->file('image_url2')->storeAs('images', $name2, 'public');
    $form['image_url2'] = $name2;
    }
    if( null !== $request->file('image_url3')) {
    $name3 = str_shuffle(time()) . date( "YmdHis" ) . '.' . $request->file('image_url3')->getClientOriginalExtension();
    $request->file('image_url3')->storeAs('images', $name3, 'public');
    $form['image_url3'] = $name3;
    }

    $items->fill($form)->save();
    $url = '/admin/show?id=' . $items->id;
    return redirect($url)->with('my_status', __('編集が完了しました。'));

  }

  public function del(Request $request){
    $items = Item::find($request->id);
    $categories = Category::all();
    return view('root.rootdel', ['items' => $items, 'categories' => $categories]);
  }

  public function remove(Request $request){
    Item::find($request->id)->delete();
    return redirect('admin')->with('my_status', __('削除しました。'));
  }

  public function category(Request $request){
    $categories = Category::all();
    return view('root.rootcategory', ['categories' => $categories]);
  }

  public function categorystore(Request $request){
    // DBへ保存
    $this->validate($request, Category::$rules);
    $cotegory = new Category;
    $form = $request->all();
    unset($form['_token']);
    $cotegory->fill($form)->save();
    return redirect('admin/category')->with('my_status', __('カテゴリーが追加されました。'));
  }

  public function categoryedit(Request $request){
    $category = Category::find($request->id);
    $categories = Category::all();
    return view('root.rootcategoryedit', ['category' => $category, 'categories' => $categories]);
  }

  public function categoryupdate(Request $request){
    $this->validate($request, Category::$rules);
    $category = Category::find($request->id);
    $form = $request->all();
    unset($form['_token']);
    $category->fill($form)->save();
    return redirect('admin/category')->with('my_status', __('カテゴリー編集が完了しました。'));

  }

  public function categorydel(Request $request){
    $categories = Category::all();
    $category = Category::find($request->id);
    return view('root.rootcategorydel', ['category' => $category, 'categories' => $categories]);
  }

  public function categoryremove(Request $request){
    Category::find($request->id)->delete();
    return redirect('admin/category')->with('my_status', __('カテゴリーを削除しました。'));
  }

  public function search(Request $request){
    $items = Item::where('category_id', $request->id)->orderBy('id', 'desc')->get();
    $categories = Category::all();
    return view('root.rootsearch', ['items' => $items, 'categories' => $categories]);
  }


}
