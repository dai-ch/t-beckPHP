<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="sample.css">
  <title>FizzBuzz問題</title>
</head>

<body>
  <h1 class="title">FizzBuzz問題</h1>

  <form method="post">
    <p class="form__title">FizzNum: <input type="text" name="fizzNum" value="" placeholder=整数値を入力してください></p>
    <p class="form__title">buzzNum: <input type="text" name="buzzNum" value="" placeholder=整数値を入力してください></p>
    <p class="form__bottom"><input type="submit" value="実行"></p>
  </form>

  <h4>[出力]</h4>

  <?php

  //変数の値が送信されたら処理を実行
  if (isset($_POST['fizzNum']) && isset($_POST['buzzNum'])) {

    //入力された値を変数に格納する
    $fizzNumPost = $_POST['fizzNum'];
    $buzzNumPost = $_POST['buzzNum'];

    //エラーメッセージ
    $error = "整数値を入力してください<br>";

    //正規表現
    $match = "/^[0-9]+$/";

    //全角数字を半角にする
    $fizzNum =  mb_convert_kana($fizzNumPost, 'n');
    $buzzNum =  mb_convert_kana($buzzNumPost, 'n');

    //少数を除く数値かどうかチェック
    if (preg_match($match, $fizzNum) && preg_match($match, $buzzNum)) {

      //1~99までカウントし、2つの変数の倍数になったら値を表示
      for ($i = 1; $i < 100; $i++) {
        //入力した2つの値の両方の倍数の倍数の値を表示
        if ($i % $fizzNum === 0 && $i % $buzzNum === 0) {
          echo 'FizzBuzz ' . $i . '<br>';
        } elseif ($i % $fizzNum === 0 && $i % $buzzNum != 0) {
          //fizzNumのみの倍数の値を表示
          echo 'Fizz ' . $i . '<br>';
        } else if ($i % $buzzNum === 0 && $i % $fizzNum != 0) {
          //buzzNumのみの倍数の値を表示
          echo 'Buzz ' . $i . '<br>';
        }
      }
    } else {
      echo $error;
    }
  }

  ?>

</body>

</html>