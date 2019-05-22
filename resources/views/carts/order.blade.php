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

@foreach ($items as $item)

  <div class="row border-bottom">
      <div class="col-6">
          <a href="/show?id={{ $item['id'] }}">
              <img class="card-img-top" src="/storage/images/{{ $item['image_url1'] }}" alt="" style="width:80px;">
          </a>
      </div>
      <div class="col-6">
          <p class="card-text"><small class="text-muted">品番：{{ $item['item_code'] }}</small></p>
          <p class="card-title">{{ $item['name'] }}</p>
          <p class="card-text text-danger">税込価格：<?php echo number_format($item['sale_price']); ?></p>
      </div>
      <div class="col-4">
          <?php $counts = $item['count']; ?>
            <div>個数：</div>
            <p><?php echo $counts; ?>個</p>
      </div>
      <div class="col-4">
          <div>小計：</div>
          <p><?php echo number_format($item['total_price']); ?>円</p>
      </div>
  </div><br>
@endforeach
<div class="card-footer text-right">
    {{ __('合計金額') }}：<?php echo number_format($allPrice); ?>円
</div>
<div class="card-footer text-right">
    {{ __('代引き手数料') }}：<?php echo number_format($fee); ?>円
</div>
<div class="card-footer text-right lead">
    {{ __('総合計金額') }}：<?php echo number_format($allPrice + $fee); ?>円
</div>
<br><br>


<div class="card-header bg-dark text-white">{{ __('配送先情報') }}</div>

<div class="card-body">

        <div class="form-group row">
            <label for="name_kanji" class="col-md-4 col-form-label text-md-right">{{ __('名前（漢字）') }}</label>
            <div class="col-md-6">
                <h5>{{ $customer['name_kanji'] }}</h5>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_kana" class="col-md-4 col-form-label text-md-right">{{ __('名前（カナ）') }}</label>
            <div class="col-md-6">
                <h5>{{ $customer['name_kana'] }}</h5>
            </div>
        </div>


        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
            <div class="col-md-6">
                <h5>{{ $customer['email'] }}</h5>
            </div>
        </div>

        <div class="form-group row">
          <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('支払い方法') }}</label>
          <div class="col-md-6">
              <h5><?php if($customer['payment'] == 1){echo "代引き";} ?></h5>
          </div>
        </div>

        <div class="form-group row">
            <label for="send_postal" class="col-md-4 col-form-label text-md-right @error('postal') is-invalid @enderror">{{ __('郵便番号') }}</label>
            <div class="col-md-6">
                <h5>{{ $customer['send_postal'] }}</h5>
            </div>
        </div>


        <div class="form-group row">
          <label for="send_prefectures" class="col-md-4 col-form-label text-md-right @error('prefectures') is-invalid @enderror">{{ __('都道府県') }}</label>
          <div class="col-md-6">
              <h5>{{ $customer['send_prefectures'] }}</h5>
          </div>
        </div>

        <div class="form-group row">
            <label for="send_address1" class="col-md-4 col-form-label text-md-right">{{ __('住所１') }}</label>
            <div class="col-md-6">
                <h5>{{ $customer['send_address1'] }}</h5>
            </div>
        </div>

        <div class="form-group row">
            <label for="send_address2" class="col-md-4 col-form-label text-md-right">{{ __('住所２') }}</label>
            <div class="col-md-6">
                <h5>{{ $customer['send_address2'] }}</h5>
            </div>
        </div>

        <div class="form-group">
          <label for="description">備考：</label>
          <div class="col-md-6">
              <h5>{{ $customer['description'] }}</h5>
          </div>
        </div>

        <form method="post" action="/finish">
          {{ csrf_field() }}
          <input type="hidden" name="name_kanji" value="<?php echo $customer['name_kanji'] ?>">
          <input type="hidden" name="name_kana" value="<?php echo $customer['name_kana'] ?>">
          <input type="hidden" name="email" value="<?php echo $customer['email'] ?>">
          <input type="hidden" name="payment" value="<?php echo $customer['payment'] ?>">
          <input type="hidden" name="sale_price" value="<?php echo $allPrice ?>">
          <input type="hidden" name="fee" value="<?php echo $fee ?>">
          <input type="hidden" name="send_postal" value="<?php echo $customer['send_postal'] ?>">
          <input type="hidden" name="send_prefectures" value="<?php echo $customer['send_prefectures'] ?>">
          <input type="hidden" name="send_address1" value="<?php echo $customer['send_address1'] ?>">
          <input type="hidden" name="send_address2" value="<?php echo $customer['send_address2'] ?>">
          <input type="hidden" name="description" value="<?php echo $customer['description'] ?>">
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
