<?php

session_start();
$user_id = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM record_table WHERE user_id=:user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);

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
    <table>
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
        <!-- ここにDBから取得したデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>

</body>

</html>