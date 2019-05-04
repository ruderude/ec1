@extends('layouts.my')

@section('title')
音合わせページ
@endsection

@section('main')
{{-- フラッシュ・メッセージ --}}
@if (session('my_status'))
    <div class="container mt-2">
        <div class="alert alert-success">
            {{ session('my_status') }}
        </div>
    </div>
@endif

@if (count($errors) > 0)
<div class="container mt-2">
  <ul>
    @foreach ($errors->all() as $error)
    <li class="alert alert-danger">{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<h3>◆お問い合わせ◆</h3>
<div>
<p>気になったところがありましたらお気軽にお問い合わせください。</p>
</div>
<br>
{{Form::open(['action' => 'InfoController@form', 'files' => true])}}
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputText1">お名前：<span style="color: tomato">※必須</span></label>
    <input name="name" type="text" class="form-control" id="exampleInputText1" placeholder="ユニプラ太郎">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Eメールアドレス：<span style="color: tomato">※必須</span></label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Eメールアドレス">
    <small class="text-muted">あなたのメールは他の誰とも共有しません。</small>
  </div>
  <div class="form-group">
    <label>問い合わせ内容：<span style="color: tomato">※必須</span></label>
    <textarea name="text" class="form-control" cols="50" rows="10"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">送信する</button>
{{Form::close()}}
<br>
@endsection
