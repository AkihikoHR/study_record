<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM question_table ORDER BY created_at ASC LIMIT 10';
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
    <td>{$record["category"]}</td>
    <td>{$record["question"]}</td>
    <td><img src='{$record["image"]}' height='150px'></td>
    <td>0件</td>
    <td><a href='answer_input.php?id={$record["id"]}'>回答する</a></td>
  </tr>
  ";
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>全ての質問一覧</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <fieldset>
      <legend>質問一覧</legend>
      <h1>全員から寄せられた質問一覧</h1>

      <div class="contents">

        <table>
          <thead>
            <tr>
              <th>カテゴリー</th>
              <th>内容</th>
              <th>添付画像</th>
              <th>回答を見る</th>
              <th>回答する</th>
            </tr>
          </thead>
          <tbody>
            <?= $output ?>
          </tbody>
        </table>

      </div>

      <a href="question_input.php">質問の入力画面へ</a>
    </fieldset>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>