@extends('layouts.rootmy')

@section('main')
<div class="text-center text-white bg-dark">手数料一覧</div>
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
            <div class="col-6 mb-2">
                <a href="/admin/fee/edit?id={{ $fee->id }}" class="btn btn-primary">編集する</a>
            </div>
            <div class="col-6 mb-2">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $fee->id }}">
                    削除
                </button>

                <!-- モーダルの設定 -->
                <div class="modal fade" id="myModal{{ $fee->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <form action="/admin/fee/del" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $fee->id }}">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                        </div><!-- /.modal-footer -->
                    </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>

        </div>
    @endforeach
    <br>

    <div class="row">
        <div class="col-12">
            <a href="/admin/fee/create" class="btn btn-info">新規登録する</a>
        </div>
    </div>
</div>

@endsection
