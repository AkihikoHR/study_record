<?php
session_start();
include('functions.php');

$user_email = $_POST['user_email'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM user_table WHERE user_email = :user_email AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_email', $user_email, PDO::PARAM_STR);
$stmt->execute();
$member = $stmt->fetch();

//ハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['user_pw'], $member['user_pw'])) {

  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['user_id'] = $member['id'];
  $_SESSION['user_name'] = $member['user_name'];

  $msg = 'ログインしました。';
  $link = '<a href="top.php">ホーム</a>';
} else {
  $msg = 'ログイン情報に誤りがあります';
  $link = '<a href="login_input.php">戻る</a>';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン（認証画面）</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1><?php echo $msg; ?></h1>
  <?php echo $link; ?>
</body>

</head>