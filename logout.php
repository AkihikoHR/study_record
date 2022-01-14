<?php

session_start();
$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン（入力画面）</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <p>ログアウトしました</p>
        <a href="login_input.php">ログインへ</a>
    </div>
</body>

</html>