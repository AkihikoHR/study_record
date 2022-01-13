<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>成績管理（入力画面）</title>
</head>

<body>

  <h1><?php echo $user_name; ?>さんの成績を入力してください</h1>

  <form action="record_create.php" method="POST">
    <fieldset>
      <legend>成績管理（入力画面）</legend>
      <div>
        試験の種類: <input type="text" name="exam_type">
      </div>
      <div>
        試験日: <input type="date" name="exam_date">
      </div>
      <div>
        国語: <input type="number" name="japanese">
      </div>
      <div>
        数学: <input type="number" name="math">
      </div>
      <div>
        英語: <input type="number" name="english">
      </div>
      <div>
        理科: <input type="number" name="science">
      </div>
      <div>
        社会: <input type="number" name="social">
      </div>
      <div>
        <button>保存</button>
      </div>
      <a href="record_read.php">過去の成績はこちら</a>
    </fieldset>
  </form>

  <div><a href="top.php">ホームへ</a></div>

</body>

</html>