<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// POSTデータ確認

if (
    !isset($_POST['date']) || $_POST['date'] == '' ||
    !isset($_POST['japanese']) || $_POST['japanese'] == '' ||
    !isset($_POST['math']) || $_POST['math'] == '' ||
    !isset($_POST['english']) || $_POST['english'] == '' ||
    !isset($_POST['science']) || $_POST['science'] == '' ||
    !isset($_POST['social']) || $_POST['social'] == ''
) {
    exit('ParamError');
}

$date = $_POST['date'];
$japanese = $_POST['japanese'];
$math = $_POST['math'];
$english = $_POST['english'];
$science = $_POST['science'];
$social = $_POST['social'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行

$sql = 'INSERT INTO time_table
 (id, user_id, date, japanese, math, english, science, social, created_at, updated_at) values 
 (NULL, :user_id, :date, :japanese, :math, :english, :science, :social, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':japanese', $japanese, PDO::PARAM_STR);
$stmt->bindValue(':math', $math, PDO::PARAM_STR);
$stmt->bindValue(':english', $english, PDO::PARAM_STR);
$stmt->bindValue(':science', $science, PDO::PARAM_STR);
$stmt->bindValue(':social', $social, PDO::PARAM_STR);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('LOCATION:time_input.php');
exit();
