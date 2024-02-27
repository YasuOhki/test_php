<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>delete</title>
</head>
<body>
<link rel="stylesheet" href="styles/delete.css">
  <?php
  // 詳細表示 //
  require('dbaccess.php');
  $stmt = $db->prepare('select * from students where id=?');
  if (!$stmt) {
    die($db->error);
  }
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
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
  ?>

  <!-- 削除前に園児データの内容を表示 -->
  <div class="confirm">
    <form action="/test_php/dbaccess_delete.php" method="POST">
      <label>本当に削除しますか？</label>
      <input type="text" name="id">
      <input type="submit" value="削除">
    </form>
  </div>
  <a href="/test_php/index.php">一覧に戻る</a>

  <h1>詳細情報</h1>
  <table border="1">
    <tr>
      <th>id</th>
      <th>名前</th>
      <th>学年</th>
      <th>兄弟児</th>
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
      <td><?php echo htmlspecialchars($Allergie); ?></td>
      <td><?php echo htmlspecialchars($address); ?></td>
      <td><?php echo htmlspecialchars($parentname); ?></td>
      <td><?php echo htmlspecialchars($parentphone); ?></td>
    </tr>
  </table>
</body>
</html>
