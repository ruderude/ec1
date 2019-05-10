@extends('layouts.my')

@section('title')
ご注文完了ページ
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
<div class="text-center text-white bg-dark">買い物かご</div>
<br>
<h2>ご注文ありがとうございました。</h2>
<div class="container">
  <a href="/" class="card-link btn btn-danger">トップに戻る</a>
</div>

@endsection
