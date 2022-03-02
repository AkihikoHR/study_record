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
  <title>時間管理（入力画面）</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <h1><?php echo $user_name; ?>さんの学習時間を入力してください</h1>

    <form action="time_create.php" method="POST">
      <fieldset>
        <legend>学習時間管理（入力画面）</legend>
        <div>
          日付: <input type="date" name="date">
        </div>
        <div>
          国語: <input type="number" name="japanese">分
        </div>
        <div>
          数学: <input type="number" name="math">分
        </div>
        <div>
          英語: <input type="number" name="english">分
        </div>
        <div>
          理科: <input type="number" name="science">分
        </div>
        <div>
          社会: <input type="number" name="social">分
        </div>
        <div>
          <button>保存</button>
        </div>
      </fieldset>
    </form>

    <div class="btn_area">
      <button class="btn" onclick="location.href='time_read.php'">学習時間レポートはこちら</button>
    </div>

    <div><a href="index.php">ホームへ</a></div>
  </div>
</body>

</html>