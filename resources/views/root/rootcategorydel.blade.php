@extends('layouts.rootmy')

@section('main')
<br>
<div>
  <p>カテゴリー名</p>
  <h4>{{$category->category_name}}</h4>
  <p>親カテゴリー</p>
  <h4></h4>
  <p>このカテゴリーを削除しますか？</p>
  {{Form::open(['action' => 'RootController@categoryremove'])}}
  {{ csrf_field() }}
  {{Form::hidden( 'id', $category->id)}}
  {{Form::submit('削除する', ['class' => 'card-link btn btn-danger'])}}
  {{Form::close()}}
  <div class="card-body">
    <a href="<?php echo url()->previous(); ?>" class="card-link btn btn-primary">戻る</a>
    <a href="/admin/categoryedit?id={{ $category->id }}" class="card-link btn btn-primary">編集する</a>
  </div>
</div>
@endsection
