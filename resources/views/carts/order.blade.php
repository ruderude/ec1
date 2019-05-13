@extends('layouts.my')

@section('title')
ショッピングカート（注文画面）
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
<div class="text-center text-white bg-dark">確認画面</div>
<br>
<h2>以下の情報で注文を確定しますか？</h2>
<div class="container">

  <div class="row">
      <div class="col-xs-2 m-auto">
        <p class="card-title m-auto"></p>
      </div>
      <div class="col-xs-4 m-auto">
        <p class="card-title m-auto">商品情報</p>
      </div>
      <div class="col-xs-2 m-auto">
        <p class="card-title m-auto">&emsp;個数</p>
      </div>
      <div class="col-xs-2 m-auto">
        <p class="card-title m-auto">&emsp;合計金額</p>
      </div>
  </div>
  <br>
  @if (!isset($items[0]))
    <br>
    <p>カートの中に商品は入っていません。</p>
  @endif

  @foreach ($items as $item)

    <div class="row">
        <div class="col-xs-2 m-auto">
          <a href="/show?id={{ $item->item_id }}">
            <img class="card-img-top" src="/storage/images/{{ $item->image_url1 }}" alt="" style="width:80px;">
          </a>
        </div>
        <div class="col-xs-4 m-auto">
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
          <p class="card-title">{{ $item->name }}</p>
          <!-- <p class="card-text">定価：{{ $item->list_price }}</p> -->
          <p class="card-text text-danger">特価：{{ $item->sale_price }}</p>
        </div>
        <div class="col-xs-2 m-auto">
            <div class="col-xs-2 m-auto">
              <p>{{ $item->counts }}個</p>
            </div>
        </div>
        <div class="col-xs-2 m-auto">
          <p>{{ $item->total_price }}円</p>

        </div>

    </div>
    <br>

  @endforeach
  <div class="card-footer text-right lead">
    {{ __('合計金額') }}：<?php echo $sales['sale_price'] ?>円
  </div>
  <br>
  <div class="card-header bg-dark text-white">{{ __('配送先住所') }}</div>

  <div class="card-body">

          <div class="form-group row">
              <label for="name_kanji" class="col-md-4 col-form-label text-md-right">{{ __('名前（漢字）') }}<span style="color:tomato;">※必須</span></label>
              <div class="col-md-6">
                  <h5><?php echo $sales['name_kanji'] ?></h5>
              </div>
          </div>

          <div class="form-group row">
              <label for="name_kana" class="col-md-4 col-form-label text-md-right">{{ __('名前（カナ）') }}<span style="color:tomato;">※必須</span></label>
              <div class="col-md-6">
                  <h5><?php echo $sales['name_kana'] ?></h5>
              </div>
          </div>


          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}<span style="color:tomato;">※必須</span></label>
              <div class="col-md-6">
                  <h5><?php echo $sales['email'] ?></h5>
              </div>
          </div>

          <div class="form-group row">
            <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('支払い方法') }}<span style="color:tomato;">※必須</span></label>
            <div class="col-md-6">
                <h5><?php echo $sales['payment'] ?></h5>
            </div>
          </div>

          <div class="form-group row">
              <label for="send_postal" class="col-md-4 col-form-label text-md-right @error('postal') is-invalid @enderror">{{ __('郵便番号') }}<span style="color:tomato;">※必須</span></label>
              <div class="col-md-6">
                  <h5><?php echo $sales['send_postal'] ?></h5>
              </div>
          </div>


          <div class="form-group row">
            <label for="send_prefectures" class="col-md-4 col-form-label text-md-right @error('prefectures') is-invalid @enderror">{{ __('都道府県') }}<span style="color:tomato;">※必須</span></label>
            <div class="col-md-6">
                <h5><?php echo $sales['send_prefectures'] ?></h5>
            </div>
          </div>

          <div class="form-group row">
              <label for="send_address1" class="col-md-4 col-form-label text-md-right">{{ __('住所１') }}<span style="color:tomato;">※必須</span></label>
              <div class="col-md-6">
                  <h5><?php echo $sales['send_address1'] ?></h5>
              </div>
          </div>

          <div class="form-group row">
              <label for="send_address2" class="col-md-4 col-form-label text-md-right">{{ __('住所２') }}</label>
              <div class="col-md-6">
                  <h5><?php echo $sales['send_address2'] ?></h5>
              </div>
          </div>

          <div class="form-group">
            <label for="description">備考：</label>
            <div class="col-md-6">
                <h5><?php echo $sales['description'] ?></h5>
            </div>
          </div>

          <form method="post" action="/finish">
            {{ csrf_field() }}
            <input type="hidden" name="name_kanji" value="<?php echo $sales['name_kanji'] ?>">
            <input type="hidden" name="name_kana" value="<?php echo $sales['name_kana'] ?>">
            <input type="hidden" name="email" value="<?php echo $sales['email'] ?>">
            <input type="hidden" name="payment" value="<?php echo $sales['payment'] ?>">
            <input type="hidden" name="send_postal" value="<?php echo $sales['send_postal'] ?>">
            <input type="hidden" name="send_prefectures" value="<?php echo $sales['send_prefectures'] ?>">
            <input type="hidden" name="send_address1" value="<?php echo $sales['send_address1'] ?>">
            <input type="hidden" name="send_address2" value="<?php echo $sales['send_address2'] ?>">
            <input type="hidden" name="description" value="<?php echo $sales['description'] ?>">
          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-success" style="width:150px;">
                      {{ __('注文を確定する') }}
                  </button>
              </div>
          </div>
        </form>
  </div>

</div>
<br>
@endsection
