<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@paisen77" />
    <meta property="og:url" content="https://www.rudeblade.com/" />
    <meta property="og:title" content="RUDE商会　テストECサイト" />
    <meta property="og:description" content="・ユーザーログイン機能 ・検索機能 ・カート機能 ・管理側の機能「管理画面」から商品の「作成」「編集」「削除」が出来ます。" />
    <meta property="og:image" content="https://www.rudeblade.com/img/topimage_logo1.png" />

    {{-- CSRF トークン --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="{{ asset('slider/slider-pro.min.css') }}" rel="stylesheet">
    <style>
        h2 {
            position: relative;
            padding: 0.25em 0;
        }
        h2:after {
            content: "";
            display: block;
            height: 4px;
            background: -webkit-linear-gradient(to right, rgb(230, 90, 90), transparent);
            background: linear-gradient(to right, rgb(230, 90, 90), transparent);
        }
    </style>
</head>
<body>
    <div>
        <div class="container">
            <div class="d-inline p-2"><a class="d-inline" href="{{ url('/') }}">{{ __('RUDE商会') }}</a></div>
            @auth
            {{-- 「プロフィール」と「ログアウト」のドロップダウンメニュー --}}
                <div class="dropdown d-inline p-2">
                    <a class="d-inline p-2 btn btn-primary dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name_kanji }}さん<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('users/'.auth()->user()->id) }}">プロフィール</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">ログアウト</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endauth
            @guest
            <a class="d-inline p-2 badge badge-info" href="{{ url('/login') }}">{{ __('ログイン') }}</a>
            <a class="d-inline p-2 badge badge-info" href="{{ url('/register') }}">{{ __('会員登録') }}</a>
            @endguest
            <a class="d-inline p-2 badge badge-info" href="{{ url('/form') }}">{{ __('お問い合わせ') }}</a>
        </div>
    </div>




    <nav class="navbar navbar-fixed-top navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ __('HOME') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- Navbarの左側 --}}
                <ul class="navbar-nav mr-auto">
                    {{-- 「記事」と「ユーザー」へのリンク --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/category') }}">{{ __('商品検索') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/company') }}">{{ __('会社紹介') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/info') }}">{{ __('ご利用案内') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/info2') }}">{{ __('特定商取引法に基づく表示') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/form') }}">{{ __('お問い合わせ') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart') }}">{{ __('買い物かご') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">{{ __('管理画面') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
<!-- <header>
  <div class="text-left" style="font-size:12px; background-color: #ffaa49;">デジカメ、パソコン、家電製品など激安ショップ「ユニプラ商社」</div>
</header>

<img src="{{ asset('img/topimage_logo.jpg') }}" class="img-fluid img-responsive center-block" style="width:100%;"> -->


<nav class="navbar navbar-light bg-light">
  {{Form::open(['action' => 'ItemController@keyword'])}}
  {{ csrf_field() }}
  <div class="form-inline">
    {{Form::text('keyword', Form::old('keyword'), ["class"=>"form-control mr-sm-2", "placeholder"=>"Search"])}}
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">商品検索</button>
  </div>
  {{Form::close()}}
</nav>



<div class="container">

    <div class="row">
        <div class="col-md-9 order-md-last" id="main">
        <span style="color:tomato;font-weight:bold;">このサイトはテストサイトです。注文してもメールは届きますが、商品は届きません。
        <a href="/admin">「管理画面」</a>から商品の「作成」「編集」「削除」ができます。</span>
          @yield('main')
        </div>

        <div class="col-md-3 order-md-first" id="sidebar">
          <p class="text-center font-weight-bold bg-dark text-white">カテゴリー</p>
          <div class="list-group">
            <a href="/category" class="list-group-item list-group-item-action active">
              全ての商品
            </a>
            @foreach ($categories as $category)
              @if ($category->parent_id === 0)
              <a href="/search?id={{ $category->id }}" class="list-group-item list-group-item-action">{{ $category->category_name }}</a>
              @endif
            @endforeach
          </div>
        </div>
    </div>
</div>
<br>
<!-- カート -->
<div class="fixed-bottom">
<div class="alert alert-warning float-right mr-5" style="opacity: 0.8;" role="alert">
<a href="{{ url('/cart') }}" class="alert-link"><strong style="font-size:0.8em;"><span class="fas fa-cart-arrow-down"></span>カート</strong></a>
<div style="font-size:0.7em;">個数：<?php echo $counts; ?>個</div>
<div style="font-size:0.7em;">合計：<?php echo number_format($allPrice); ?>円</div>
</div>
</div>

<footer>
    <div class="text-center text-white" style="background-color: #ffaa49;">インフォメーション</div>
    <p class="border-top text-center my-5">Copyright (c) RUDE shoukai all rights reserved.</p>
</footer>
</div>
    {{-- JavaScript --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('slider/jquery.sliderPro.min.js') }}"></script>
    <script>
        $( document ).ready(function( $ ) {
        $('#slider2').sliderPro({
            width: 400,
            autoHeight: true,
            arrows: true,//左右の矢印を出す
            autoplay: false,
            buttons: false,//ナビゲーションボタン
            shuffle: false,//スライドのシャッフル
            thumbnailWidth: 160,//サムネイルの横幅
            thumbnailHeight: 60,//サムネイルの縦幅
            slideDistance:100,//スライド同士の距離
            breakpoints: {
            480: {//表示方法を変えるサイズ
                thumbnailWidth: 100,
                thumbnailHeight: 50
            }
            }
        });
        });
    </script>
</body>
</html>
