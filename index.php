<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>
<body>
  <link rel="stylesheet" href="styles/index.css">
  <?php
  require('dbaccess.php');
  ?>
  <h2>園児リスト<br></h2>
  <table border="1">
    <tr>
      <th>id</th>
      <th>名前</th>
      <th>学年</th>
      <th>状態</th>
      <th>詳細</th>
    </tr>
  <?php
  $records = $db->query('SELECT id, name, age, status FROM `students`');
  if ($records) {

    while ($record = $records->fetch_assoc()) {
      if ($record["status"] == 1) {
        $status = '登園';
      }
      else {
        $status = '降園';
      }
  ?>
      <tr>
        <td><?php echo $record["id"] ?></td>
        <td><?php echo $record["name"] ?></td>
        <td><?php echo $record["age"] ?></td>
        <td><?php echo $status ?></td>
        <td><a href="/test_php/show.php?id=<?php echo $record["id"]; ?>">詳細</a></td>
      </tr>
  <?php
    }
  }
  else {
    echo $db->error;
  }
  ?>
  </table>
</body>
</html>
