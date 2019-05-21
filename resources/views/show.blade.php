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

        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="slider-pro" id="slider2">
                        <div class="sp-slides">
                          <!-- Slide 1 -->
                          <div class="sp-slide">
                            @if(null !== $items->image_url1)
                            <img class="sp-image" src="/storage/images/{{ $items->image_url1 }}" alt="第1スライド"/>
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
                </div>
                <div class="col-xs-6 card-body">
                    <div class="">
                      <div class="">商品名：</div>
                      <div class="h5">{{ $items->name }}</div>
                    </div>
                    <div class="">
                      <div class="">カテゴリー：</div>
                      <div class="h6">{{ $items->category->category_name }}</div>
                    </div>
                    <div class="">
                      <div class="">メーカー：</div>
                      <div class="h6">{{ $items->manufacturer }}</div>
                    </div>
                    <div class="">
                      <div class="">価格：</div>
                      <div class="h4 text-danger"><?php echo number_format($items->sale_price); ?>円</div>
                    </div>
                    <div class="">
                      <span class="small">全国一律</span>
                      <span class="lead text-danger">送料無料</span>
                    </div>

                    <form action="/cart" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $items->id }}">
                        <input type="hidden" name="_token" value="<?php echo session('_token'); ?>">

                      <div class="">
                        <div class="">個数：</div>
                        <div class="">
                            <select name="count" class="form-control" id="count" style="width:70px;">
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
                      <br>
                      <div class="">
                          <button type="submit" class="btn btn-danger"><span class="fas fa-cart-arrow-down"></span>カートに入れる</button>
                      </div>
                      <br>
                      <div class="">
                          <a href="<?php echo url()->previous(); ?>" class="card-link btn btn-primary"><span class="far fa-hand-point-left"></span>戻る</a>
                      </div>
                    </form>
                    </div>
                </div>
                <br>
                <div class="col-xs-12">
                    <div class="">
                      <div class="card-text">商品情報：</div>
                      <div class="card-text">{{ $items->item_description }}</div>
                    </div>
                    <ul class="list-group list-group-flush">
                      <!-- <li class="list-group-item">カテゴリー：{{ $items->category->category_name }}</li> -->
                      <!-- <li class="list-group-item">メーカー：{{ $items->manufacturer }}</li> -->
                      <li class="list-group-item">品番：{{ $items->item_code }}</li>
                    </ul>
                    <br>
                </div>

        </div>


    </div>
  </div>
</div>
<br>
@endsection
