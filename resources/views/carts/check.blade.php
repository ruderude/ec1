@extends('layouts.my')

@section('title')
ショッピングカート（ユーザーチェック）
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
<h2>購入情報を入力してください。</h2>
<div class="container">

  <br>
  @if (!isset($items[0]))
    <br>
    <p>カートの中に商品は入っていません。</p>
  @endif

  @foreach ($items as $item)

    <div class="row border-bottom">
        <div class="col-6 col-lg-3">
            <a href="/show?id={{ $item['id'] }}">
                <img class="card-img-top" src="/storage/images/{{ $item['image_url1'] }}" alt="" style="width:80px;">
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <p class="card-text"><small class="text-muted">品番：{{ $item['item_code'] }}</small></p>
            <p class="card-title">{{ $item['name'] }}</p>
            <p class="card-text text-danger">税込価格：<?php echo number_format($item['sale_price']); ?></p>
        </div>
        <div class="col-4 col-lg-2">
        <form action="/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item['id'] }}">

            <?php $counts = $item['count']; ?>

            <div class="form-group col-xs-2 m-auto">
                <div class="form-group row">
                <label for="count" class="col-form-label">個数&nbsp;</label>
                <select name="count" class="form-control" id="count" style="width:60px;">
                    <option value="1" <?php if($counts==1)echo "selected"; ?>>1</option>
                    <option value="2" <?php if($counts==2)echo "selected"; ?>>2</option>
                    <option value="3" <?php if($counts==3)echo "selected"; ?>>3</option>
                    <option value="4" <?php if($counts==4)echo "selected"; ?>>4</option>
                    <option value="5" <?php if($counts==5)echo "selected"; ?>>5</option>
                    <option value="6" <?php if($counts==6)echo "selected"; ?>>6</option>
                    <option value="7" <?php if($counts==7)echo "selected"; ?>>7</option>
                    <option value="8" <?php if($counts==8)echo "selected"; ?>>8</option>
                </select>
                <button type="submit" class="btn btn-primary m-2">変更</button>
                </div>
            </div>
        </form>
        </div>
        <div class="col-4 col-lg-2">
            <div>小計：</div>
            <p><?php echo number_format($item['total_price']); ?>円</p>
        </div>
        <div class="col-4 col-lg-2 m-auto">
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
    <div class="card-footer text-right">
        {{ __('合計金額') }}：<?php echo number_format($allPrice); ?>円
    </div>
    <div class="card-footer text-right">
        {{ __('代引き手数料') }}：<?php echo number_format($fee); ?>円
    </div>
    <div class="card-footer text-right lead">
        {{ __('総合計金額') }}：<?php echo number_format($allPrice + $fee); ?>円
    </div>
    <br><br>

    @auth
        <div class="card-header bg-dark text-white">{{ __('※ユーザーIDに登録した住所に送る') }}</div>

        <div class="card-body">
            <form method="post" action="/order">
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name_kanji" class="col-lg-4 col-form-label">{{ __('名前（漢字）') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="name_kanji" type="text" name="name_kanji" class="form-control @error('name_kanji') is-invalid @enderror" value="{{ Auth::user()->name_kanji }}" placeholder="赤家　太郎" required>

                        @error('name_kanji')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name_kana" class="col-lg-4 col-form-label">{{ __('名前（カナ）') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="name_kana" type="text" name="name_kana" class="form-control @error('name_kana') is-invalid @enderror" value="{{ Auth::user()->name_kana }}" placeholder="レッドハウス　タロウ" required>

                        @error('name_kana')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-lg-4 col-form-label">{{ __('メールアドレス') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment" class="col-lg-4 col-form-label">{{ __('支払い方法') }}<span class="text-danger small">※必須</span></label>
                    <select name="payment" class="form-control w-25" id="payment" required>
                        <option value="">選択してください</option>
                        <option value="1">代引き</option>
                    </select>
                    @error('payment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="send_postal" class="col-lg-4 col-form-label @error('postal') is-invalid @enderror">{{ __('郵便番号') }}<span class="text-danger small">※必須</span></label>
                    <div class="col-lg-6">
                        <input type="text" name="send_postal" class="form-control" id="send_postal" value="{{ Auth::user()->postal }}" required>

                        @error('postal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="send_prefectures" class="col-lg-4 col-form-label @error('prefectures') is-invalid @enderror">{{ __('都道府県') }}<span class="text-danger small">※必須</span></label>
                <select name="send_prefectures" class="form-control w-25" id="send_prefectures" required>
                    <option value="">選択してください</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都" selected>東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
                @error('prefectures')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group row">
                    <label for="send_address1" class="col-lg-4 col-form-label">{{ __('住所１') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input type="text" name="send_address1" class="form-control @error('address1') is-invalid @enderror" id="send_address1" value="{{ Auth::user()->address1 }}" required>

                        @error('address1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="send_address2" class="col-lg-4 col-form-label">{{ __('住所２') }}</label>
                    <div class="col-lg-6">
                        <input type="text" name="send_address2" class="form-control" id="send_address2" value="{{ Auth::user()->address2 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">備考：</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-lg-6 offset-md-4">
                        <button type="submit" class="btn btn-success" style="width:200px;">
                            {{ __('登録住所で注文する') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-header bg-dark text-white">{{ __('別の住所に送る場合は配送先住所を入力してください。') }}</div>

        <div class="card-body">
            <form method="post" action="/order">
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name_kanji" class="col-lg-4 col-form-label">{{ __('名前（漢字）') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="name_kanji" type="text" name="name_kanji" class="form-control @error('name_kanji') is-invalid @enderror" value="{{ old('name_kanji') }}" placeholder="赤家　太郎" required>

                        @error('name_kanji')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name_kana" class="col-lg-4 col-form-label">{{ __('名前（カナ）') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="name_kana" type="text" name="name_kana" class="form-control @error('name_kana') is-invalid @enderror" value="{{ old('name_kana') }}" placeholder="レッドハウス　タロウ" required>

                        @error('name_kana')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-lg-4 col-form-label">{{ __('メールアドレス') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment" class="col-lg-4 col-form-label">{{ __('支払い方法') }}<span class="text-danger small">※必須</span></label>
                    <select name="payment" class="form-control w-25" id="payment" required>
                        <option value="">選択してください</option>
                        <option value="1">代引き</option>
                    </select>
                    @error('payment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="send_postal" class="col-lg-4 col-form-label @error('postal') is-invalid @enderror">{{ __('郵便番号') }}<span class="text-danger small">※必須</span></label>
                    <div class="col-lg-6">
                        <input type="text" name="send_postal" class="form-control" id="send_postal" value="{{ old('send_postal') }}" required>

                        @error('postal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="send_prefectures" class="col-lg-4 col-form-label @error('prefectures') is-invalid @enderror">{{ __('都道府県') }}<span class="text-danger small">※必須</span></label>
                <select name="send_prefectures" class="form-control w-25" id="send_prefectures" required>
                    <option value="">選択してください</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都" selected>東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
                @error('prefectures')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group row">
                    <label for="send_address1" class="col-lg-4 col-form-label">{{ __('住所１') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input type="text" name="send_address1" class="form-control @error('address1') is-invalid @enderror" id="send_address1" value="{{ old('send_address1') }}" required>

                        @error('address1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="send_address2" class="col-lg-4 col-form-label">{{ __('住所２') }}</label>
                    <div class="col-lg-6">
                        <input type="text" name="send_address2" class="form-control" id="send_address2" value="{{ old('send_address2') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">備考：</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-lg-6 offset-md-4">
                        <button type="submit" class="btn btn-success" style="width:150px;">
                            {{ __('注文する') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @endauth

        @guest
        <div class="card-header bg-dark text-white">{{ __('配送先住所を入力してください。') }}</div>

        <div class="card-body">
            <form method="post" action="/order">
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name_kanji" class="col-lg-4 col-form-label">{{ __('名前（漢字）') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="name_kanji" type="text" name="name_kanji" class="form-control @error('name_kanji') is-invalid @enderror" value="{{ old('name_kanji') }}" placeholder="赤家　太郎" required>

                        @error('name_kanji')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name_kana" class="col-lg-4 col-form-label">{{ __('名前（カナ）') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="name_kana" type="text" name="name_kana" class="form-control @error('name_kana') is-invalid @enderror" value="{{ old('name_kana') }}" placeholder="レッドハウス　タロウ" required>

                        @error('name_kana')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-lg-4 col-form-label">{{ __('メールアドレス') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment" class="col-lg-4 col-form-label">{{ __('支払い方法') }}<span class="text-danger small">※必須</span></label>
                    <select name="payment" class="form-control w-25" id="payment" required>
                        <option value="">選択してください</option>
                        <option value="1">代引き</option>
                    </select>
                    @error('payment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="send_postal" class="col-lg-4 col-form-label @error('postal') is-invalid @enderror">{{ __('郵便番号') }}<span class="text-danger small">※必須</span></label>
                    <div class="col-lg-6">
                        <input type="text" name="send_postal" class="form-control" id="send_postal" value="{{ old('send_postal') }}" required>

                        @error('postal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="send_prefectures" class="col-lg-4 col-form-label @error('prefectures') is-invalid @enderror">{{ __('都道府県') }}<span class="text-danger small">※必須</span></label>
                <select name="send_prefectures" class="form-control w-25" id="send_prefectures" required>
                    <option value="">選択してください</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都" selected>東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
                @error('prefectures')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group row">
                    <label for="send_address1" class="col-lg-4 col-form-label">{{ __('住所１') }}<span class="text-danger small">※必須</span></label>

                    <div class="col-lg-6">
                        <input type="text" name="send_address1" class="form-control @error('address1') is-invalid @enderror" id="send_address1" value="{{ old('send_address1') }}" required>

                        @error('address1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="send_address2" class="col-lg-4 col-form-label">{{ __('住所２') }}</label>
                    <div class="col-lg-6">
                        <input type="text" name="send_address2" class="form-control" id="send_address2" value="{{ old('send_address2') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">備考：</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-lg-6 offset-md-4">
                        <button type="submit" class="btn btn-success" style="width:150px;">
                        <span class="fas fa-cart-arrow-down">{{ __('注文する') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endguest




</div>
<!-- <a href="/order" class="btn btn-success text-white" style="width:150px;"><span class="fas fa-cart-arrow-down">注文する</a> -->
<br><br>
@endsection
