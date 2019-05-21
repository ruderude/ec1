@extends('layouts.rootmy')

@section('main')
<div class="text-center text-white bg-dark">商品詳細</div>
<br>
<div class="container">
  <div class="row">
    <div class="card mx-auto">
      <div class="slider-pro" id="slider2">
        <div class="sp-slides">
          <!-- Slide 1 -->
          <div class="sp-slide">
            @if(null !== $items->image_url1)
            <img class="sp-image" src="/storage/images/{{ $items->image_url1 }}" style="height:100%;" alt="第1スライド"/>
            @else
            <img class="sp-image" src="/storage/images/noimage.png" alt="第1スライド"/>
            @endif
          </div>
          <!-- Slide 2 -->
          <div class="sp-slide">
            @if(null !== $items->image_url2)
            <img class="sp-image" src="/storage/images/{{ $items->image_url2 }}" alt="第2スライド"/>
            @else
            <img class="sp-image" src="/storage/images/noimage.png" alt="第2スライド"/>
            @endif
          </div>
          <!-- Slide 3 -->
          <div class="sp-slide">
            @if(null !== $items->image_url3)
            <img class="sp-image" src="/storage/images/{{ $items->image_url3 }}" alt="第3スライド"/>
            @else
            <img class="sp-image" src="/storage/images/noimage.png" alt="第3スライド"/>
            @endif
          </div>
    </div>

        <div class="sp-thumbnails">
          @if(null !== $items->image_url1)
          <img class="sp-thumbnail" src="/storage/images/{{ $items->image_url1 }}" alt="第1スライド"/>
          @else
          <img class="sp-thumbnail" src="/storage/images/noimage.png" alt="第1スライド"/>
          @endif

          @if(null !== $items->image_url2)
          <img class="sp-thumbnail" src="/storage/images/{{ $items->image_url2 }}" alt="第2スライド"/>
          @else
          <img class="sp-thumbnail" src="/storage/images/noimage.png" alt="第2スライド"/>
          @endif

          @if(null !== $items->image_url3)
          <img class="sp-thumbnail" src="/storage/images/{{ $items->image_url3 }}" alt="第3スライド"/>
          @else
          <img class="sp-thumbnail" src="/storage/images/noimage.png" alt="第3スライド"/>
          @endif

          </div>
        </div>




    <div class="card-body">
      <h5 class="card-title">商品名：{{ $items->name }}</h5>
      <p class="card-text">商品説明：{{ $items->item_description }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">カテゴリー：{{ $items->category->category_name }}</li>
      <li class="list-group-item">メーカー：{{ $items->manufacturer }}</li>
      <li class="list-group-item">品番：{{ $items->item_code }}</li>
      <li class="list-group-item">定価：{{ $items->list_price }}</li>
      <li class="list-group-item text-danger">価格：{{ $items->sale_price }}</li>
    </ul>
    <div class="card-body">
      <a href="<?php echo url()->previous(); ?>" class="card-link btn btn-primary">戻る</a>
      <a href="/admin/edit?id={{ $items->id }}" class="card-link btn btn-primary">編集する</a>
      <a href="/admin/del?id={{ $items->id }}" class="card-link btn btn-danger">削除する</a>
    </div>


  </div>
</div><br>
@endsection
