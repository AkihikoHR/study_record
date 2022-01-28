<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$question_id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM question_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $question_id);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$output = "
  <tr>
    <td>{$result["category"]}</td>
    <td>{$result["question"]}</td>
    <td><img src='{$result["image"]}' height='150px'></td>
  </tr>
  ";

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>回答する</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <h1>回答を記入してください</h1>

    <div class="contents">

      <table>
        <thead>
          <tr>
            <th>カテゴリー</th>
            <th>質問内容</th>
            <th>添付画像</th>
          </tr>
        </thead>
        <tbody>
          <?= $output ?>
        </tbody>
      </table>

    </div>

    <form action="answer_create.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>回答する</legend>
        <div>
          <p>回答記入欄</p>
          <textarea name="answer" rows="8" cols="40"></textarea>
        </div>
        <div>
          <p>関連する画像をアップロードできます（任意）</p>
          <div>
            <input type="file" name="upfile" accept="image/*" capture="camera" />
          </div>
        </div>
        <div>
          <input type="hidden" name="question_id" value="<?= $question_id ?>">
        </div>
        <div>
          <button>送信</button>
        </div>
      </fieldset>
    </form>

    <div><a href="question.php">質問部屋トップへ</a></div>

    <div><a href="top.php">ホームへ</a></div>
  </div>
</body>

</html>