<?php

require_once('config/status_codes.php');

//index.phpでstatus_code.phpファイルを読み込む

$answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES);
$option = htmlspecialchars($_POST['option'], ENT_QUOTES);

//htmlspecialcharsでエスケープ処理をする
//index.phpでpostとしてデータ送信されているためpostで取得する

if (!$option) {
    header('Location: index.php');

    //データが正しく送信されなかったときの処理（option変数が存在しなかったとき、つまりindex.phpファイルで解凍の選択肢を選ばなかったときにindex.phpにリダイレクトする）

}

foreach ($status_codes as $status_code) {
    if ($status_code['code'] === $answer_code) {
        $code = $status_code['code'];
        $description = $status_code['description'];
    }
}

//foreachでた次元配列$status_codeを一つ一つの配列に分解する
//if文で解凍コードと配列が合致したときのみ必要となるデータの取得を行う

$result = $option === $code;

//変数optionと変数codeが合致したものを変数resultとする

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Code Quiz</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Status Code Quiz
            </a>
        </div>
    </header>

    <main>
        <div class="result__content">
            <!-- ヘッダー以外の枠組み -->
            <div class="result">
                <!-- 結果の表示 -->
                <?php if ($result): ?>
                    <h2 class="result__text--correct">正解</h2>
                    <!-- $result = $option === $codeが成り立つとき正解と表示 -->
                <?php else: ?>
                    <h2 class="result__text--incorrect">不正解</h2>
                    <!-- $result = $option === $codeが成り立たないときの不正解と表示 -->
                <?php endif; ?>
                <!-- コロン構文の終わりを示す -->
            </div>

            <div class="answer-table">
                <!-- 説明文 -->
                <table class="answer-table__inner">
                    <!-- 説明文の要素 -->
                    <tr class="answer-table__row">
                        <!-- 表の行要素 -->
                        <th class="answer-table__header">ステータスコード</th>
                        <!-- 表見出し要素 -->
                        <td class="answer-table__text">
                            <!-- 表内容要素 -->
                            <?php echo $code ?>
                            <!-- ステイタスコードを表示 -->
                        </td>
                    </tr>
                    <tr class="answer-table__row">
                        <!-- 表の行要素 -->
                        <th class="answer-table__header">説明</th>
                        <!-- 表見出し要素 -->
                        <td class="answer-table__text">
                            <!-- 表内容要素 -->
                            <?php echo $description ?>
                            <!-- 説明文を表示 -->
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>