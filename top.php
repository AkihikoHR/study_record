<?php

session_start();
$user_name = $_SESSION['user_name'];

if (isset($_SESSION['id'])) { //ログインしているとき
  $msg = 'こんにちは' . $user_name . 'さん';
  $edit = '<a href="user_edit.php">ユーザー情報変更</a>';
  $link_record = '<a href="record_input.php">成績の記録</a>';
  $link = '<a href="logout.php">ログアウト</a>';
} else {
  $msg = 'ログインしていません';
  $link = '<a href="login_input.php">ログイン</a>';
}

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

  <h1><?php echo $msg; ?></h1>

  <h2>今日は何をしますか？</h2>

  <button> 担任からのメッセージ </button>
  <button> 今日の１題 </button>
  <button> 学習時間の記録 </button>
  <?php echo $link_record; ?>

  <div> <?php echo $edit; ?></div>
  <div> <?php echo $link; ?></div>

</body>

</html>