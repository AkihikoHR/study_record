<?php
// POSTデータ確認
//var_dump($_POST);
//exit();

if (
    !isset($_POST['user_name']) || $_POST['user_name'] == '' ||
    !isset($_POST['exam_type']) || $_POST['exam_type'] == '' ||
    !isset($_POST['exam_date']) || $_POST['exam_date'] == '' ||
    !isset($_POST['japanese']) || $_POST['japanese'] == '' ||
    !isset($_POST['math']) || $_POST['math'] == '' ||
    !isset($_POST['science']) || $_POST['science'] == '' ||
    !isset($_POST['social']) || $_POST['social'] == ''
) {
    exit('ParamError');
}

$user_name = $_POST['user_name'];
$exam_type = $_POST['exam_type'];
$exam_date = $_POST['exam_date'];
$japanese = $_POST['japanese'];
$math = $_POST['math'];
$english = $_POST['english'];
$science = $_POST['science'];
$social = $_POST['social'];

// DB接続

// 各種項目設定
$dbn = 'mysql:dbname=gsacy_d01_11_product;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
};

// SQL作成&実行

$sql = 'INSERT INTO record_table
 (id, user_name, exam_type, exam_date, japanese, math, english, science, social, created_at, updated_at) values 
 (NULL, :user_name, :exam_type, :exam_date, :japanese, :math, :english, :science, :social, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':exam_type', $exam_type, PDO::PARAM_STR);
$stmt->bindValue(':exam_date', $exam_date, PDO::PARAM_STR);
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

header('LOCATION:record_input.php');
exit();
