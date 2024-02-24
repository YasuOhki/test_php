<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>show</title>
</head>
<body>
  <link rel="stylesheet" href="styles/show.css">
  <?php
    // 詳細表示 //
    require('dbaccess.php');
    $stmt = $db->prepare('select * from students where id=?');
    if (!$stmt) {
      die($db->error);
    }
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if (!$id) {
        echo '表示する園児を指定してください';
        exit();
    }
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $stmt->bind_result($id, $name, $age, $brother, $statusNum, $Allergie, $address, $parentname, $parentphone);
    $result = $stmt->fetch();
    if (!$result) {
      echo '指定されたレコードは存在しません';
      exit();
    }

    if ($statusNum == 1) {
      $status = '登園';
    }
    else {
      $status = '降園';
    }
  ?>

  <table border="1">
    <tr>
      <th>id</th>
      <th>名前</th>
      <th>学年</th>
      <th>兄弟児</th>
      <th>状態</th>
      <th>アレルギー</th>
      <th>住所</th>
      <th>保護者氏名</th>
      <th>保護者連絡先</th>
    </tr>
    <tr>
      <td><?php echo htmlspecialchars($id); ?></td>
      <td><?php echo htmlspecialchars($name); ?></td>
      <td><?php echo htmlspecialchars($age); ?></td>
      <td><?php echo htmlspecialchars($brother); ?></td>
      <td><?php echo htmlspecialchars($status); ?></td>
      <td><?php echo htmlspecialchars($Allergie); ?></td>
      <td><?php echo htmlspecialchars($address); ?></td>
      <td><?php echo htmlspecialchars($parentname); ?></td>
      <td><?php echo htmlspecialchars($parentphone); ?></td>
    </tr>
  </table>

  <a href="/test_php/index.php">一覧へ</a>
</body>
</html>
