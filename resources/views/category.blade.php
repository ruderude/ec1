@extends('layouts.my')

@section('title')
商品カテゴリー検索
@endsection

@section('main')
<div class="text-center text-white bg-dark">商品カテゴリー検索</div>
<br>
<div class="container">

  <div class="row">
    @php
      $numOfCols = 6;
      $rowCount = 0;
      $bootstrapColWidth = 12 / $numOfCols;
    @endphp
    @foreach ($categories as $category)
          @if ($category->parent_id === 0)
            <div class="col-<?php echo $bootstrapColWidth; ?>">
              <a href="/search?id={{ $category->id }}">
                <h6 class="card-title small fas fa-arrow-alt-circle-right">{{ $category->category_name }}</h6>
              </a>
            </div>
            @php
            $rowCount++;
            if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
            @endphp
          @endif

    @endforeach
  </div>


  <div class="row">
    @php
      $numOfCols = 3;
      $rowCount = 0;
      $bootstrapColWidth = 12 / $numOfCols;
    @endphp
    @foreach ($items as $item)

      <div class="col-md-<?php echo $bootstrapColWidth; ?>">
        <a href="/show?id={{ $item->id }}">
          <img class="card-img-top" src="./storage/images/{{ $item->image_url1 }}" alt="">
        </a>
        <div class="card-body">
          <h4 class="card-title">{{ $item->name }}</h4>
          <!-- <p class="card-text">{{ $item->item_description }}</p> -->
          <!-- <p class="card-text">定価：{{ $item->list_price }}</p> -->
          <h6 class="card-text text-danger">価格(税込)：<?php echo number_format($item->sale_price); ?>円</h6>
          <a href="/show?id={{ $item->id }}" class="card-text">詳細を見る</a>
          <!-- <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p> -->
        </div>
      </div>
      @php
        $rowCount++;
        if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
      @endphp

    @endforeach
  </div>

</div>
@endsection
