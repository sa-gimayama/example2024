# スタジオアルカナアドベントカレンダー2024記事用作例

## はじめに

このリポジトリは[スタジオアルカナアドベントカレンダー2024の12日目の記事](https://qiita.com/sa-gimayama/items/fecec2395810d26c0216)執筆のために作成した作例です。

記事には書かれてないことはここからなんとなく読み取ってください。

質問や不明点などあればIssueに書き込んでください。（どっかで時間見つけて返信すると思います）

## 使い方

### ローカルでの環境構築

### 1. Dockerのインストール

まずはDockerをインストールしてください。
もうインストールしてる方は次に進んでください。

### 2. リポジトリのクローン

本リポジトリをクローンしてください。
やり方は各々に任せますが、以下のコマンドでクローンできます。

```bash
git clone git@github.com:sa-gimayama/example2024.git
```

### 3. Dockerコンテナの起動

クローンしたディレクトリに移動して以下のコマンドを実行してください。
makeコマンドが入ってないときはどっかから入れてきてください。（多分入ってると思いますが）

```bash
make up
```

### 4. ライブラリ類のインストール

コンテナが起動したら以下のコマンドを実行してください。

```bash
make install
```

### 5. DBのマイグレーションとシードデータの投入

以下のコマンドを実行してください。

```bash
make migrate
make seed
```

### 6. ブラウザでアクセス

これでブラウザからアクセスできると思います。

blade編は

- http://localhost/example/blade

Ajax編は

- http://localhost/example/bladeAjax

でアクセスできます。

### 6.1 Inertia編のアクセス

Inertia編は以下のコマンドを実行してからアクセスしてください。

```bash
make dev
```

http://localhost/example/inertia
