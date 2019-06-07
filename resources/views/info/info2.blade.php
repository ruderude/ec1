@extends('layouts.my')

@section('title')
特定商取引法に基づく表示
@endsection

@section('main')
<div class="container">
  <div class="jumbotron mt-4" style='background-image: url("{{ asset('img/businesswoman.png') }}");
    background-size: cover;
    background-position: center 10%;'>
    <h4>特定商取引法に基づく表示</h4>
    <h1 class="display-4">RUDE商会</h1>
    <p class="lead">特定商取引法に基づく表示特定商取引法に基づく表示特定商取引法に基づく表示特定商取引法に基づく表示特定商取引法に基づく表示</p>
    <hr class="my-4">
    <p>特定商取引法に基づく表示特定商取引法に基づく表示特定商取引法に基づく表示特定商取引法に基づく表示特定商取引法に基づく表示</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">もっと見る</a>
  </div>
  ...
</div>
@endsection
