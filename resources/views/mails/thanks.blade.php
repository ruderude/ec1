<!DOCTYPE html>
<html lang="ja">
<body>
<h1>
  {{ $sales->name_kanji }}さま、ご注文ありがとうございます。
</h1>
<p>
  こちらの銀行までお振り込みください。確認が終わりましたら商品を発送させていただきます。
</p>
<p>{{ $sales->name_kanji }}</p>
<p>{{ $sales->name_kana }}</p>
<p>{{ $sales->item_name }}</p>
<p>{{ $sales->sale_price }}</p>
<p>{{ $sales->payment }}</p>
<p>{{ $sales->send_postal }}</p>
<p>{{ $sales->send_prefectures }}</p>
<p>{{ $sales->send_address1 }}</p>
<p>{{ $sales->send_address2 }}</p>
<p>{{ $sales->description }}</p>

<p id="button">
  <a href="https://www.google.co.jp">リンクのテスト</a>
</p>
</body>
</html>
