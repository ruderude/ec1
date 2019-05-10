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
        <form action="/del" method="post">
          <input type="hidden" name="id" value="{{ $item->id }}">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
