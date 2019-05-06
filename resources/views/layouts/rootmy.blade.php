<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ダッシュボード</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <!-- cssファイルの設定など -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('slick/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">
  <style>
    body {margin-top: 40px;}
    .slider{
          margin: 100px auto;
          width: 80%;
      }
      .slider img{
          height: auto;
          width: 100%;
      }
    .slick-prev:before,.slick-next:before {color: #000;}
  </style>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">ユニプラ商社</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">サインアウト</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/root">
                  <span data-feather="home"></span>
                  ダッシュボード <span class="sr-only">(現位置)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/root/items">
                  商品挿入
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/root">
                  商品一覧
                </a>
              </li>
              <li class="nav-item">
                  カテゴリー
                  <select onChange="location.href=value;">
                    <option value="/root/search">検索する</option>
                    <option value="/root">全てから</option>
                    @foreach ($categories as $category)
                      <option value="/root/search?id={{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/root/category">
                  新規カテゴリー作成
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  顧客
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  発注
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  統合
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>保存されたレポート</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  今月
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                 前四半期
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  社会的関与
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  年末販売
                </a>
              </li>
            </ul>
          </div>
        </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        {{-- フラッシュ・メッセージ --}}
        @if (session('my_status'))
            <div class="container mt-2">
                <div class="alert alert-success">
                    {{ session('my_status') }}
                </div>
            </div>
        @endif

        @if (count($errors) > 0)
        <div class="container mt-2">
          <ul>
            @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

      @yield('main')
    </main>
    </div>
    </div>
<br>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('slick/slick.min.js') }}"></script>
  <script>
    $('.slider').slick({
      autoplay:true,
      autoplaySpeed:4000,
      dots:true,
    });
  </script>
</body>

</html>
