<?php

require_once('config/status_codes.php');

//index.phpでstatus_code.phpファイルを読み込む

$random_indexes = array_rand($status_codes, 4);

//$random_indexesに$status_codeからランダムに4つの配列のキーを取得する

foreach ($random_indexes as $index) {
    $options[] = $status_codes[$index];
}

//ランダムに取得されたキーを4回繰り返し$optionに代入する

$question = $options[mt_rand(0, 3)];

//$options（0~3のキー）の中から1つだけ正解の選択肢を$questionに代入する
//$question=$option[array_rand($options,1)];のように4つの$optionsからランダムに1つ取得するという書き方もできる

?>

<!DOCTYPE html>
<html lang="ja">
<!-- 要素内で使用される言語は日本語 -->

<head>
    <meta charset="UTF-8">
    <!-- 文字コードを指定 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- IEに対して互換性のモードを指定する（利用可能な範囲で最上位のモードを使用） -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 端末やブラウザアプリごとに幅を適応させる -->
    <title>Status Code Quiz</title>
    <!-- ページのタイトルを指定 -->
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- 関連する別の文書を指定 -->
</head>

<body>
    <header class="header">
        <!--ヘッダー-->
        <div class="header__inner">
            <!-- ヘッダーのインナー要素 -->
            <a class="header__logo" href="/">
                <!-- ヘッダーにハイパーリンクを指定 -->
                Status Code Quiz
            </a>
        </div>
    </header>

    <main>
        <div class="quiz__content">
            <!-- ヘッダー以外を１つの枠組みにする -->
            <div class="question">
                <!-- 大問と小問の箱 -->
                <p class="question__text">
                    <!-- 大問 -->
                    Q. 以下の内容に当てはまるステータスコードを選んでください
                </p>

                <p class="question__text">
                    <!-- 小問 -->
                    <?php echo $question['description'] ?>
                    <!-- ランダムに選ばれた小問のステータスコードの説明文を表示させる -->
                </p>

            </div>
            <form class="quiz-form" action="result.php" method="post">
                <!-- フォーム要素、result.phpにデータを送信する（配列を利用した長いデータであるためmethod属性はpostとする -->
                <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>">
                <!-- 入力欄（フォーム入力）要素、解答となるデータを送信する（解答をブラウザに表示させないために、inputタグのtype属性をhiddenとする -->
                <!-- ステータスコードを表示させる -->
                <div class="quiz-form__item">
                    <!-- フォームの選択肢全体 -->
                    <?php foreach ($options as $option) : ?>
                        <!-- ランダムに取得した4つの配列をforeach文で回し、1つ1つの説明文を表示させる -->
                        <div class="quiz-form__group">
                            <!-- フォームの選択肢の各々 -->
                            <input class="quiz-form__radio" id="<?php echo $option['code'] ?>" type="radio" name="option" value="<?php echo $option['code'] ?>">
                            <!-- 複数の選択肢の中から一つだけ選んでデータを送信する -->
                            <label class="quiz-form__label" for="<?php echo $option['code'] ?>">
                                <!-- 各選択肢のラベルとなるテキスト -->
                                <!-- inputタグのid属性とlabelタグのfor属性に同じものを指定することで、2つが紐づき、label要素をクリックするとinputにチェックをつけることができる -->
                                <?php echo $option['code'] ?>
                                <!-- 選択肢にステータスコードを表示 -->
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <!-- foreachの終わりを示す -->
                </div>
                <div class="quiz-form__button">
                    <!-- 回答ボタンの枠組み -->
                    <button class="quiz-form__button-submit" type="submit">
                        回答
                        <!-- フォームのデータをサーバーへ送信 -->
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>