@extends('layouts.rootmy')

@section('main')
<br>
{{Form::open(['action' => 'RootController@categorystore'])}}
{{ csrf_field() }}
  <div class="form-group">
    {{Form::label('exampleFormControlInput1', '新規カテゴリー')}}
    {{Form::text('category_name', Form::old('category_name'), ["class"=>"form-control", "placeholder"=>"AV機器"])}}
  </div>
  <div class="form-group">
    {{Form::label('exampleFormControlSelect1', '親カテゴリー')}}
    {{Form::select('parent_id',
    ['0' => '親カテゴリーなし']+array_pluck($categories, 'category_name', 'id'),
     null,
     ["class"=>"form-control"]
     )}}
  </div>
{{Form::hidden( 'state', 0)}}
{{Form::submit('カテゴリー追加', ['class' => 'btn btn-primary'])}}
{{Form::close()}}
<br>
<div class="row m-auto">
  <div class="col-3" style="font-size:0.8em;">カテゴリー名</div>
  <span class="col-3" style="font-size:0.8em;">親カテゴリ</span>
  <div class="col-6 m-auto"></div>
  <br><br>
  @foreach ($categories as $cotegory)

        <div class="col-3" style="font-size:0.8em;">
          <div>{{ $cotegory->category_name }}</div>
        </div>
        @if ($cotegory->parent_id === 0)
          <span class="col-3" style="font-size:0.8em;">なし</span>
        @else
          <span class="col-3" style="font-size:0.8em;">{{ $cotegory->parent['category_name'] }}</span>
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
