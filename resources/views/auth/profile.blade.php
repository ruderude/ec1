@extends('layouts.app')

@section('content')
<div class="container">

        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('ユーザープロフィール') }}</div>

                <div class="card-body mx-auto">
                    <table class="table mx-auto">
                        <tr>
                            <td class="text-right">{{ __('名前（漢字）') }}：</td>
                            <td>{{ $user->name_kanji }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('名前（カナ）') }}：</td>
                            <td>{{ $user->name_kana }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('メールアドレス') }}：</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('性別') }}：</td>
                            <td>
                            @if ($user->sex === 1)
                            男性
                            @else
                            女性
                            @endif</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('年齢') }}：</td>
                            <td>{{ $user->age }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('郵便番号') }}：</td>
                            <td>{{ $user->postal }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('都道府県') }}：</td>
                            <td>{{ $user->prefectures }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('住所１') }}：</td>
                            <td>{{ $user->address1 }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{ __('住所２') }}：</td>
                            <td>{{ $user->address2 }}</td>
                        </tr>

                    </table>

                </div>

                <div class="text-center">
                    <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">
                        {{ __('編集する') }}
                    </a>
                </div>
                <br>
            </div>
        </div>

</div>
@endsection
