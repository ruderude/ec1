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
<div class="row m-auto">
  <h6 class="col-3">カテゴリー名</h6>
  <span class="col-3">親カテゴリ</span>
  <div class="col-6 m-auto"></div>
  <br>
  @foreach ($categories as $cotegory)

        <div class="col-3">
          <h6>{{ $cotegory->category_name }}</h6>
        </div>
        @if ($cotegory->parent_id === 0)
          <span class="col-3">なし</span>
        @else
          <span class="col-3">{{ $cotegory->parent['category_name'] }}</span>
        @endif
        <div class="col-6 row">
          <div class="col-6">
            <a href="/admin/categoryedit?id={{ $cotegory->id }}" class="btn btn-primary">編集</a>
          </div>
          <div class="col-6">
            <a href="/admin/categorydel?id={{ $cotegory->id }}" class="btn btn-danger">削除</a>
          </div>
        </div><br><br>

  @endforeach
</div>
@endsection
