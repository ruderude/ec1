@extends('layouts.my')

@section('title')
会社紹介ページ
@endsection

@section('main')
<div class="container">
  <div class="jumbotron mt-4" style='background-image: url("{{ asset('img/publicdomainq-0003866zev.jpg') }}");
    background-size: cover;
    background-position: center 60%;'>
    <h4>会社紹介</h4>
    <h1 class="display-4">RUDE商会</h1>
    <p class="lead">会社紹介本文会社紹介本文会社紹介本文会社紹介本文会社紹介本文会社紹介本文会社紹介本文</p>
    <hr class="my-4">
    <p>会社紹介本文会社紹介本文会社紹介本文会社紹介本文会社紹介本文会社紹介本文会社紹介本文</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">もっと見る</a>
  </div>
  ...
</div>
@endsection
