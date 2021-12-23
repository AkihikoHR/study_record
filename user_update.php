<?php
session_start();

// 入力項目のチェック

$id = $_POST['id'];
$user_name = $_POST['user_name'];
$user_ruby = $_POST['user_ruby'];
$user_age = $_POST['user_age'];
$user_email = $_POST['user_email'];
$user_address = $_POST['user_address'];

// DB接続

include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE user_table SET user_name=:user_name, user_ruby=:user_ruby, user_age=:user_age,
 user_email=:user_email, user_address=:user_address, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_STR);
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

$msg = 'ユーザー情報が変更されました';
$link = '<a href="top.php">ホーム</a>';

?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>