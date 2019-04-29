@extends('layouts.rootmy')

@section('items')
<form>
<div class="form-group">
  <label for="exampleFormControlInput1">商品名</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="一眼レフカメラ">
</div>
<div class="form-group">
  <label for="exampleFormControlSelect1">メーカー</label>
  <select class="form-control" id="exampleFormControlSelect1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
  </select>
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">商品コード</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="1111">
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">定価</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="30000">
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">売値</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="19800">
</div>
<div class="form-group">
  <label for="exampleFormControlSelect1">カテゴリー</label>
  <select class="form-control" id="exampleFormControlSelect1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
  </select>
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">商品説明</label>
  <input type="textarea" class="form-control" id="exampleFormControlInput1" placeholder="新発売の商品です！">
</div>
<div class="form-group">
  <label for="exampleFormControlSelect1">状態</label>
  <select class="form-control" id="exampleFormControlSelect1">
    <option>販売中</option>
    <option>販売中止</option>
    <option>在庫切れ</option>
  </select>
</div>
<div class="form-group">
  <label for="exampleFormControlFile1">商品画像1</label>
  <input type="file" class="form-control-file" id="exampleFormControlFile1">
</div>
<div class="form-group">
  <label for="exampleFormControlFile1">商品画像2</label>
  <input type="file" class="form-control-file" id="exampleFormControlFile1">
</div>
<div class="form-group">
  <label for="exampleFormControlFile1">商品画像3</label>
  <input type="file" class="form-control-file" id="exampleFormControlFile1">
</div>
</form>
@endsection
