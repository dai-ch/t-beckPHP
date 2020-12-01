
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="sample.css">
  <title>fizzBuzz</title>
</head>

<body>
  <h1 class="title">FizzBuzz問題</h1>

  <form action="/FizzBuzz/index.php" method="post">
    <p class="form__title">FizzNum: <input type="text" name="fizzNum" value="" placeholder=整数値を入力してください></p>
    <p class="form__title">buzzNum: <input type="text" name="buzzNum" value="" placeholder=整数値を入力してください></p>
    <p class="form__bottom"><input type="submit" value="実行"></p>
  </form>

  <h4>[出力]</h4>


  <?php

  //変数の値が送信されたら処理を実行
  if (isset($_POST['fizzNum']) && isset($_POST['buzzNum'])) {


    //入力された値を変数に格納する
    $fizzNum = $_POST['fizzNum'];
    $buzzNum = $_POST['buzzNum'];

    //変数の値が空かどうか
    if (empty($fizzNum)) {
      echo "FizzNumが空です<br>";
      exit;
    }
    if (empty($buzzNum)) {
      echo "buzzNumが空です<br>";
      exit;
    }

    // var_dump($fizzNum);
    // var_dump(mb_convert_kana($fizzNum, 'n'));

    //全角数字を半角にする
    $fizzNum =  mb_convert_kana($fizzNum, 'n');
    $buzzNum =  mb_convert_kana($buzzNum, 'n');


    //入力データが全て整数型かどうか判定する
    if (!is_numeric($fizzNum)) {
      echo "FizzNumに文字列が入っています<br>";
      exit;
    }
    if (!is_numeric($buzzNum)) {
      echo "buzzNumに文字列が入っています<br>";
      exit;
    }

    //int型orfloat型にキャスト変換する
    $fizzNum = $fizzNum * 1;
    $buzzNum = $buzzNum * 1;



    //$fizzNum = (int)$fizzNum;
    //$buzzNum = (int)$buzzNum;
    //var_dump(is_numeric($fizzNum));
    //var_dump($fizzNum);
    // var_dump(is_float($fizzNum));



    //小数点の有無を確認
    if (is_float($fizzNum)) {
      echo 'FizzNumは整数値で入力してください<br>';
      exit;
    }
    if (is_float($buzzNum)) {
      echo 'buzzNumは整数値で入力してください<br>';
      exit;
    }


    //1~99までカウントし、2つの変数の倍数になったら値を表示
    for ($i = 1; $i < 100; $i++) {
      //fizzNumとBuzzの両方の倍数を出力
      if ($i % $fizzNum == 0 && $i % $buzzNum == 0) {
        echo 'FizzBuzz ' . $i . '<br>';
      }
      //fizzだけの倍数を出力()
      if ($i % $fizzNum == 0 && $i % $buzzNum != 0) {
        echo 'Fizz ' . $i . '<br>';
      }

      //buzzだけの倍数を出力
      if ($i % $buzzNum == 0 && $i % $fizzNum != 0) {
        echo 'Buzz ' . $i . '<br>';
      }
    }
  }











  ?>

</body>

</html>