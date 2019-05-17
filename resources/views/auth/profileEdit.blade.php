@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('プロフィール編集') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users/edit">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="hidden" name="password" value="{{ $user->password }}">

                        <div class="form-group row">
                            <label for="name_kanji" class="col-md-4 col-form-label text-md-right">{{ __('名前（漢字）') }}<span style="color:tomato;">※必須</span></label>

                            <div class="col-md-6">
                                <input id="name_kanji" type="text" name="name_kanji" class="form-control @error('name_kanji') is-invalid @enderror" value="{{ old('name_kanji', $user->name_kanji) }}">

                                @error('name_kanji')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_kana" class="col-md-4 col-form-label text-md-right">{{ __('名前（カナ）') }}<span style="color:tomato;">※必須</span></label>

                            <div class="col-md-6">
                                <input id="name_kana" type="text" name="name_kana" class="form-control @error('name_kana') is-invalid @enderror" value="{{ old('name_kana', $user->name_kana) }}" placeholder=" ユニプラ　タロウ">

                                @error('name_kana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}<span style="color:tomato;">※必須</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">

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
                            <option value="1" <?php if($user->sex === 1){echo "selected";} ?>>男性</option>
                            <option value="2" <?php if($user->sex === 2){echo "selected";} ?>>女性</option>
                          </select>
                        </div>

                        <div class="form-group row">
                          <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('年齢') }}</label>
                          <select name="age" class="form-control w-25" id="age">
                              <option value="">選択してください</option>
                              <option value="20歳未満" <?php if($user->age === '20歳未満'){echo "selected";} ?>>20歳未満</option>
                              <option value="20-29歳" <?php if($user->age === '20-29歳'){echo "selected";} ?>>20-29歳</option>
                              <option value="30-39歳" <?php if($user->age === '30-39歳'){echo "selected";} ?>>30-39歳</option>
                              <option value="40-49歳" <?php if($user->age === '40-49歳'){echo "selected";} ?>>40-49歳</option>
                              <option value="50-59歳" <?php if($user->age === '50-59歳'){echo "selected";} ?>>50-59歳</option>
                              <option value="60-69歳" <?php if($user->age === '60-69歳'){echo "selected";} ?>>60-69歳</option>
                              <option value="70-79歳" <?php if($user->age === '70-79歳'){echo "selected";} ?>>70-79歳</option>
                              <option value="80歳以上" <?php if($user->age === '80歳以上'){echo "selected";} ?>>80歳以上</option>
                          </select>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('誕生日') }}</label>
                            <input type="date" name="birthday" class="form-control w-50" id="birthday" max="9999-12-31" value="{{ old('birthday', $user->birthday) }}">
                        </div>

                        <div class="form-group row">
                            <label for="postal" class="col-md-4 col-form-label text-md-right @error('postal') is-invalid @enderror">{{ __('郵便番号') }}<span style="color:tomato;">※必須</span></label>
                            <div class="col-md-6">
                                <input type="text" name="postal" class="form-control" id="postal" value="{{ old('postal', $user->postal) }}">

                                @error('postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                          <label for="prefectures" class="col-md-4 col-form-label text-md-right @error('prefectures') is-invalid @enderror">{{ __('都道府県') }}<span style="color:tomato;">※必須</span></label>
                        <select name="prefectures" class="form-control w-25" id="prefectures">
                            <option value="">選択してください</option>
                            <option value="北海道" <?php if($user->prefectures === '北海道'){echo "selected";} ?>>北海道</option>
                            <option value="青森県" <?php if($user->prefectures === '青森県'){echo "selected";} ?>>青森県</option>
                            <option value="岩手県" <?php if($user->prefectures === '岩手県'){echo "selected";} ?>>岩手県</option>
                            <option value="宮城県" <?php if($user->prefectures === '宮城県'){echo "selected";} ?>>宮城県</option>
                            <option value="秋田県" <?php if($user->prefectures === '秋田県'){echo "selected";} ?>>秋田県</option>
                            <option value="山形県" <?php if($user->prefectures === '山形県'){echo "selected";} ?>>山形県</option>
                            <option value="福島県" <?php if($user->prefectures === '福島県'){echo "selected";} ?>>福島県</option>
                            <option value="茨城県" <?php if($user->prefectures === '茨城県'){echo "selected";} ?>>茨城県</option>
                            <option value="栃木県" <?php if($user->prefectures === '栃木県'){echo "selected";} ?>>栃木県</option>
                            <option value="群馬県" <?php if($user->prefectures === '群馬県'){echo "selected";} ?>>群馬県</option>
                            <option value="埼玉県" <?php if($user->prefectures === '埼玉県'){echo "selected";} ?>>埼玉県</option>
                            <option value="千葉県" <?php if($user->prefectures === '千葉県'){echo "selected";} ?>>千葉県</option>
                            <option value="東京都" <?php if($user->prefectures === '東京都'){echo "selected";} ?>>東京都</option>
                            <option value="神奈川県" <?php if($user->prefectures === '神奈川県'){echo "selected";} ?>>神奈川県</option>
                            <option value="新潟県" <?php if($user->prefectures === '新潟県'){echo "selected";} ?>>新潟県</option>
                            <option value="富山県" <?php if($user->prefectures === '富山県'){echo "selected";} ?>>富山県</option>
                            <option value="石川県" <?php if($user->prefectures === '石川県'){echo "selected";} ?>>石川県</option>
                            <option value="福井県" <?php if($user->prefectures === '福井県'){echo "selected";} ?>>福井県</option>
                            <option value="山梨県" <?php if($user->prefectures === '山梨県'){echo "selected";} ?>>山梨県</option>
                            <option value="長野県" <?php if($user->prefectures === '長野県'){echo "selected";} ?>>長野県</option>
                            <option value="岐阜県" <?php if($user->prefectures === '岐阜県'){echo "selected";} ?>>岐阜県</option>
                            <option value="静岡県" <?php if($user->prefectures === '静岡県'){echo "selected";} ?>>静岡県</option>
                            <option value="愛知県" <?php if($user->prefectures === '愛知県'){echo "selected";} ?>>愛知県</option>
                            <option value="三重県" <?php if($user->prefectures === '三重県'){echo "selected";} ?>>三重県</option>
                            <option value="滋賀県" <?php if($user->prefectures === '滋賀県'){echo "selected";} ?>>滋賀県</option>
                            <option value="京都府" <?php if($user->prefectures === '京都府'){echo "selected";} ?>>京都府</option>
                            <option value="大阪府" <?php if($user->prefectures === '大阪府'){echo "selected";} ?>>大阪府</option>
                            <option value="兵庫県" <?php if($user->prefectures === '兵庫県'){echo "selected";} ?>>兵庫県</option>
                            <option value="奈良県" <?php if($user->prefectures === '奈良県'){echo "selected";} ?>>奈良県</option>
                            <option value="和歌山県" <?php if($user->prefectures === '和歌山県'){echo "selected";} ?>>和歌山県</option>
                            <option value="鳥取県" <?php if($user->prefectures === '鳥取県'){echo "selected";} ?>>鳥取県</option>
                            <option value="島根県" <?php if($user->prefectures === '島根県'){echo "selected";} ?>>島根県</option>
                            <option value="岡山県" <?php if($user->prefectures === '岡山県'){echo "selected";} ?>>岡山県</option>
                            <option value="広島県" <?php if($user->prefectures === '広島県'){echo "selected";} ?>>広島県</option>
                            <option value="山口県" <?php if($user->prefectures === '山口県'){echo "selected";} ?>>山口県</option>
                            <option value="徳島県" <?php if($user->prefectures === '徳島県'){echo "selected";} ?>>徳島県</option>
                            <option value="香川県" <?php if($user->prefectures === '香川県'){echo "selected";} ?>>香川県</option>
                            <option value="愛媛県" <?php if($user->prefectures === '愛媛県'){echo "selected";} ?>>愛媛県</option>
                            <option value="高知県" <?php if($user->prefectures === '高知県'){echo "selected";} ?>>高知県</option>
                            <option value="福岡県" <?php if($user->prefectures === '福岡県'){echo "selected";} ?>>福岡県</option>
                            <option value="佐賀県" <?php if($user->prefectures === '佐賀県'){echo "selected";} ?>>佐賀県</option>
                            <option value="長崎県" <?php if($user->prefectures === '長崎県'){echo "selected";} ?>>長崎県</option>
                            <option value="熊本県" <?php if($user->prefectures === '熊本県'){echo "selected";} ?>>熊本県</option>
                            <option value="大分県" <?php if($user->prefectures === '大分県'){echo "selected";} ?>>大分県</option>
                            <option value="宮崎県" <?php if($user->prefectures === '宮崎県'){echo "selected";} ?>>宮崎県</option>
                            <option value="鹿児島県" <?php if($user->prefectures === '鹿児島県'){echo "selected";} ?>>鹿児島県</option>
                            <option value="沖縄県" <?php if($user->prefectures === '沖縄県'){echo "selected";} ?>>沖縄県</option>
                        </select>
                        </div>

                        <div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('住所１') }}<span style="color:tomato;">※必須</span></label>

                            <div class="col-md-6">
                                <input type="text" name="address1" class="form-control @error('address1') is-invalid @enderror" id="address1" value="{{ old('address1', $user->address1) }}">

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
                              <input type="text" name="address2" class="form-control" id="address2" value="{{ old('address2', $user->address2) }}">
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編集する') }}
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
