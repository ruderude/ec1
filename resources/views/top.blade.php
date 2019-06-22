@extends('layouts.my')

@section('title')
トップページ
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

<div class="container">
  <div>
    <img class="card-img-top" src="{{ asset('img/topimage_logo.jpg') }}" alt="">
  </div>
  <br>
  <div>
    <h4 style="border-bottom: double 5px #FFC778;">お知らせ</h4>
    <p>お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文。</p>
    <p>お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文お知らせ本文。</p>
  </div>
  <br>

    <div class="text-center text-white bg-dark">商品一覧</div>
    <br>
    <div class="row">
      @php
        $numOfCols = 3;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
      @endphp
      @foreach ($items as $item)

            <div class="col-<?php echo $bootstrapColWidth; ?> m-auto">
              <a href="/show?id={{ $item->id }}">
                <img class="card-img-top" src="/storage/images/{{ $item->image_url1 }}" alt="">
              </a>
              <div class="">
                <div class="text-center" style="font-size:0.8em;">{{ $item->name }}</div>
                <!-- <p class="card-text" style="font-size:0.5em;">定価：{{ $item->list_price }}</p> -->
                <div class="text-center text-danger" style="font-size:0.5em;">価格(税込)：<br><?php echo number_format($item->sale_price); ?>円</div>
                <div class="text-center">
                  <a href="./show?id={{ $item->id }}" class="btn-info" style="font-size:0.7em;">詳細を見る</a>
                </div>
                <div class="text-center" style="font-size:0.3em;">品番：{{ $item->item_code }}</div>
              </div>
            </div>
            @php
              $rowCount++;
              if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
            @endphp

      @endforeach
    </div>
    {{ $items->links() }}
</div>
@endsection
