<?php

session_start();
$user_email = $_POST['user_email'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM user_table WHERE user_email = :user_email';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_email', $user_email);
$stmt->execute();
$member = $stmt->fetch();

//var_dump($_POST['user_pw']);
//var_dump($member['user_pw']);
//exit();

//ハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['user_pw'], $member['user_pw'])) {

  //DBのユーザー情報をセッションに保存

  $_SESSION['id'] = $member['id'];
  $_SESSION['user_name'] = $member['user_name'];
  $_SESSION['user_ruby'] = $member['user_ruby'];
  $_SESSION['user_pw'] = $member['user_pw'];
  $_SESSION['user_age'] = $member['user_age'];
  $_SESSION['user_email'] = $member['user_email'];
  $_SESSION['user_address'] = $member['user_address'];

  $msg = 'ログインしました。';
  $link = '<a href="top.php">ホーム</a>';
} else {
  $msg = 'メールアドレスまたはパスワードが間違っています。';
  $link = '<a href="login_input.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>