<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$question_id = $_GET['id'];

// DB接続
$pdo = connect_to_db();


$sql = "SELECT * FROM question_table LEFT OUTER JOIN 
( SELECT question_id, COUNT(id) AS answer_count FROM answer_table GROUP BY question_id ) 
AS result_table 
ON question_table.id = result_table.question_id
WHERE user_id=:user_id 
ORDER BY created_at ASC";


//質問に対する回答を表示
$sql = "SELECT * FROM answer_table LEFT OUTER JOIN
( SELECT id, user_name FROM user_table ) AS result_table 
ON answer_table.user_id = result_table.id 
WHERE question_id=:question_id ORDER BY created_at ASC";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':question_id', $question_id);

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
    <td>{$record["user_name"]}</td>
    <td>{$record["answer"]}</td>
    <td><img src='{$record["image"]}' height='150px'></td>
  </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>回答一覧</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <fieldset>
      <legend>回答一覧</legend>

      <div class="contents">

        <table>
          <thead>
            <tr>
              <th width="20%">回答者</th>
              <th width="50%">回答内容</th>
              <th width="30%">添付画像</th>
            </tr>
          </thead>
          <tbody>
            <?= $output ?>
          </tbody>
        </table>

      </div>

      <a href="question_input.php">質問の入力画面に戻る</a>
    </fieldset>

    <div><a href="question.php">質問部屋トップへ</a></div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>