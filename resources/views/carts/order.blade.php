@extends('layouts.my')

@section('title')
ご注文ページ
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
        <div class="col-xs-3 m-auto">
          <a href="/show?id={{ $item->id }}">
            <img class="card-img-top" src="/storage/images/{{ $item->image_url1 }}" alt="" style="width:100px;">
          </a>
        </div>
        <div class="col-xs-4 m-auto">
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
          <p class="card-title">{{ $item->name }}</p>
          <!-- <p class="card-text">定価：{{ $item->list_price }}</p> -->
          <p class="card-text text-danger">特価：{{ $item->sale_price }}</p>
        </div>
        <div class="col-xs-2 m-auto">
          <p>1個</p>
        </div>
        <div class="col-xs-3 m-auto">
          <p>10000000円</p>

        </div>
    </div>

  @endforeach





  <div class="form-group">
    <label for="exampleSelect1exampleFormControlSelect1">支払い方法：</label>
    <select name="count" class="form-control" id="exampleFormControlSelect1" style="width: 200px;">
      <option>銀行振り込み</option>
    </select>
  </div>

  <div class="form-group">領収書の発行：</div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="receipt" id="inlineRadio1" value="必要">
    <label class="form-check-label">必要</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="receipt" id="inlineRadio2" value="必要ない">
    <label class="form-check-label">必要ない</label>
  </div>








<a href="/finish" class="card-link btn btn-danger">注文を確定する</a>
</div>

@endsection
