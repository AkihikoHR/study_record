<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM time_table WHERE user_id=:user_id ORDER BY date ASC';
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
    <td>{$record["date"]}</td>
    <td>{$record["japanese"]}</td>
    <td>{$record["math"]}</td>
    <td>{$record["english"]}</td>
    <td>{$record["science"]}</td>
    <td>{$record["social"]}</td>   
  </tr>
  ";
}

// SQL作成&実行
$sql = 'SELECT SUM(japanese), SUM(math), SUM(english),
 SUM(science), SUM(social) FROM time_table WHERE user_id=:user_id';
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
$japanese = $result["SUM(japanese)"];
$math = $result["SUM(math)"];
$english = $result["SUM(english)"];
$science = $result["SUM(science)"];
$social = $result["SUM(social)"];

$total = "";
$total .= "
  <tr>
    <td>合計</td>
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
  <title>学習時間管理</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">

    <fieldset>
      <legend>学習時間管理</legend>
      <h1><?php echo $user_name; ?>さんの学習時間（分）</h1>

      <div class="contents">

        <table>
          <thead>
            <tr>
              <th>日付</th>
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
            <?= $total ?>
          </tbody>
        </table>

        <div>
          <canvas id="myChart"></canvas>
        </div>

      </div>

      <a href="time_input.php">入力画面に戻る</a>

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
        label: '科目別学習時間',
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