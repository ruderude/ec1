@extends('layouts.rootmy')

@section('main')
<div class="text-center text-white bg-dark">商品詳細</div>
<br>
<div class="container">
<div class="row">

  <div class="card mx-auto">
    <div class="slider">
      @if(null !== $items->image_url1)
      <div><img src="/storage/images/{{ $items->image_url1 }}" class="card-img-top" alt="カードの画像"></div>
      @else
      <div><img src="/storage/images/noimage.png" class="card-img-top" alt="カードの画像"></div>
      @endif
      @if(null !== $items->image_url2)
      <div><img src="/storage/images/{{ $items->image_url2 }}" class="card-img-top" alt="カードの画像"></div>
      @else
      <div><img src="/storage/images/noimage.png" class="card-img-top" alt="カードの画像"></div>
      @endif
      @if(null !== $items->image_url3)
      <div><img src="/storage/images/{{ $items->image_url3 }}" class="card-img-top" alt="カードの画像"></div>
      @else
      <div><img src="/storage/images/noimage.png" class="card-img-top" alt="カードの画像"></div>
      @endif
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
      <li class="list-group-item">価格：{{ $items->sale_price }}</li>
    </ul>
    <div class="card-body">
      <a href="<?php echo url()->previous(); ?>" class="card-link btn btn-primary">戻る</a>
      <a href="/rootedit?id={{ $items->id }}" class="card-link btn btn-primary">編集する</a>
      <a href="/rootdel?id={{ $items->id }}" class="card-link btn btn-danger">削除する</a>
    </div>


</div>
</div><br>
@endsection
