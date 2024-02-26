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
    $sql = "UPDATE students SET status = " . $status . " " . " WHERE id = " . $id;
    $stmt = $db->prepare($sql);
    $success = $stmt->execute();

    if (!$success) {
      echo 'データ更新に失敗しました';
      die($db->error);
    }
    else {
      // do nothing
    }
  ?>
  <div class='return'><a href="/test_php/index.php">戻る</a></div>
</body>
</html>
