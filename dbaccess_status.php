<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>この画面は後で消す</title>
</head>
<body>
  <?php
    require('dbaccess.php');
    $status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_NUMBER_INT);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "UPDATE students SET status = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    var_dump($stmt);
    //exit();

    $stmt->bindValue(1, $status, PDO::PARAM_INT);
    $stmt->bindValue(2, $id, PDO::PARAM_INT);
    var_dump($status);
    var_dump($id);
    exit();
    $success = $stmt->execute();
    var_dump($success);
    exit();

    if (!$success) {
      var_dump($success);
      exit();
      echo 'データ更新に失敗しました';
      die($db->error);
    }
    else {
      var_dump($success);
      exit();
      echo 'データが更新されました';
    }
  ?>
  <div class='return'><a href="/test_php/index.php">戻る</a></div>
</body>
</html>
