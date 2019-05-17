@extends('layouts.rootmy')

@section('main')
{{Form::open(['action' => 'RootController@store', 'files' => true])}}
{{ csrf_field() }}
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '商品名')}}
  {{Form::text('name', Form::old('name'), ["class"=>"form-control", "placeholder"=>"一眼レフカメラ"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlSelect1', 'メーカー')}}
  {{Form::text('manufacturer', Form::old('manufacturer'), ["class"=>"form-control", "placeholder"=>"SONY"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '商品コード')}}
  {{Form::text('item_code', Form::old('item_code'), ["class"=>"form-control", "placeholder"=>"1111"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '定価')}}
  {{Form::text('list_price', Form::old('list_price'), ["class"=>"form-control", "placeholder"=>"30000"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '売値')}}
  {{Form::text('sale_price', Form::old('sale_price'), ["class"=>"form-control", "placeholder"=>"19800"])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlSelect1', 'カテゴリー')}}
  {{Form::select('category_id',
  array_pluck($categories, 'category_name', 'id'),
   Form::old('category_id'),
   ["class"=>"form-control"]
   )}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlInput1', '商品説明')}}
  {{Form::textarea('item_description', Form::old('item_description'), ['class' => 'form-control', "placeholder"=>"新発売の商品です！", 'size' => '20x5'])}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlSelect1', '状態')}}
  {{Form::select('state', [
   '0' => '販売中',
   '1' => '販売中止',
   '2' => '在庫切れ'],
   Form::old('state'),
   ["class"=>"form-control"]
   )}}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlFile1', '商品画像1')}}
  {{ Form::file('image_url1'), ['class' => 'form-control-file'] }}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlFile1', '商品画像2')}}
  {{ Form::file('image_url2'), ['class' => 'form-control-file'] }}
</div>
<div class="form-group">
  {{Form::label('exampleFormControlFile1', '商品画像3')}}
  {{ Form::file('image_url3'), ['class' => 'form-control-file'] }}
</div><br>
{{Form::submit('Save', ['class' => 'btn btn-primary'])}}
<br>
{{Form::close()}}
@endsection
