<?php

// DB接続
$dbn = 'mysql:dbname=gsacy_d01_11_product;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
};

// SQL作成&実行
$sql = 'SELECT * FROM record_table WHERE user_name="弘中明彦"';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
  <tr>
    <td>{$record["exam_type"]}</td>
    <td>{$record["exam_date"]}</td>
    <td>{$record["japanese"]}</td>
    <td>{$record["math"]}</td>
    <td>{$record["english"]}</td>
    <td>{$record["science"]}</td>
    <td>{$record["social"]}</td>   
  </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>成績管理（過去の成績一覧）</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <fieldset>
    <legend>成績管理（過去の成績一覧）</legend>
    <a href="record_input.php">入力画面</a>

    <form method="POST">
      氏名: <input type="text" name="user_name">
    </form>

    <button id="result">一覧表示</button>
    <table id="list" class="none">
      <thead>
        <tr>
          <th>試験の種類</th>
          <th>試験日</th>
          <th>国語</th>
          <th>数学</th>
          <th>英語</th>
          <th>理科</th>
          <th>社会</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $("#result").on("click", function() {
      $("#list").removeClass("none");
    });
  </script>
</body>

</html>