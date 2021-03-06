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
      <li class="list-group-item">カテゴリー：{{ $items->category_id }}</li>
      <li class="list-group-item">メーカー：{{ $items->manufacturer }}</li>
      <li class="list-group-item">品番：{{ $items->item_code }}</li>
      <li class="list-group-item">定価：<?php echo number_format($items->list_price); ?>円</li>
      <li class="list-group-item">税込価格：<?php echo number_format($items->sale_price); ?>円</li>
    </ul>
    <h1 class="text-danger">この商品を削除しますか？</h1>
    <div class="card-body">
      {{Form::open(['action' => 'RootController@remove'])}}
      {{ csrf_field() }}
      {{Form::hidden( 'id', $items->id)}}
      {{Form::submit('削除する', ['class' => 'card-link btn btn-danger'])}}
      {{Form::close()}}
    </div>
    <div class="card-body">
      <a href="<?php echo url()->previous(); ?>" class="card-link btn btn-primary">戻る</a>
      <a href="/admin/edit?id={{ $items->id }}" class="card-link btn btn-primary">編集する</a>
  </div>


</div>
</div><br>
@endsection
