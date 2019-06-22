@extends('layouts.my')

@section('title')
ショッピングカート
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

  <br>
  @if (!isset($items[0]))
    <br>
    <p>カートの中に商品は入っていません。</p>
  @endif

  @foreach ($items as $item)

    <div class="row border-bottom">
        <div class="col-6 col-md-3">
            <a href="/show?id={{ $item['id'] }}">
                <img class="card-img-top" src="/storage/images/{{ $item['image_url1'] }}" alt="" style="width:80px;">
            </a>
        </div>
        <div class="col-6 col-md-3">
            <p class="card-text"><small class="text-muted">品番：{{ $item['item_code'] }}</small></p>
            <p class="card-title">{{ $item['name'] }}</p>
            <p class="card-text text-danger">税込価格：<?php echo number_format($item['sale_price']); ?></p>
        </div>
        <div class="col-4 col-md-2">
        <form action="/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item['id'] }}">

            <?php $count = $item['count']; ?>

            <div class="form-group col-xs-2 m-auto">
                <div class="form-group row">
                <label for="count" class="col-form-label">個数&nbsp;</label>
                <select name="count" class="form-control" id="count" style="width:60px;">
                    <option value="1" <?php if($count==1)echo "selected"; ?>>1</option>
                    <option value="2" <?php if($count==2)echo "selected"; ?>>2</option>
                    <option value="3" <?php if($count==3)echo "selected"; ?>>3</option>
                    <option value="4" <?php if($count==4)echo "selected"; ?>>4</option>
                    <option value="5" <?php if($count==5)echo "selected"; ?>>5</option>
                    <option value="6" <?php if($count==6)echo "selected"; ?>>6</option>
                    <option value="7" <?php if($count==7)echo "selected"; ?>>7</option>
                    <option value="8" <?php if($count==8)echo "selected"; ?>>8</option>
                </select>
                <button type="submit" class="btn btn-primary m-2">変更</button>
                </div>
            </div>
        </form>
        </div>
        <div class="col-4 col-md-2">
            <div>小計：</div>
            <p><?php echo number_format($item['total_price']); ?>円</p>
        </div>
        <div class="col-4 col-md-2 m-auto">
                        <!-- 切り替えボタンの設定 -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $item['id'] }}">
                削除
            </button>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="myModal{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">削除確認</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>カートからこの商品を削除しますか？</p>
                    </div>
                    <div class="modal-footer">
                    <form action="/del" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div><br>

@endforeach
    <div class="card-footer text-right lead">
        {{ __('合計個数') }}：<?php echo $counts; ?>個
    </div>
    <div class="card-footer text-right lead">
        {{ __('合計金額') }}：<?php echo number_format($allPrice); ?>円
    </div>
    <br>

<div class="row">
    @guest
    <div class="col-sm-6">
        <div class="card" style="">
            <div class="card-body">
                <h5 class="card-title"> ログインして注文</h5>
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Eメールアドレス</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Eメールアドレス">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">パスワード</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="パスワード">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">記憶する</label>
                    </div>
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card" style="">
            <div class="card-body">
                <h5 class="card-title">登録して注文</h5>
                <p class="card-text">下のボタンから新規登録画面へ以降してください。</p>
                <a href="/register" class="btn btn-primary mb-2">新規登録</a>
                <p class="card-text">ゲストのまま注文する</p>
                <a href="/check" class="btn btn-success text-white" style="width:150px;"><span class="fas fa-cart-arrow-down">注文する</a>
            </div>
        </div>
    </div>
    @endguest
</div>
<br>
</div>
<div class="row">
    <div class="col-sm-6">
        <a href="<?php echo url()->previous(); ?>" class="card-link btn btn-primary"><span class="far fa-hand-point-left"></span>戻る</a>
    </div><br><br>
    <div class="col-sm-6">
    <a href="/check" class="btn btn-success text-white" style="width:150px;"><span class="fas fa-cart-arrow-down">そのまま注文する</a>
    </div>
</div>
<br><br>
@endsection
