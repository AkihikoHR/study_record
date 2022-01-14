<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM user_table WHERE id = :user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$member = $stmt->fetch();

$user_name = $member['user_name'];
$user_ruby = $member['user_ruby'];
$user_age = $member['user_age'];
$user_email = $member['user_email'];
$user_address = $member['user_address'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー情報変更</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">
    <form action="user_update.php" method="POST">
      <fieldset>
        <legend>ユーザー情報変更</legend>
        <div>
          現在の氏名:<?php echo $user_name; ?>
        </div>
        <div>
          変更後の氏名<input type="text" name="user_name" value="<?php echo $user_name; ?>">
        </div>
        <div>
          現在のよみがな: <?php echo $user_ruby; ?>
        </div>
        <div>
          変更後のよみがな<input type="text" name="user_ruby" value="<?php echo $user_ruby; ?>">
        </div>
        <div>
          現在の年齢:<?php echo $user_age; ?>
        </div>
        <div>
          変更後の年齢<input type="number" name="user_age" value="<?php echo $user_age; ?>">
        </div>
        <div>
          現在のemail: <?php echo $user_email; ?>
        </div>
        <div>
          変更後のemail<input type="email" name="user_email" value="<?php echo $user_email; ?>">
        </div>
        <div>
          現在の住所: <?php echo $user_address; ?>
        </div>
        <div>
          変更後の住所<input type="text" name="user_address" value="<?php echo $user_address; ?>">
        </div>
        <input type="submit" value="ユーザー情報更新">
      </fieldset>
    </form>
  </div>

</body>

</html>