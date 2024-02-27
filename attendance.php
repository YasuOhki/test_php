<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>出欠連絡</title>
</head>
<body>
<link rel="stylesheet" href="styles/attendance.css">
  <?php
    require('dbaccess.php');
    $stmt = $db->prepare('select id, name, age, brother, status from students where id=?');
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
    $stmt->bind_result($id, $name, $age, $brother, $statusNum, );
    $result = $stmt->fetch();
    if (!$result) {
      echo '指定されたレコードは存在しません';
      exit();
    }
  ?>

  <h1>出欠連絡</h1>
  <div class="main">
    <div class="name"><?php echo $name; ?></div>
    <div class="status">
      <?php if($statusNum === 0) { ?>
      <div class="attend">
        <!-- <a href="/test_php/dbaccess_status.php?status=1&id=<?php echo $id ?>"> -->
        <a href="/test_php/attendance_status_update.php?status=1&id=<?php echo $id ?>">
          登園
        </a>
      </div>
      <?php } ?>

      <?php if($statusNum === 1) { ?>
      <div class="nonattend">
        <!-- <a href="/test_php/dbaccess_status.php?status=0&id=<?php echo $id ?>"> -->
        <a href="/test_php/attendance_status_update.php?status=0&id=<?php echo $id ?>">
          降園
        </a>
      </div>
      <?php } ?>
    </div>

    <div class='return'><a href="/test_php/index.php">戻る</a></div>
  </div>
</body>
</html>
