@extends('layouts.my')

@section('title')
トップページ
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
<div class="text-center text-white bg-dark">商品一覧</div>
<br>
<div class="container">
<div class="row">
@php
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
@endphp
@foreach ($items as $item)

      <div class="col-md-<?php echo $bootstrapColWidth; ?>">
        <a href="/show?id={{ $item->id }}">
          <img class="card-img-top" src="/storage/images/{{ $item->image_url1 }}" alt="">
        </a>
        <div class="card-body">
          <h4 class="card-title">{{ $item->name }}</h4>
          <p class="card-text">{{ $item->item_description }}</p>
          <p class="card-text">定価：{{ $item->list_price }}</p>
          <h5 class="card-text text-danger">特価：{{ $item->sale_price }}</h5>
          <a href="./show?id={{ $item->id }}" class="card-text">詳細を見る</a>
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
        </div>
      </div>
      @php
      $rowCount++;
      if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
      @endphp

@endforeach
</div></div>
@endsection
