@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name_kanji" class="col-md-4 col-form-label text-md-right">{{ __('名前（漢字）') }}</label>

                            <div class="col-md-6">
                                <input id="name_kanji" type="text" name="name_kanji" class="form-control @error('name_kanji') is-invalid @enderror" value="{{ old('name_kanji') }}" placeholder=" ユニプラ　太郎">

                                @error('name_kanji')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_kana" class="col-md-4 col-form-label text-md-right">{{ __('名前（カナ）') }}</label>

                            <div class="col-md-6">
                                <input id="name_kana" type="text" name="name_kana" class="form-control @error('name_kana') is-invalid @enderror" value="{{ old('name_kana') }}" placeholder=" ユニプラ　タロウ">

                                @error('name_kana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>
                          <select name="sex" class="form-control w-25" id="sex">
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                          </select>
                        </div>

                        <div class="form-group row">
                          <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('年齢') }}</label>
                          <select name="age" class="form-control w-25" id="age">
                              <option value="">選択してください</option>
                              <option value="20歳未満">20歳未満</option>
                              <option value="20-29歳">20-29歳</option>
                              <option value="30-39歳">30-39歳</option>
                              <option value="40-49歳">40-49歳</option>
                              <option value="50-59歳">50-59歳</option>
                              <option value="60-69歳">60-69歳</option>
                              <option value="70-79歳">70-79歳</option>
                              <option value="80歳以上">80歳以上</option>
                          </select>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('誕生日') }}</label>
                            <input type="date" name="birthday" class="form-control w-50" id="birthday" max="9999-12-31">
                        </div>

                        <div class="form-group row">
                            <label for="postal" class="col-md-4 col-form-label text-md-right @error('postal') is-invalid @enderror">{{ __('郵便番号') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="postal" class="form-control" id="postal" value="{{ old('postal') }}">

                                @error('postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                          <label for="prefectures" class="col-md-4 col-form-label text-md-right @error('prefectures') is-invalid @enderror">{{ __('都道府県') }}</label>
                        <select name="prefectures" class="form-control w-25" id="prefectures">
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
                        </div>

                        <div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('住所１') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="address1" class="form-control @error('address1') is-invalid @enderror" id="address1" value="{{ old('address1') }}">

                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('住所２') }}</label>
                            <div class="col-md-6">
                              <input type="text" name="address2" class="form-control" id="address2" value="{{ old('address2') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>

                            <div class="col-md-6">
                                <input name="password_confirmation" id="password-confirm" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
