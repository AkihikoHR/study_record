<?php

session_start();
$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();

?>

<p>ログアウトしました</p>
<a href="login_input.php">ログインへ</a>