<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ダッシュボード</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  //cssファイルの設定など
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
  body {
  font-size: .875rem;
  }

  .feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
  }

  /*
  * サイドバー
  */

  .sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* ナビゲーションバーの背面 */
  padding: 48px 0 0; /* ナビゲーションバーの高さ */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
  }

  .sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* ビューポートがコンテンツより短い場合、スクロール可能なコンテンツ */
  }

  @supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
  }

  .sidebar .nav-link {
  font-weight: 500;
  color: #333;
  }

  .sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
  }

  .sidebar .nav-link.active {
  color: #007bff;
  }

  .sidebar .nav-link:hover .feather,
  .sidebar .nav-link.active .feather {
  color: inherit;
  }

  .sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
  }

  /*
  * コンテンツ
  */

  [role="main"] {
  padding-top: 133px; /* 固定ナビゲーションバーの余白 */
  }

  @media (min-width: 768px) {
  [role="main"] {
    padding-top: 48px; /* 固定ナビゲーションバーの余白 */
  }
  }

  /*
  * ナビゲーションバー
  */

  .navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  background-color: rgba(0, 0, 0, .25);
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
  }

  .navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
  }

  .form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
  }

  .form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
  }
  </style>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ユニプラ商社</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="検索" aria-label="検索">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">サインアウト</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  ダッシュボード <span class="sr-only">(現位置)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./rootitems">
                  <span data-feather="file"></span>
                  商品挿入
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  製品コード
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  顧客
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  報告
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  統合
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>保存されたレポート</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  今月
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                 前四半期
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  社会的関与
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  年末販売
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      @yield('items')
    </main>
<br>
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>

</html>
