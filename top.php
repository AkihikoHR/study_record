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
  <link rel="stylesheet" href="style.css">
  <title>ホーム画面</title>
</head>

<body>
  <div class="wrapper">

    <h1>こんにちは<?php echo $user_name; ?>さん</h1>

    <h2>今日は何をしますか？</h2>

    <button> 担任からのメッセージ </button>
    <button> 今日の１題 </button>
    <button onclick="location.href='time_input.php'"> 学習時間の記録 </button>
    <button onclick="location.href='record_input.php'">成績の記録</button>

    <div><a href="user_edit.php">ユーザー情報変更</a></div>
    <div><a href="logout.php">ログアウト</a></div>

  </div>
</body>

</html>