<?php
  require('dbaccess.php');
  $status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_NUMBER_INT);
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $sql = "UPDATE students SET status = " . $status . " " . " WHERE id = " . $id;
  $stmt = $db->prepare($sql);
  $success = $stmt->execute();
  if (!$success) {
?>
    echo 'データ更新に失敗しました';
    <div class='return'><a href="/test_php/index.php">戻る</a></div>
<?php
    die($db->error);
  }
  else {
    // indexページにリダイレクトさせたい
  }
?>
