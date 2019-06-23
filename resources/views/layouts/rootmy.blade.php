<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ダッシュボード</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <!-- cssファイルの設定など -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="{{ asset('slider/slider-pro.min.css') }}" rel="stylesheet">
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
      <a class="navbar-brand col-3 col-2 mr-0" href="/">RUDE商会</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <!-- <a class="nav-link" href="/admin/logout">サインアウト</a> -->
          <form action="/admin/logout" method="POST">
              @csrf
              <input type="submit" class="btn btn-secondary" value="ログアウト">
          </form>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-3 bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active small" href="/admin">
                  <span data-feather="home"></span>
                  ダッシュボード <span class="sr-only">(現位置)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link small" href="/admin/items">
                  商品挿入
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link small" href="/admin">
                  商品一覧
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link small" href="/admin/category">
                  カテゴリー
                </a>
                  <select class="form-control" onChange="location.href=value;">
                    <option value="/admin/search">検索する</option>
                    <option value="/admin">全てから</option>
                    @foreach ($categories as $category)
                      <option value="/admin/search?id={{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link small" href="#">
                  顧客
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link small" href="#">
                  発注
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link small" href="/admin/fee">
                  代引き手数料
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-9">
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
    {{-- JavaScript --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('slider/jquery.sliderPro.min.js') }}"></script>
        <script>
            $( document ).ready(function( $ ) {
            $('#slider2').sliderPro({
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
                    thumbnailHeight: 30
                }
                }
            });
            });
        </script>
</body>

</html>
