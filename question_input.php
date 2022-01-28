<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>質問部屋</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <h1><?php echo $user_name; ?>さんの質問を入力してください</h1>

    <form action="question_create.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>質問部屋</legend>
        <div>
          <p>カテゴリーを選んでください</p>
          <select name="category">
            <option value="勉強">勉強</option>
            <option value="志望校選び">志望校選び</option>
            <option value="学校生活">学校生活</option>
            <option value="その他">その他</option>
          </select>
        </div>
        <div>
          <p>質問内容を入力してください</p>
          <textarea name="question" rows="8" cols="40"></textarea>
        </div>
        <div>
          <p>関連する画像をアップロードできます（任意）</p>
          <div>
            <input type="file" name="upfile" accept="image/*" capture="camera" />
          </div>
        </div>
        <div>
          <button>送信</button>
        </div>
      </fieldset>
    </form>

    <div class="btn_area">
      <button class="btn" onclick="location.href='question_my_read.php'"> 過去の質問と回答を見る </button>
    </div>

    <div><a href="question.php">質問部屋トップへ</a></div>
    <div><a href="top.php">ホームへ</a></div>
  </div>
</body>

</html>