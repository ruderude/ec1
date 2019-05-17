@extends('layouts.my')

@section('title')
ご利用案内のページ
@endsection

@section('main')
<div class="container">
  <div class="jumbotron mt-4" style='background-image: url("{{ asset('img/businesswoman.png') }}");
    background-size: cover;
    background-position: center 10%;'>
    <h4>ご利用案内</h4>
    <h1 class="display-4">red house</h1>
    <p class="lead">ご利用案内ご利用案内ご利用案内ご利用案内ご利用案内ご利用案内</p>
    <hr class="my-4">
    <p>ご利用案内ご利用案内ご利用案内ご利用案内ご利用案内ご利用案内</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">もっと見る</a>
  </div>
  ...
</div>
@endsection
