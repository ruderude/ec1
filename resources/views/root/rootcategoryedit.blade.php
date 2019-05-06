@extends('layouts.rootmy')

@section('main')
<br>
{{Form::open(['action' => 'RootController@categoryupdate'])}}
{{ csrf_field() }}
{{Form::hidden( 'id', $category->id)}}
  <div class="form-group">
    {{Form::label('exampleFormControlInput1', 'カテゴリー名を編集する')}}
    {{Form::text('category_name', $category->category_name, ["class"=>"form-control"])}}
  </div>
  <div class="form-group">
    {{Form::label('exampleFormControlSelect1', '親カテゴリー')}}
    {{Form::select('parent_id',
    ['0' => '親カテゴリーなし']+array_pluck($categories, 'category_name', 'id'),
     $category->parent_id,
     ["class"=>"form-control"]
     )}}
  </div>
{{Form::hidden( 'state', 0)}}
{{Form::submit('カテゴリー編集', ['class' => 'btn btn-primary'])}}
{{Form::close()}}
<br>
@foreach ($categories as $cotegory)
<div class="row card-body">
  <h4 class="card-body col-lg-6" p-auto m-auto>{{$cotegory->category_name}}</h4>
  <div class="row card-body col-lg-6 p-auto m-auto">
    <a href="/root/categoryedit?id={{ $cotegory->id }}" class="card-link col-lg-3 p-auto m-auto btn btn-primary" style="width: 100px;">編集する</a>
    <a href="/root/categorydel?id={{ $cotegory->id }}" class="card-link col-lg-3 p-auto m-auto btn btn-danger" style="width: 100px;">削除する</a>
  </div>
</div>
@endforeach
@endsection
