<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = "SELECT * FROM question_table LEFT OUTER JOIN 
( SELECT question_id, COUNT(id) AS answer_count FROM answer_table GROUP BY question_id ) 
AS result_table 
ON question_table.id = result_table.question_id 
LEFT OUTER JOIN
( SELECT id AS questioner_id, user_name FROM user_table ) AS name_table 
ON question_table.user_id = name_table.questioner_id 
ORDER BY created_at ASC";

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {

  if ($record["answer_count"] == NULL) {
    $answer_count = 0;
    $answer_link = "";
  } else {
    $answer_count = $record["answer_count"];
    $answer_link = "<a href='answer_read.php?id={$record["id"]}'>";
  }

  $output .= "
  <tr>
    <td>{$record["user_name"]}</td>
    <td>{$record["category"]}</td>
    <td>{$record["question"]}</td>
    <td><img src='{$record["image"]}' height='150px'></td>
    <td>$answer_link{$answer_count}件</a></td>
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
      <h1>全員の質問一覧</h1>

      <div class="contents">

        <table>
          <thead>
            <tr>
              <th width="10%">質問者</th>
              <th width="10%">カテゴリー</th>
              <th width="40%">内容</th>
              <th width="20%">添付画像</th>
              <th width="10%">回答</th>
              <th width="10%">回答する</th>
            </tr>
          </thead>
          <tbody>
            <?= $output ?>
          </tbody>
        </table>

      </div>

      <a href="question_input.php">質問の入力画面へ</a>
    </fieldset>

    <div><a href="question.php">質問部屋トップへ</a></div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>