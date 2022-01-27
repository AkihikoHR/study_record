<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

if (
  !isset($_POST['answer']) || $_POST['answer'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$question_id = $_POST['question_id'];
$answer = $_POST['answer'];

// ここからファイルアップロード&DB登録の処理を追加

if ($_FILES['upfile']['error'] == 4) {
  $save_path = null;
} else if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) { //アップされた画像が存在しているかチェック

  $uploaded_file_name = $_FILES['upfile']['name'];
  $temp_path  = $_FILES['upfile']['tmp_name']; //一時フォルダの場所
  $directory_path = 'upload/';

  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION); //拡張子の種類を取得
  $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension; //被らないファイル名を付与
  $save_path = $directory_path . $unique_name; //保存フォルダの場所

  if (is_uploaded_file($temp_path)) { //一時フォルダにファイルが存在しているか
    if (move_uploaded_file(
      $temp_path,
      $save_path
    )) { //一時フォルダから保存フォルダに移動
      chmod($save_path, 0644);  //PHPがファイルを操作する権限を設定

    } else {
      exit('Error:アップロードできませんでした');
    }
  } else {
    exit('Error:画像がありません');
  }
} else {
  exit('Error:画像が送信されていません');
}

$pdo = connect_to_db();

$sql = 'INSERT INTO answer_table(id, user_id, question_id, answer, image, created_at, updated_at)
 VALUES(NULL, :user_id, :question_id, :answer, :image, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':question_id', $question_id, PDO::PARAM_STR);
$stmt->bindValue(':answer', $answer, PDO::PARAM_STR);
$stmt->bindValue(':image', $save_path, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:answer_input.php?id={$question_id}");
exit();
