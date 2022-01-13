<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];

// 入力項目のチェック
$user_name = $_POST['user_name'];
$user_ruby = $_POST['user_ruby'];
$user_age = $_POST['user_age'];
$user_email = $_POST['user_email'];
$user_address = $_POST['user_address'];

// DB接続
$pdo = connect_to_db();

$sql = 'UPDATE user_table SET user_name=:user_name, user_ruby=:user_ruby, user_age=:user_age,
 user_email=:user_email, user_address=:user_address, updated_at=now() WHERE id=:user_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':user_ruby', $user_ruby, PDO::PARAM_STR);
$stmt->bindValue(':user_age', $user_age, PDO::PARAM_STR);
$stmt->bindValue(':user_email', $user_email, PDO::PARAM_STR);
$stmt->bindValue(':user_address', $user_address, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
};

$sql = 'SELECT * FROM user_table WHERE id = :user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$member = $stmt->fetch();
$_SESSION['user_name'] = $member['user_name'];

?>

<h1>ユーザー情報が変更されました</h1>
<a href="top.php">ホーム</a>