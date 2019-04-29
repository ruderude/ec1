@extends('layouts.my')

@section('title')
商品一覧
@endsection

@section('list')
<div class="text-center text-white bg-dark">商品一覧</div>
<br>
@foreach ($items as $item)
  @if ($loop->iteration % 3 == 1)

    <div class="card-deck">
      <div class="card">
        <img class="card-img-top" src="img/{{ $item->image_url1 }}" alt="">
        <div class="card-body">
          <h4 class="card-title">{{ $item->name }}</h4>
          <p class="card-text">{{ $item->item_description }}</p>
          <p class="card-text">定価：{{ $item->list_price }}</p>
          <p class="card-text">特化：{{ $item->sale_price }}</p>
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
        </div>
      </div>
  @elseif ($loop->iteration % 3 == 2)
      <div class="card">
        <img class="card-img-top" src="img/{{ $item->image_url1 }}" alt="">
        <div class="card-body">
          <h4 class="card-title">{{ $item->name }}</h4>
          <p class="card-text">{{ $item->item_description }}</p>
          <p class="card-text">定価：{{ $item->list_price }}</p>
          <p class="card-text">特化：{{ $item->sale_price }}</p>
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
        </div>
      </div>
  @elseif ($loop->iteration % 3 == 0)
      <div class="card">
        <img class="card-img-top" src="img/{{ $item->image_url1 }}" alt="">
        <div class="card-body">
          <h4 class="card-title">{{ $item->name }}</h4>
          <p class="card-text">{{ $item->item_description }}</p>
          <p class="card-text">定価：{{ $item->list_price }}</p>
          <p class="card-text">特化：{{ $item->sale_price }}</p>
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
        </div>
      </div>
    </div><br>
  @endif
@endforeach
@endsection
