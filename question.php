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
  <title>質問部屋</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <h2>質問部屋にようこそ</h2>

    <div class="btn_area">
      <button class="btn" onclick="location.href='question_input.php'"> 質問を投稿する </button>
      <button class="btn" onclick="location.href='question_all_read.php'"> 全ての質問を見る </button>
      <button class="btn" onclick="location.href='answer.php'"> 回答を見る </button>
    </div>

    <div><a href="top.php">ホームへ</a></div>
  </div>
</body>

</html>