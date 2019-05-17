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
<div class="row card-body">
  <h4 class="card-body col-lg-3" p-auto m-auto>カテゴリー名</h4>
  <span class="card-body col-lg-3" p-auto m-auto>親カテゴリー</span>
  <div class="row card-body col-lg-6 p-auto m-auto">
</div>
@foreach ($categories as $cotegory)
<div class="row card-body">
  <h4 class="card-body col-lg-3" p-auto m-auto>{{ $cotegory->category_name }}</h4>
  @if ($cotegory->parent_id === 0)
  <span class="card-body col-lg-3" p-auto m-auto>なし</span>
  @else
  <span class="card-body col-lg-3" p-auto m-auto>{{ $cotegory->parent['category_name'] }}</span>
  @endif
  <div class="row card-body col-lg-6 p-auto m-auto">
    <a href="/admin/categoryedit?id={{ $cotegory->id }}" class="card-link col-lg-3 p-auto m-auto btn btn-primary" style="width: 100px;">編集する</a>
    <a href="/admin/categorydel?id={{ $cotegory->id }}" class="card-link col-lg-3 p-auto m-auto btn btn-danger" style="width: 100px;">削除する</a>
  </div>
</div>
@endforeach
@endsection
