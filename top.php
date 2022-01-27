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
  <link rel="stylesheet" href="css/style.css">
  <title>ホーム画面</title>
</head>

<body>
  <div class="wrapper">

    <h2 class="user_name">こんにちは<?php echo $user_name; ?>さん</h2>

    <h2>今日は何をしますか？</h2>

    <div class="btn_area">
      <button class="btn" onclick="location.href='message.php'"> 担任からのメッセージ </button>
      <button class="btn" onclick="location.href='time_input.php'"> 学習時間の記録 </button>
      <button class="btn" onclick="location.href='record_input.php'">成績の記録</button>
      <button class="btn" onclick="location.href='question.php'"> 質問部屋 </button>
    </div>

    <div class="footer_area">
      <div><a href="user_edit.php">ユーザー情報変更</a></div>
      <div><a href="logout.php">ログアウト</a></div>
    </div>


  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
  </script>

</body>

</html>