<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRF トークン --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if (! Request::is('/')){{ $title }} | @endif{{ env('APP_NAME') }}</title>

    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      body { padding-top: 70px; }
    </style>
</head>
<body>
<div class="container">
  <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">トップページ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">商品一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">会社紹介</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ご利用案内</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">買い物かご</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">お問い合わせ</a>
        </li>
      </ul>
    </div>
  </nav>
<header>
  <!-- <div class="row">
    <div class="col-lg-5 p-auto m-auto"><img src="{{ asset('img/logo1.png') }}"></div>
    <div class="col-lg-2 p-auto m-auto"><img src="{{ asset('img/manzokudo.jpg') }}"></div>
    <div class="col-lg-5 p-auto m-auto">
      <div class="row">
        <div class="col-sm-4" style="font-size:11px;">ログイン</div>
        <div class="col-sm-4" style="font-size:11px;">会員登録</div>
        <div class="col-sm-4" style="font-size:11px;">お問い合わせ</div>
      </div><br>
      <div class="row">
        <div class="col-sm-6" style="font-size:11px;">☎︎03-7564-98$$<br>お問い合わせ:平日10:00〜18:30</div>
        <div class="col-sm-6" style="font-size:11px;">カートを見る</div>
      </div>
    </div>
  </div> -->
  <div class="text-left bg-warning" style="font-size:12px;">デジカメ、パソコン、家電製品など激安ショップ「ユニプラ商社」</div>
</header>

<img src="{{ asset('img/topimage_logo.jpg') }}" class="img-fluid img-responsive center-block" style="width:100%;">


<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">商品検索</button>
  </form>
</nav>



<div class="container">
    <div class="row">
        <div class="col-md-9">
          <div class="text-center text-white bg-dark">商品一覧</div>
          <br>

          <div class="card-deck">
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/s721_main.gif') }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/ffnr1391_01.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/DCR-SR60.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <br>

          <div class="card-deck">
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/615j2aFS6mL._SX355_.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/201903_guide03.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/LCDset.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-3">
          <p class="text-center font-weight-bold">カテゴリー</p>
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              全ての商品
            </a>
            <a href="#" class="list-group-item list-group-item-action">カメラ</a>
            <a href="#" class="list-group-item list-group-item-action">ビデオ</a>
            <a href="#" class="list-group-item list-group-item-action">パソコン</a>
            <a href="#" class="list-group-item list-group-item-action">エアコン</a>
          </div>
        </div>
    </div>
</div>




<br>
<div class="btn btn-danger btn-lg">OK</div>
@yield('child')

<footer>
    <div class="text-center text-white bg-warning">インフォメーション</div>
    <p class="border-top text-center my-5">Copyright (c) ユニプラ商社 all rights reserved.</p>
</footer>
</div>
    {{-- JavaScript --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
