<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$pdo = connect_to_db();

//SQLで学習時間を取得
$sql = 'SELECT SUM(japanese), SUM(math), SUM(english),
 SUM(science), SUM(social) FROM time_table WHERE user_id=:user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$japanese = $result["SUM(japanese)"];
$math = $result["SUM(math)"];
$english = $result["SUM(english)"];
$science = $result["SUM(science)"];
$social = $result["SUM(social)"];

$array = [
    '国語' => $japanese,
    '数学' => $math,
    '英語' => $english,
    '理科' => $science,
    '社会' => $social
];

$max_subject = array_search(max($array), $array);
$min_subject = array_search(min($array), $array);

//SQLで成績を取得
$sql = 'SELECT ROUND(AVG(japanese),1), ROUND(AVG(math),1), ROUND(AVG(english),1),
 ROUND(AVG(science),1), ROUND(AVG(social),1) FROM record_table WHERE user_id=:user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$japanese = $result["ROUND(AVG(japanese),1)"];
$math = $result["ROUND(AVG(math),1)"];
$english = $result["ROUND(AVG(english),1)"];
$science = $result["ROUND(AVG(science),1)"];
$social = $result["ROUND(AVG(social),1)"];

$array = [
    '国語' => $japanese,
    '数学' => $math,
    '英語' => $english,
    '理科' => $science,
    '社会' => $social
];

$best_subject = array_search(max($array), $array);
$worst_subject = array_search(min($array), $array);

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>担任からのメッセージ
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<html>

<body>
    <div class="wrapper">

        <p><?= $user_name; ?>さん！こんにちは！</p>

        <p>今月は<span class="strong"><?= $max_subject; ?></span>の勉強をよくがんばっていますね</p>

        <p><span class="strong"><?= $min_subject; ?></span>の勉強にはあまり手が付いていないようです</p>

        <p>得意の<span class="strong"><?= $best_subject; ?></span>の成績を伸ばしましょう！その調子！</p>

        <p>苦手の<span class="strong"><?= $worst_subject; ?></span>の勉強もがんばりましょう！</p>

        <div><a href="index.php">ホームへ</a></div>

    </div>
</body>


</html>