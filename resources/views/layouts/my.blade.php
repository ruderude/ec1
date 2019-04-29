<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRF トークン --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <style>
      /* body { padding-top: 70px; } */
    </style>
</head>
<body>
        <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('ユニプラ商社') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Navbarの左側 --}}
                    <ul class="navbar-nav mr-auto">
                        {{-- 「記事」と「ユーザー」へのリンク --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('./list') }}">{{ __('商品検索') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">{{ __('会社紹介') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">{{ __('ご利用案内') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">{{ __('買い物かご') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">{{ __('お問い合わせ') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
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
  <div class="text-left" style="font-size:12px; background-color: #ffaa49;">デジカメ、パソコン、家電製品など激安ショップ「ユニプラ商社」</div>
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
          @yield('top')
          @yield('list')

        </div>

        <div class="col-md-3">
          <p class="text-center font-weight-bold">カテゴリー</p>
          <div class="list-group">
            <a href="./list" class="list-group-item list-group-item-action active">
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


<footer>
    <div class="text-center text-white bg-warning">インフォメーション</div>
    <p class="border-top text-center my-5">Copyright (c) ユニプラ商社 all rights reserved.</p>
</footer>
</div>
    {{-- JavaScript --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
</html>
