@extends('layouts.rootmy')

@section('main')
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
        <a href="/admin/show?id={{ $item->id }}">
          <img class="card-img-top" src="/storage/images/{{ $item->image_url1 }}" alt="">
        </a>
        <div class="card-body">
          <h4 class="card-title">{{ $item->name }}</h4>
          <!-- <p class="card-text">{{ $item->item_description }}</p> -->
          <p class="card-text">定価：<?php echo number_format($item->list_price); ?>円</p>
          <p class="text-danger">税込価格：<?php echo number_format($item->sale_price); ?>円</p>
          <a href="/admin/show?id={{ $item->id }}" class="card-text">詳細を見る</a>
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
        </div>
      </div>
      @php
      $rowCount++;
      if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
      @endphp

@endforeach
</div>
{{ $items->links() }}
</div>
@endsection
