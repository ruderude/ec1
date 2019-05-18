@extends('layouts.my')

@section('title')
詳細ページ
@endsection

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
    <br>

    <div class="container">

      <form action="/cart" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $items->id }}">
        <input type="hidden" name="_token" value="<?php echo session('_token'); ?>">

      <div class="row">
          <div class="form-group col-xs-4 m-auto">
            <div class="form-group row">
              <label for="count" class="col-form-label">個数&emsp;</label>
              <select name="count" class="form-control" id="count" style="width:50px;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
              </select>
            </div>
          </div>

          <div class="form-group col-xs-4 m-auto">
            <label></label>
            <button type="submit" class="btn btn-danger">カートに入れる</button>
          </div>

          <div class="form-group col-xs-4 m-auto">
            <label></label>
            <a href="<?php echo url()->previous(); ?>" class="card-link btn btn-primary">戻る</a>
          </div>
      </div>
      </form>


    </div>


  </div>
</div>
</div><br>
@endsection
