<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM time_table WHERE user_id=:user_id';
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
    <td>{$record["date"]}</td>
    <td>{$record["japanese"]}</td>
    <td>{$record["math"]}</td>
    <td>{$record["english"]}</td>
    <td>{$record["science"]}</td>
    <td>{$record["social"]}</td>   
  </tr>
  ";
}

// SQL作成&実行
$sql = 'SELECT SUM(japanese), SUM(math), SUM(english),
 SUM(science), SUM(social) FROM time_table WHERE user_id=:user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total = "";
$total .= "
  <tr>
    <td>合計</td>
    <td>{$result["SUM(japanese)"]}</td>
    <td>{$result["SUM(math)"]}</td>
    <td>{$result["SUM(english)"]}</td>
    <td>{$result["SUM(science)"]}</td>
    <td>{$result["SUM(social)"]}</td>   
  </tr>
  ";


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>学習時間管理</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">

    <fieldset>
      <legend>学習時間管理</legend>
      <h1><?php echo $user_name; ?>さんの学習時間</h1>
      <table>
        <thead>
          <tr>
            <th>日付</th>
            <th>国語</th>
            <th>数学</th>
            <th>英語</th>
            <th>理科</th>
            <th>社会</th>
          </tr>
        </thead>
        <tbody>
          <?= $output ?>
        </tbody>
        <tbody>
          <?= $total ?>
        </tbody>
      </table>
      <a href="time_input.php">入力画面に戻る</a>
    </fieldset>

  </div>
</body>

</html>