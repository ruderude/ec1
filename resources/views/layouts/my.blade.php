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
    <link href="{{ asset('slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
        .slider{
              margin: 100px auto;
              width: 80%;
          }
          .slider img{
              height: auto;
              width: 100%;
          }
        .slick-prev:before,.slick-next:before {color: #000;}
        .color-dark{color: tomato;}
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
                            <a class="nav-link" href="{{ url('/category') }}">{{ __('商品検索') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/company') }}">{{ __('会社紹介') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/info') }}">{{ __('ご利用案内') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('#') }}">{{ __('買い物かご') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/form') }}">{{ __('お問い合わせ') }}</a>
                        </li>

                        @guest
                            {{-- 「ログイン」と「ユーザー登録」へのリンク --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/login') }}">{{ __('ログイン') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}">{{ __('ユーザー登録') }}</a>
                            </li>
                        @else
                            {{-- 「プロフィール」と「ログアウト」のドロップダウンメニュー --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name_kanji }}さん<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                                    <a class="dropdown-item" href="{{ url('users/'.auth()->user()->id) }}">
                                        {{ __('プロフィール') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin') }}">{{ __('管理画面') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
<header>
  <div class="text-left" style="font-size:12px; background-color: #ffaa49;">デジカメ、パソコン、家電製品など激安ショップ「ユニプラ商社」</div>
</header>

<img src="{{ asset('img/topimage_logo.jpg') }}" class="img-fluid img-responsive center-block" style="width:100%;">


<nav class="navbar navbar-light bg-light">
  {{Form::open(['action' => 'ItemController@keyword'])}}
  <div class="form-inline">
    {{Form::text('keyword', Form::old('keyword'), ["class"=>"form-control mr-sm-2", "placeholder"=>"Search"])}}
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">商品検索</button>
  </div>
  {{Form::close()}}
</nav>



<div class="container">
    <div class="row">
        <div class="col-md-9">
          @yield('main')
        </div>

        <div class="col-md-3">
          <p class="text-center font-weight-bold bg-dark text-white">カテゴリー</p>
          <div class="list-group">
            <a href="/" class="list-group-item list-group-item-action active">
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


<footer>
    <div class="text-center text-white" style="background-color: #ffaa49;">インフォメーション</div>
    <p class="border-top text-center my-5">Copyright (c) ユニプラ商社 all rights reserved.</p>
</footer>
</div>
    {{-- JavaScript --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
