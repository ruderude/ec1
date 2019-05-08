@extends('layouts.my')

@section('title')
ショッピングカート
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
<div class="text-center text-white bg-dark">買い物かご</div>
<br>
<h2>以下の商品が買い物かごに入っています。</h2>
<div class="container">

@foreach ($items as $item)

<div class="row">

  <div class="col-xs-4">
    <a href="/show?id={{ $item->id }}">
      <img class="card-img-top" src="/storage/images/{{ $item->image_url1 }}" alt="">
    </a>
  </div>
  <div class="col-xs-5">
    <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
    <h4 class="card-title">{{ $item->name }}</h4>
    <!-- <p class="card-text">定価：{{ $item->list_price }}</p> -->
    <h5 class="card-text text-danger">特価：{{ $item->sale_price }}</h5>
  </div>
  <div class="col-xs-3">
    <form>
      <button type="submit" class="btn btn-danger">削除</button>
    </form>
  </div>

</div>
@endforeach
</div>

@endsection
