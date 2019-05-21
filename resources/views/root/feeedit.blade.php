@extends('layouts.rootmy')

@section('main')
<div class="text-center text-white bg-dark">手数料設定</div>
<br>
{{ $fee->fee }}
<form action="/admin/fee/edit" method="post">
    @csrf
    <input type='hidden' name='id' value='{{ $fee->id }}'>
    <div class="form-group">
        <label for="miniPrice">〇〇円〜</label>
        <input name="underprice" type="text" class="form-control" value="{{ old('underprice', $fee->underprice) }}" id="miniPrice" placeholder="0">
    </div>
    <div class="form-group">
        <label for="maxPrice">〜〇〇円まで</label>
        <input name="overprice" type="text" class="form-control" value="{{ old('overprice', $fee->overprice) }}" id="maxPrice" placeholder="9999">
    </div>
    <div class="form-group">
        <label for="fee">代引き手数料</label>
        <input name="fee" type="text" class="form-control" value="{{ old('fee', $fee->fee) }}" id="fee" placeholder="300円">
    </div>

    <button type="submit" class="btn btn-primary">保存する</button>
</form>
<br>

<div class="container">
    @foreach($fees as $fee)
        <div class="row border-left border-bottom">

            <div class="col-4 mb-2">
                {{ $fee->underprice }}円〜
            </div>
            <div class="col-4 mb-2">
                {{ $fee->overprice }}円まで
            </div>
            <div class="col-4 mb-2">
                {{ $fee->fee }}円
            </div>
            <div class="col-12 mb-2">
            <a href="/admin/fee/del" class="btn btn-danger">削除</a>
            </div>

        </div>
    @endforeach
</div>
@endsection
