# ec1

ITエンジニアとして初業務で作ったECサイトです。

ディレクトリ名やコントローラーの処理、また管理側の作り込みなど、反省点は山ずみですが、これでLaravelにはかなり慣れました。

デザインは後から修正できるように、Bootstrap4にてシンプルなものにしています。

スライドショーにjQueryを使用しています。

先方の指示がなかったためバリデーションは甘めですw

ユーザー情報など漢字カナの区別していません。

あくまで、買い物が成立するまでです。

本番環境は「さくらVPSサーバー」です。

・CentOS7
・Apache2.4
・PHP7.2
・MySQL5.7
・Laravel5.8

GitHubからデプロイしました。

「Let's Encrypt」によりSSL化。

https://www.rudeblade.com/

・ユーザーログイン機能
・検索機能
・カート機能
・管理側の機能

「管理画面」から商品の「作成」「編集」「削除」が出来ます。

mail: admin@mail.com
pass: password

で入れます。
