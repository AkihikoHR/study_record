<?php

session_start();
$id = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

if (isset($_SESSION['id'])) { //ログインしているとき
  $msg = $user_name . 'さんの成績表';
  $link = '<a href="top.php">ホーム画面へ</a>';
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
  <title>成績管理（入力画面）</title>
</head>

<body>
  <h1><?php echo $msg; ?></h1>
  <form action="record_create.php" method="POST">
    <fieldset>
      <legend>成績管理（入力画面）</legend>
      <a href="record_read.php">一覧画面</a>
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
        <input type="hidden" name="id" value="<?= $id ?>">
      </div>
      <div>
        <button>送信</button>
      </div>
    </fieldset>
  </form>

  <div><?php echo $link; ?></div>

</body>

</html>