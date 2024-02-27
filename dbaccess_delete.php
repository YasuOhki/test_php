<?php
require('dbaccess.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM `students` WHERE `students`.`id` = " . $id;
$stmt = $db->prepare($sql);
$success = $stmt->execute();
if (!$success) {
  echo 'データ削除に失敗しました';
  die($db->error);
}
else {
  echo 'データ削除に成功しました';
}
?>

<div class='return'><a href="/test_php/index.php">戻る</a></div>
