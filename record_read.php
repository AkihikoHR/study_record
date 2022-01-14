<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM record_table WHERE user_id=:user_id ORDER BY exam_date ASC';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
  <tr>
    <td>{$record["exam_type"]}</td>
    <td>{$record["exam_date"]}</td>
    <td>{$record["japanese"]}</td>
    <td>{$record["math"]}</td>
    <td>{$record["english"]}</td>
    <td>{$record["science"]}</td>
    <td>{$record["social"]}</td>   
  </tr>
  ";
}

// SQL作成&実行
$sql = 'SELECT ROUND(AVG(japanese),1), ROUND(AVG(math),1), ROUND(AVG(english),1),
 ROUND(AVG(science),1), ROUND(AVG(social),1) FROM record_table WHERE user_id=:user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
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

$average = "";
$average .= "
  <tr>
    <td>平均</td>
    <td></td>
    <td>{$japanese}</td>
    <td>{$math}</td>
    <td>{$english}</td>
    <td>{$science}</td>
    <td>{$social}</td>   
  </tr>
  ";

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>成績管理（過去の成績一覧）</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <fieldset>
      <legend>成績管理（過去の成績一覧）</legend>
      <h1><?php echo $user_name; ?>さんの成績表</h1>

      <div class="contents">

        <table>
          <thead>
            <tr>
              <th>試験の種類</th>
              <th>試験日</th>
              <th>国語</th>
              <th>数学</th>
              <th>英語</th>
              <th>理科</th>
              <th>社会</th>
            </tr>
          </thead>
          <tbody>
            <?= $output ?>
          </tbody>
          <tbody>
            <?= $average ?>
          </tbody>
        </table>

        <div>
          <canvas id="myChart"></canvas>
        </div>

      </div>

      <a href="record_input.php">入力画面に戻る</a>
    </fieldset>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const labels = [
      '国語',
      '数学',
      '英語',
      '理科',
      '社会',
    ];
    const data = {
      labels: labels,
      datasets: [{
        label: '科目別平均点',
        data: [<?= $japanese; ?>, <?= $math; ?>, <?= $english; ?>, <?= $science; ?>, <?= $social; ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.4)',
          'rgba(255, 159, 64, 0.4)',
          'rgba(255, 205, 86, 0.4)',
          'rgba(75, 192, 192, 0.4)',
          'rgba(54, 162, 235, 0.4)',
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
        ],
        borderWidth: 1
      }]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>

</body>

</html>