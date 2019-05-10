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

  <div class="row">
      <div class="col-xs-2 m-auto">
        <p class="card-title m-auto"></p>
      </div>
      <div class="col-xs-4 m-auto">
        <p class="card-title m-auto">商品情報</p>
      </div>
      <div class="col-xs-2 m-auto">
        <p class="card-title m-auto">&emsp;個数</p>
      </div>
      <div class="col-xs-2 m-auto">
        <p class="card-title m-auto">&emsp;合計金額</p>
      </div>
      <div class="col-xs-2 m-auto">
        <p class="card-title m-auto">削除</p>
      </div>
  </div>
  <br>
  @if (!isset($items[0]))
    <br>
    <p>カートの中に商品は入っていません。</p>
  @endif

  @foreach ($items as $item)

    <div class="row">
        <div class="col-xs-2 m-auto">
          <a href="/show?id={{ $item->item_id }}">
            <img class="card-img-top" src="/storage/images/{{ $item->image_url1 }}" alt="" style="width:80px;">
          </a>
        </div>
        <div class="col-xs-4 m-auto">
          <p class="card-text"><small class="text-muted">品番：{{ $item->item_code }}</small></p>
          <p class="card-title">{{ $item->name }}</p>
          <!-- <p class="card-text">定価：{{ $item->list_price }}</p> -->
          <p class="card-text text-danger">特価：{{ $item->sale_price }}</p>
        </div>
        <div class="col-xs-2 m-auto">
          <form action="/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item->id }}">

          <?php $counts = $item->counts; ?>

          <div class="form-group col-xs-2 m-auto">
            <div class="form-group row">
              <label for="count" class="col-form-label">個数&nbsp;</label>
              <select name="counts" class="form-control" id="count" style="width:40px;">
                  <option value="1" <?php if($counts===1)echo "selected"; ?>>1</option>
                  <option value="2" <?php if($counts===2)echo "selected"; ?>>2</option>
                  <option value="3" <?php if($counts===3)echo "selected"; ?>>3</option>
                  <option value="4" <?php if($counts===4)echo "selected"; ?>>4</option>
                  <option value="5" <?php if($counts===5)echo "selected"; ?>>5</option>
                  <option value="6" <?php if($counts===6)echo "selected"; ?>>6</option>
                  <option value="7" <?php if($counts===7)echo "selected"; ?>>7</option>
                  <option value="8" <?php if($counts===8)echo "selected"; ?>>8</option>
              </select>
            </div>
          </div>

          <div class="form-group col-xs-2 m-auto">
            <label></label>
            <button type="submit" class="btn btn-primary">変更</button>
          </div>

          </form>

        </div>
        <div class="col-xs-2 m-auto">
          <p>{{ $item->total_price }}円</p>

        </div>
        <div class="col-xs-2 m-auto">
          <!-- 切り替えボタンの設定 -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
            削除
          </button>

          <!-- モーダルの設定 -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-danger">削除</button>
                  </form>
                </div><!-- /.modal-footer -->
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
        </div>
    </div>
    <br>

  @endforeach


<a href="/finish" class="card-link btn btn-success">注文を確定する</a>
</div>
<br>
@endsection
