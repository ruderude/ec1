@extends('layouts.rootmy')

@section('main')
{{Form::open(['action' => 'RootController@edit', 'files' => true])}}
{{ csrf_field() }}
{{Form::hidden( 'id', $items->id)}}
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '商品名')}}
  {{Form::text('name', $items->name, ["class"=>"form-control", "placeholder"=>"一眼レフカメラ"])}}
</div>
<div class="form-group">
{{Form::label('exampleFormControlSelect1', 'メーカー')}}
  {{Form::text('manufacturer', $items->manufacturer, ["class"=>"form-control", "placeholder"=>"SONY"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '商品コード')}}
  {{Form::text('item_code', $items->item_code, ["class"=>"form-control", "placeholder"=>"1111"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '定価')}}
  {{Form::text('list_price', $items->list_price, ["class"=>"form-control", "placeholder"=>"30000"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '売値')}}
  {{Form::text('sale_price', $items->sale_price, ["class"=>"form-control", "placeholder"=>"19800"])}}
</div>
<div class="form-group">
   {{Form::label('exampleFormControlSelect1', 'カテゴリー')}}
   {{Form::select('category_id',
   array_pluck($categories, 'category_name', 'id'),
    $items->category_id,
    ["class"=>"form-control"]
    )}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '商品説明')}}
  {{Form::textarea('item_description', $items->item_description, ['class' => 'form-control', "placeholder"=>"新発売の商品です！", 'size' => '20x5'])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlSelect1', '状態')}}
  {{Form::select('state', [
   '0' => '販売中',
   '1' => '販売中止',
   '2' => '在庫切れ'],
   $items->state,
   ["class"=>"form-control"]
   )}}
</div>
<div class="form-group">
  <div class="custom-file m-auto">
    <input type="file" name="image_url1" class="custom-file-input" id="customFile1">
    <label class="custom-file-label" for="customFile1">商品画像1...</label>
  </div><br>
  <div class="custom-file m-auto">
    <input type="file" name="image_url2" class="custom-file-input" id="customFile2">
    <label class="custom-file-label" for="customFile2">商品画像2...</label>
  </div><br>
  <div class="custom-file m-auto">
    <input type="file" name="image_url3" class="custom-file-input" id="customFile3">
    <label class="custom-file-label" for="customFile3">商品画像3...</label>
  </div><br>
</div>
{{Form::submit('編集する', ['class' => 'btn btn-primary'])}}
<br>
{{Form::close()}}
@endsection
